<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Pesertum;
use App\Models\Transaksi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use Midtrans\Snap;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransaksinController extends Controller
{
    public function __construct()
    {
        // Set midtrans configuration
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }

    public function store(Request $request)
    {

        // DB::transaction(function() use ($request) {
            try {

                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'email' => 'required|email',
                    'qty' => 'required'
                ], [
                    'nama.required' => 'Kolom nama harus diisi.',
                    'email.required' => 'Kolom email harus diisi.',
                    'email.email' => 'Format email tidak valid.',
                    'qty.required' => 'Kolom qty harus diisi.',
                ]);

                if ($validator->fails()) {
                    return response()->json($validator->errors(), 422);
                }

            /**
             * algorithm create no invoice
             */
            $length = 10;
            $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }

            $no_invoice = 'TRX-'.Str::upper($random);

            //get data campaign
            $saveuser = new Pesertum();
            $saveuser->nama = $request->nama;
            $saveuser->email = $request->email;
            $saveuser->whatsapp = $request->whatsapp;
            $saveuser->alamat = $request->alamat;
            $saveuser->save();

            $pembayaran = Transaksi::create([
                'invoice'       => $no_invoice,
                'peserta'       => $saveuser->id,
                'amount'        => $request->amount,
                'qty'           => $request->qty,
                'status'        => 'pending',
            ]);

            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $pembayaran->invoice,
                    'gross_amount'  => $pembayaran->amount,
                ],
                'customer_details' => [
                    'first_name'       => $request->nama,
                    'email'            => $request->email,
                ]
            ];

            //create snap token
            $snapToken = Snap::getSnapToken($payload);
            $pembayaran->snap_token = $snapToken;
            $pembayaran->save();


            return new ApiResource(false, 'insert data berhasil', $pembayaran);

            // $this->response['snap_token'] = $snapToken;





    } catch (Exception $e) {
        return new ApiResource(false, $e->getMessage(), null);
    }

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Transaksi Berhasil Dibuat!',
        //     $this->response
        // ]);
    }

    /**
     * notificationHandler
     *
     * @param  mixed $request
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $payload      = $request->getContent();
        $notification = json_decode($payload);

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . config('services.midtrans.serverKey'));

        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $transaction  = $notification->transaction_status;
        $type         = $notification->payment_type;
        $orderId      = $notification->order_id;
        $fraud        = $notification->fraud_status;

        //data donation
        $data_donation = Transaksi::where('invoice', $orderId)->first();

        if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {

                /**
                *   update invoice to pending
                */
                $data_donation->update([
                    'status' => 'pending'
                ]);

              } else {

                /**
                *   update invoice to success
                */
                $data_donation->update([
                    'status' => 'success'
                ]);

              }

            }

        } elseif ($transaction == 'settlement') {

            /**
            *   update invoice to success
            */
            $data_donation->update([
                'status' => 'success'
            ]);


        } elseif($transaction == 'pending'){


            /**
            *   update invoice to pending
            */
            $data_donation->update([
                'status' => 'pending'
            ]);


        } elseif ($transaction == 'deny') {


            /**
            *   update invoice to failed
            */
            $data_donation->update([
                'status' => 'failed'
            ]);


        } elseif ($transaction == 'expire') {


            /**
            *   update invoice to expired
            */
            $data_donation->update([
                'status' => 'expired'
            ]);


        } elseif ($transaction == 'cancel') {

            /**
            *   update invoice to failed
            */
            $data_donation->update([
                'status' => 'failed'
            ]);

        }

    }
}
