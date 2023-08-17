<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'master_access',
            ],
            [
                'id'    => 20,
                'title' => 'tipe_access',
            ],
            [
                'id'    => 21,
                'title' => 'mark_item_create',
            ],
            [
                'id'    => 22,
                'title' => 'mark_item_edit',
            ],
            [
                'id'    => 23,
                'title' => 'mark_item_show',
            ],
            [
                'id'    => 24,
                'title' => 'mark_item_delete',
            ],
            [
                'id'    => 25,
                'title' => 'mark_item_access',
            ],
            [
                'id'    => 26,
                'title' => 'item_group_one_create',
            ],
            [
                'id'    => 27,
                'title' => 'item_group_one_edit',
            ],
            [
                'id'    => 28,
                'title' => 'item_group_one_show',
            ],
            [
                'id'    => 29,
                'title' => 'item_group_one_delete',
            ],
            [
                'id'    => 30,
                'title' => 'item_group_one_access',
            ],
            [
                'id'    => 31,
                'title' => 'item_group_two_create',
            ],
            [
                'id'    => 32,
                'title' => 'item_group_two_edit',
            ],
            [
                'id'    => 33,
                'title' => 'item_group_two_show',
            ],
            [
                'id'    => 34,
                'title' => 'item_group_two_delete',
            ],
            [
                'id'    => 35,
                'title' => 'item_group_two_access',
            ],
            [
                'id'    => 36,
                'title' => 'item_group_three_create',
            ],
            [
                'id'    => 37,
                'title' => 'item_group_three_edit',
            ],
            [
                'id'    => 38,
                'title' => 'item_group_three_show',
            ],
            [
                'id'    => 39,
                'title' => 'item_group_three_delete',
            ],
            [
                'id'    => 40,
                'title' => 'item_group_three_access',
            ],
            [
                'id'    => 41,
                'title' => 'item_create',
            ],
            [
                'id'    => 42,
                'title' => 'item_edit',
            ],
            [
                'id'    => 43,
                'title' => 'item_show',
            ],
            [
                'id'    => 44,
                'title' => 'item_delete',
            ],
            [
                'id'    => 45,
                'title' => 'item_access',
            ],
            [
                'id'    => 46,
                'title' => 'akun_create',
            ],
            [
                'id'    => 47,
                'title' => 'akun_edit',
            ],
            [
                'id'    => 48,
                'title' => 'akun_show',
            ],
            [
                'id'    => 49,
                'title' => 'akun_delete',
            ],
            [
                'id'    => 50,
                'title' => 'akun_access',
            ],
            [
                'id'    => 51,
                'title' => 'akun_parent_create',
            ],
            [
                'id'    => 52,
                'title' => 'akun_parent_edit',
            ],
            [
                'id'    => 53,
                'title' => 'akun_parent_show',
            ],
            [
                'id'    => 54,
                'title' => 'akun_parent_delete',
            ],
            [
                'id'    => 55,
                'title' => 'akun_parent_access',
            ],
            [
                'id'    => 56,
                'title' => 'master_akun_access',
            ],
            [
                'id'    => 57,
                'title' => 'akun_jeni_create',
            ],
            [
                'id'    => 58,
                'title' => 'akun_jeni_edit',
            ],
            [
                'id'    => 59,
                'title' => 'akun_jeni_show',
            ],
            [
                'id'    => 60,
                'title' => 'akun_jeni_delete',
            ],
            [
                'id'    => 61,
                'title' => 'akun_jeni_access',
            ],
            [
                'id'    => 62,
                'title' => 'akun_klasifikasi_create',
            ],
            [
                'id'    => 63,
                'title' => 'akun_klasifikasi_edit',
            ],
            [
                'id'    => 64,
                'title' => 'akun_klasifikasi_show',
            ],
            [
                'id'    => 65,
                'title' => 'akun_klasifikasi_delete',
            ],
            [
                'id'    => 66,
                'title' => 'akun_klasifikasi_access',
            ],
            [
                'id'    => 67,
                'title' => 'pabrik_create',
            ],
            [
                'id'    => 68,
                'title' => 'pabrik_edit',
            ],
            [
                'id'    => 69,
                'title' => 'pabrik_show',
            ],
            [
                'id'    => 70,
                'title' => 'pabrik_delete',
            ],
            [
                'id'    => 71,
                'title' => 'pabrik_access',
            ],
            [
                'id'    => 72,
                'title' => 'gudang_create',
            ],
            [
                'id'    => 73,
                'title' => 'gudang_edit',
            ],
            [
                'id'    => 74,
                'title' => 'gudang_show',
            ],
            [
                'id'    => 75,
                'title' => 'gudang_delete',
            ],
            [
                'id'    => 76,
                'title' => 'gudang_access',
            ],
            [
                'id'    => 77,
                'title' => 'test_create',
            ],
            [
                'id'    => 78,
                'title' => 'test_edit',
            ],
            [
                'id'    => 79,
                'title' => 'test_show',
            ],
            [
                'id'    => 80,
                'title' => 'test_delete',
            ],
            [
                'id'    => 81,
                'title' => 'test_access',
            ],
            [
                'id'    => 82,
                'title' => 'departement_create',
            ],
            [
                'id'    => 83,
                'title' => 'departement_edit',
            ],
            [
                'id'    => 84,
                'title' => 'departement_show',
            ],
            [
                'id'    => 85,
                'title' => 'departement_delete',
            ],
            [
                'id'    => 86,
                'title' => 'departement_access',
            ],
            [
                'id'    => 87,
                'title' => 'kotum_create',
            ],
            [
                'id'    => 88,
                'title' => 'kotum_edit',
            ],
            [
                'id'    => 89,
                'title' => 'kotum_show',
            ],
            [
                'id'    => 90,
                'title' => 'kotum_delete',
            ],
            [
                'id'    => 91,
                'title' => 'kotum_access',
            ],
            [
                'id'    => 92,
                'title' => 'grup_mitra_bisnis_one_create',
            ],
            [
                'id'    => 93,
                'title' => 'grup_mitra_bisnis_one_edit',
            ],
            [
                'id'    => 94,
                'title' => 'grup_mitra_bisnis_one_show',
            ],
            [
                'id'    => 95,
                'title' => 'grup_mitra_bisnis_one_delete',
            ],
            [
                'id'    => 96,
                'title' => 'grup_mitra_bisnis_one_access',
            ],
            [
                'id'    => 97,
                'title' => 'grup_mitra_bisnis_two_create',
            ],
            [
                'id'    => 98,
                'title' => 'grup_mitra_bisnis_two_edit',
            ],
            [
                'id'    => 99,
                'title' => 'grup_mitra_bisnis_two_show',
            ],
            [
                'id'    => 100,
                'title' => 'grup_mitra_bisnis_two_delete',
            ],
            [
                'id'    => 101,
                'title' => 'grup_mitra_bisnis_two_access',
            ],
            [
                'id'    => 102,
                'title' => 'grup_mitra_bisnis_three_create',
            ],
            [
                'id'    => 103,
                'title' => 'grup_mitra_bisnis_three_edit',
            ],
            [
                'id'    => 104,
                'title' => 'grup_mitra_bisnis_three_show',
            ],
            [
                'id'    => 105,
                'title' => 'grup_mitra_bisnis_three_delete',
            ],
            [
                'id'    => 106,
                'title' => 'grup_mitra_bisnis_three_access',
            ],
            [
                'id'    => 107,
                'title' => 'rekuring_access',
            ],
            [
                'id'    => 108,
                'title' => 'periode_rekuring_create',
            ],
            [
                'id'    => 109,
                'title' => 'periode_rekuring_edit',
            ],
            [
                'id'    => 110,
                'title' => 'periode_rekuring_show',
            ],
            [
                'id'    => 111,
                'title' => 'periode_rekuring_delete',
            ],
            [
                'id'    => 112,
                'title' => 'periode_rekuring_access',
            ],
            [
                'id'    => 113,
                'title' => 'kas_bank_create',
            ],
            [
                'id'    => 114,
                'title' => 'kas_bank_edit',
            ],
            [
                'id'    => 115,
                'title' => 'kas_bank_show',
            ],
            [
                'id'    => 116,
                'title' => 'kas_bank_delete',
            ],
            [
                'id'    => 117,
                'title' => 'kas_bank_access',
            ],
            [
                'id'    => 118,
                'title' => 'pegawai_create',
            ],
            [
                'id'    => 119,
                'title' => 'pegawai_edit',
            ],
            [
                'id'    => 120,
                'title' => 'pegawai_show',
            ],
            [
                'id'    => 121,
                'title' => 'pegawai_delete',
            ],
            [
                'id'    => 122,
                'title' => 'pegawai_access',
            ],
            [
                'id'    => 123,
                'title' => 'sale_create',
            ],
            [
                'id'    => 124,
                'title' => 'sale_edit',
            ],
            [
                'id'    => 125,
                'title' => 'sale_show',
            ],
            [
                'id'    => 126,
                'title' => 'sale_delete',
            ],
            [
                'id'    => 127,
                'title' => 'sale_access',
            ],
            [
                'id'    => 128,
                'title' => 'penagih_create',
            ],
            [
                'id'    => 129,
                'title' => 'penagih_edit',
            ],
            [
                'id'    => 130,
                'title' => 'penagih_show',
            ],
            [
                'id'    => 131,
                'title' => 'penagih_delete',
            ],
            [
                'id'    => 132,
                'title' => 'penagih_access',
            ],
            [
                'id'    => 133,
                'title' => 'level_harga_create',
            ],
            [
                'id'    => 134,
                'title' => 'level_harga_edit',
            ],
            [
                'id'    => 135,
                'title' => 'level_harga_show',
            ],
            [
                'id'    => 136,
                'title' => 'level_harga_delete',
            ],
            [
                'id'    => 137,
                'title' => 'level_harga_access',
            ],
            [
                'id'    => 138,
                'title' => 'mata_uang_create',
            ],
            [
                'id'    => 139,
                'title' => 'mata_uang_edit',
            ],
            [
                'id'    => 140,
                'title' => 'mata_uang_show',
            ],
            [
                'id'    => 141,
                'title' => 'mata_uang_delete',
            ],
            [
                'id'    => 142,
                'title' => 'mata_uang_access',
            ],
            [
                'id'    => 143,
                'title' => 'proyek_create',
            ],
            [
                'id'    => 144,
                'title' => 'proyek_edit',
            ],
            [
                'id'    => 145,
                'title' => 'proyek_show',
            ],
            [
                'id'    => 146,
                'title' => 'proyek_delete',
            ],
            [
                'id'    => 147,
                'title' => 'proyek_access',
            ],
            [
                'id'    => 148,
                'title' => 'cabang_create',
            ],
            [
                'id'    => 149,
                'title' => 'cabang_edit',
            ],
            [
                'id'    => 150,
                'title' => 'cabang_show',
            ],
            [
                'id'    => 151,
                'title' => 'cabang_delete',
            ],
            [
                'id'    => 152,
                'title' => 'cabang_access',
            ],
            [
                'id'    => 153,
                'title' => 'pajak_create',
            ],
            [
                'id'    => 154,
                'title' => 'pajak_edit',
            ],
            [
                'id'    => 155,
                'title' => 'pajak_show',
            ],
            [
                'id'    => 156,
                'title' => 'pajak_delete',
            ],
            [
                'id'    => 157,
                'title' => 'pajak_access',
            ],
            [
                'id'    => 158,
                'title' => 'terminal_kasir_create',
            ],
            [
                'id'    => 159,
                'title' => 'terminal_kasir_edit',
            ],
            [
                'id'    => 160,
                'title' => 'terminal_kasir_show',
            ],
            [
                'id'    => 161,
                'title' => 'terminal_kasir_delete',
            ],
            [
                'id'    => 162,
                'title' => 'terminal_kasir_access',
            ],
            [
                'id'    => 163,
                'title' => 'mesin_edc_create',
            ],
            [
                'id'    => 164,
                'title' => 'mesin_edc_edit',
            ],
            [
                'id'    => 165,
                'title' => 'mesin_edc_show',
            ],
            [
                'id'    => 166,
                'title' => 'mesin_edc_delete',
            ],
            [
                'id'    => 167,
                'title' => 'mesin_edc_access',
            ],
            [
                'id'    => 168,
                'title' => 'tipe_kartu_kredit_create',
            ],
            [
                'id'    => 169,
                'title' => 'tipe_kartu_kredit_edit',
            ],
            [
                'id'    => 170,
                'title' => 'tipe_kartu_kredit_show',
            ],
            [
                'id'    => 171,
                'title' => 'tipe_kartu_kredit_delete',
            ],
            [
                'id'    => 172,
                'title' => 'tipe_kartu_kredit_access',
            ],
            [
                'id'    => 173,
                'title' => 'channel_create',
            ],
            [
                'id'    => 174,
                'title' => 'channel_edit',
            ],
            [
                'id'    => 175,
                'title' => 'channel_show',
            ],
            [
                'id'    => 176,
                'title' => 'channel_delete',
            ],
            [
                'id'    => 177,
                'title' => 'channel_access',
            ],
            [
                'id'    => 178,
                'title' => 'satuan_create',
            ],
            [
                'id'    => 179,
                'title' => 'satuan_edit',
            ],
            [
                'id'    => 180,
                'title' => 'satuan_show',
            ],
            [
                'id'    => 181,
                'title' => 'satuan_delete',
            ],
            [
                'id'    => 182,
                'title' => 'satuan_access',
            ],
            [
                'id'    => 183,
                'title' => 'mitra_bisni_create',
            ],
            [
                'id'    => 184,
                'title' => 'mitra_bisni_edit',
            ],
            [
                'id'    => 185,
                'title' => 'mitra_bisni_show',
            ],
            [
                'id'    => 186,
                'title' => 'mitra_bisni_delete',
            ],
            [
                'id'    => 187,
                'title' => 'mitra_bisni_access',
            ],
            [
                'id'    => 188,
                'title' => 'alamat_mitra_bisni_create',
            ],
            [
                'id'    => 189,
                'title' => 'alamat_mitra_bisni_edit',
            ],
            [
                'id'    => 190,
                'title' => 'alamat_mitra_bisni_show',
            ],
            [
                'id'    => 191,
                'title' => 'alamat_mitra_bisni_delete',
            ],
            [
                'id'    => 192,
                'title' => 'alamat_mitra_bisni_access',
            ],
            [
                'id'    => 193,
                'title' => 'kontak_mitra_bisni_create',
            ],
            [
                'id'    => 194,
                'title' => 'kontak_mitra_bisni_edit',
            ],
            [
                'id'    => 195,
                'title' => 'kontak_mitra_bisni_show',
            ],
            [
                'id'    => 196,
                'title' => 'kontak_mitra_bisni_delete',
            ],
            [
                'id'    => 197,
                'title' => 'kontak_mitra_bisni_access',
            ],
            [
                'id'    => 198,
                'title' => 'hutang_piutang_mitra_bisni_create',
            ],
            [
                'id'    => 199,
                'title' => 'hutang_piutang_mitra_bisni_edit',
            ],
            [
                'id'    => 200,
                'title' => 'hutang_piutang_mitra_bisni_show',
            ],
            [
                'id'    => 201,
                'title' => 'hutang_piutang_mitra_bisni_delete',
            ],
            [
                'id'    => 202,
                'title' => 'hutang_piutang_mitra_bisni_access',
            ],
            [
                'id'    => 203,
                'title' => 'supplier_item_create',
            ],
            [
                'id'    => 204,
                'title' => 'supplier_item_edit',
            ],
            [
                'id'    => 205,
                'title' => 'supplier_item_show',
            ],
            [
                'id'    => 206,
                'title' => 'supplier_item_delete',
            ],
            [
                'id'    => 207,
                'title' => 'supplier_item_access',
            ],
            [
                'id'    => 208,
                'title' => 'stok_item_create',
            ],
            [
                'id'    => 209,
                'title' => 'stok_item_edit',
            ],
            [
                'id'    => 210,
                'title' => 'stok_item_show',
            ],
            [
                'id'    => 211,
                'title' => 'stok_item_delete',
            ],
            [
                'id'    => 212,
                'title' => 'stok_item_access',
            ],
            [
                'id'    => 213,
                'title' => 'pajak_item_create',
            ],
            [
                'id'    => 214,
                'title' => 'pajak_item_edit',
            ],
            [
                'id'    => 215,
                'title' => 'pajak_item_show',
            ],
            [
                'id'    => 216,
                'title' => 'pajak_item_delete',
            ],
            [
                'id'    => 217,
                'title' => 'pajak_item_access',
            ],
            [
                'id'    => 218,
                'title' => 'harga_jual_item_create',
            ],
            [
                'id'    => 219,
                'title' => 'harga_jual_item_edit',
            ],
            [
                'id'    => 220,
                'title' => 'harga_jual_item_show',
            ],
            [
                'id'    => 221,
                'title' => 'harga_jual_item_delete',
            ],
            [
                'id'    => 222,
                'title' => 'harga_jual_item_access',
            ],
            [
                'id'    => 223,
                'title' => 'pesertum_create',
            ],
            [
                'id'    => 224,
                'title' => 'pesertum_edit',
            ],
            [
                'id'    => 225,
                'title' => 'pesertum_delete',
            ],
            [
                'id'    => 226,
                'title' => 'pesertum_access',
            ],
            [
                'id'    => 227,
                'title' => 'transaksi_create',
            ],
            [
                'id'    => 228,
                'title' => 'transaksi_edit',
            ],
            [
                'id'    => 229,
                'title' => 'transaksi_show',
            ],
            [
                'id'    => 230,
                'title' => 'transaksi_delete',
            ],
            [
                'id'    => 231,
                'title' => 'transaksi_access',
            ],
            [
                'id'    => 232,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
