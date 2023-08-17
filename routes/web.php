<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Mark Item
    Route::delete('mark-items/destroy', 'MarkItemController@massDestroy')->name('mark-items.massDestroy');
    Route::resource('mark-items', 'MarkItemController');

    // Item Group One
    Route::delete('item-group-ones/destroy', 'ItemGroupOneController@massDestroy')->name('item-group-ones.massDestroy');
    Route::resource('item-group-ones', 'ItemGroupOneController');

    // Item Group Two
    Route::delete('item-group-twos/destroy', 'ItemGroupTwoController@massDestroy')->name('item-group-twos.massDestroy');
    Route::resource('item-group-twos', 'ItemGroupTwoController');

    // Item Group Three
    Route::delete('item-group-threes/destroy', 'ItemGroupThreeController@massDestroy')->name('item-group-threes.massDestroy');
    Route::resource('item-group-threes', 'ItemGroupThreeController');

    // Item
    Route::delete('items/destroy', 'ItemController@massDestroy')->name('items.massDestroy');
    Route::post('items/media', 'ItemController@storeMedia')->name('items.storeMedia');
    Route::post('items/ckmedia', 'ItemController@storeCKEditorImages')->name('items.storeCKEditorImages');
    Route::resource('items', 'ItemController');

    // Akun
    Route::delete('akuns/destroy', 'AkunController@massDestroy')->name('akuns.massDestroy');
    Route::resource('akuns', 'AkunController');

    // Akun Parent
    Route::delete('akun-parents/destroy', 'AkunParentController@massDestroy')->name('akun-parents.massDestroy');
    Route::resource('akun-parents', 'AkunParentController');

    // Akun Jenis
    Route::delete('akun-jenis/destroy', 'AkunJenisController@massDestroy')->name('akun-jenis.massDestroy');
    Route::resource('akun-jenis', 'AkunJenisController');

    // Akun Klasifikasi
    Route::delete('akun-klasifikasis/destroy', 'AkunKlasifikasiController@massDestroy')->name('akun-klasifikasis.massDestroy');
    Route::resource('akun-klasifikasis', 'AkunKlasifikasiController');

    // Pabrik
    Route::delete('pabriks/destroy', 'PabrikController@massDestroy')->name('pabriks.massDestroy');
    Route::resource('pabriks', 'PabrikController');

    // Gudang
    Route::delete('gudangs/destroy', 'GudangController@massDestroy')->name('gudangs.massDestroy');
    Route::resource('gudangs', 'GudangController');

    // Test
    Route::delete('tests/destroy', 'TestController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestController');

    // Departement
    Route::delete('departements/destroy', 'DepartementController@massDestroy')->name('departements.massDestroy');
    Route::resource('departements', 'DepartementController');

    // Kota
    Route::delete('kota/destroy', 'KotaController@massDestroy')->name('kota.massDestroy');
    Route::resource('kota', 'KotaController');

    // Grup Mitra Bisnis One
    Route::delete('grup-mitra-bisnis-ones/destroy', 'GrupMitraBisnisOneController@massDestroy')->name('grup-mitra-bisnis-ones.massDestroy');
    Route::resource('grup-mitra-bisnis-ones', 'GrupMitraBisnisOneController');

    // Grup Mitra Bisnis Two
    Route::delete('grup-mitra-bisnis-twos/destroy', 'GrupMitraBisnisTwoController@massDestroy')->name('grup-mitra-bisnis-twos.massDestroy');
    Route::resource('grup-mitra-bisnis-twos', 'GrupMitraBisnisTwoController');

    // Grup Mitra Bisnis Three
    Route::delete('grup-mitra-bisnis-threes/destroy', 'GrupMitraBisnisThreeController@massDestroy')->name('grup-mitra-bisnis-threes.massDestroy');
    Route::resource('grup-mitra-bisnis-threes', 'GrupMitraBisnisThreeController');

    // Periode Rekuring
    Route::delete('periode-rekurings/destroy', 'PeriodeRekuringController@massDestroy')->name('periode-rekurings.massDestroy');
    Route::resource('periode-rekurings', 'PeriodeRekuringController');

    // Kas Bank
    Route::delete('kas-banks/destroy', 'KasBankController@massDestroy')->name('kas-banks.massDestroy');
    Route::resource('kas-banks', 'KasBankController');

    // Pegawai
    Route::delete('pegawais/destroy', 'PegawaiController@massDestroy')->name('pegawais.massDestroy');
    Route::resource('pegawais', 'PegawaiController');

    // Sales
    Route::delete('sales/destroy', 'SalesController@massDestroy')->name('sales.massDestroy');
    Route::resource('sales', 'SalesController');

    // Penagih
    Route::delete('penagihs/destroy', 'PenagihController@massDestroy')->name('penagihs.massDestroy');
    Route::resource('penagihs', 'PenagihController');

    // Level Harga
    Route::delete('level-hargas/destroy', 'LevelHargaController@massDestroy')->name('level-hargas.massDestroy');
    Route::resource('level-hargas', 'LevelHargaController');

    // Mata Uang
    Route::delete('mata-uangs/destroy', 'MataUangController@massDestroy')->name('mata-uangs.massDestroy');
    Route::resource('mata-uangs', 'MataUangController');

    // Proyek
    Route::delete('proyeks/destroy', 'ProyekController@massDestroy')->name('proyeks.massDestroy');
    Route::resource('proyeks', 'ProyekController');

    // Cabang
    Route::delete('cabangs/destroy', 'CabangController@massDestroy')->name('cabangs.massDestroy');
    Route::post('cabangs/media', 'CabangController@storeMedia')->name('cabangs.storeMedia');
    Route::post('cabangs/ckmedia', 'CabangController@storeCKEditorImages')->name('cabangs.storeCKEditorImages');
    Route::resource('cabangs', 'CabangController');

    // Pajak
    Route::delete('pajaks/destroy', 'PajakController@massDestroy')->name('pajaks.massDestroy');
    Route::resource('pajaks', 'PajakController');

    // Terminal Kasir
    Route::delete('terminal-kasirs/destroy', 'TerminalKasirController@massDestroy')->name('terminal-kasirs.massDestroy');
    Route::resource('terminal-kasirs', 'TerminalKasirController');

    // Mesin Edc
    Route::delete('mesin-edcs/destroy', 'MesinEdcController@massDestroy')->name('mesin-edcs.massDestroy');
    Route::resource('mesin-edcs', 'MesinEdcController');

    // Tipe Kartu Kredit
    Route::delete('tipe-kartu-kredits/destroy', 'TipeKartuKreditController@massDestroy')->name('tipe-kartu-kredits.massDestroy');
    Route::resource('tipe-kartu-kredits', 'TipeKartuKreditController');

    // Channel
    Route::delete('channels/destroy', 'ChannelController@massDestroy')->name('channels.massDestroy');
    Route::resource('channels', 'ChannelController');

    // Satuan
    Route::delete('satuans/destroy', 'SatuanController@massDestroy')->name('satuans.massDestroy');
    Route::resource('satuans', 'SatuanController');

    // Mitra Bisnis
    Route::delete('mitra-bisnis/destroy', 'MitraBisnisController@massDestroy')->name('mitra-bisnis.massDestroy');
    Route::post('mitra-bisnis/media', 'MitraBisnisController@storeMedia')->name('mitra-bisnis.storeMedia');
    Route::post('mitra-bisnis/ckmedia', 'MitraBisnisController@storeCKEditorImages')->name('mitra-bisnis.storeCKEditorImages');
    Route::resource('mitra-bisnis', 'MitraBisnisController');

    // Alamat Mitra Bisnis
    Route::delete('alamat-mitra-bisnis/destroy', 'AlamatMitraBisnisController@massDestroy')->name('alamat-mitra-bisnis.massDestroy');
    Route::resource('alamat-mitra-bisnis', 'AlamatMitraBisnisController');

    // Kontak Mitra Bisnis
    Route::delete('kontak-mitra-bisnis/destroy', 'KontakMitraBisnisController@massDestroy')->name('kontak-mitra-bisnis.massDestroy');
    Route::resource('kontak-mitra-bisnis', 'KontakMitraBisnisController');

    // Hutang Piutang Mitra Bisnis
    Route::delete('hutang-piutang-mitra-bisnis/destroy', 'HutangPiutangMitraBisnisController@massDestroy')->name('hutang-piutang-mitra-bisnis.massDestroy');
    Route::resource('hutang-piutang-mitra-bisnis', 'HutangPiutangMitraBisnisController');

    // Supplier Item
    Route::delete('supplier-items/destroy', 'SupplierItemController@massDestroy')->name('supplier-items.massDestroy');
    Route::resource('supplier-items', 'SupplierItemController');

    // Stok Item
    Route::delete('stok-items/destroy', 'StokItemController@massDestroy')->name('stok-items.massDestroy');
    Route::resource('stok-items', 'StokItemController');

    // Pajak Item
    Route::delete('pajak-items/destroy', 'PajakItemController@massDestroy')->name('pajak-items.massDestroy');
    Route::resource('pajak-items', 'PajakItemController');

    // Harga Jual Item
    Route::delete('harga-jual-items/destroy', 'HargaJualItemController@massDestroy')->name('harga-jual-items.massDestroy');
    Route::resource('harga-jual-items', 'HargaJualItemController');

    // Peserta
    Route::delete('peserta/destroy', 'PesertaController@massDestroy')->name('peserta.massDestroy');
    Route::resource('peserta', 'PesertaController', ['except' => ['show']]);

    // Transaksi
    Route::delete('transaksis/destroy', 'TransaksiController@massDestroy')->name('transaksis.massDestroy');
    Route::resource('transaksis', 'TransaksiController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
