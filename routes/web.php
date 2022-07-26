<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SampelUjiController;
use App\Http\Controllers\Admin\ParameterSampelController;
use App\Http\Controllers\Admin\PejabatController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PengujianOrderController;
use App\Http\Controllers\Admin\PengambilanSampelOrderController;


use App\Http\Controllers\Pelanggan\DashboardController as PelangganDashboardController;
use App\Http\Controllers\Pelanggan\PengujianController as PelangganPengujianController;
use App\Http\Controllers\Pelanggan\PengujianSelesaiController as PelangganPengujianSelesaiController;
use App\Http\Controllers\Pelanggan\PengambilanSampelController as PelangganPengambilanSampelController;
use App\Http\Controllers\Pelanggan\ProfilController as PelangganProfilController;
use App\Http\Controllers\Pelanggan\DaftarHargaController as PelangganDaftarHargaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//BAGIAN ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('index');
        Route::get('apiwithoutkey', [DashboardController::class, 'apiWithoutKey'])->name('apiWithoutKey');
    });
    //master
    Route::prefix('sampel-uji')->name('sampel-uji.')->group(function () {
        Route::get('', [SampelUjiController::class, 'index'])->name('index');
        Route::post('store', [SampelUjiController::class, 'store'])->name('store');
        Route::put('update', [SampelUjiController::class, 'update'])->name('update');
        Route::delete('delete', [SampelUjiController::class, 'delete'])->name('delete');
    });
    //master
    Route::prefix('parameter-sampel')->name('parameter-sampel.')->group(function () {
        Route::get('', [ParameterSampelController::class, 'index'])->name('index');
        Route::post('store', [ParameterSampelController::class, 'store'])->name('store');
        Route::put('update', [ParameterSampelController::class, 'update'])->name('update');
        Route::delete('delete', [ParameterSampelController::class, 'delete'])->name('delete');
    });
    //master
    Route::prefix('pejabat')->name('pejabat.')->group(function () {
        Route::get('', [PejabatController::class, 'index'])->name('index');
        Route::post('store', [PejabatController::class, 'store'])->name('store');
        Route::put('update', [PejabatController::class, 'update'])->name('update');
        Route::delete('delete', [PejabatController::class, 'delete'])->name('delete');
    });

    Route::prefix('akun')->name('akun.')->group(function () {
        Route::get('', [AkunController::class, 'index'])->name('index');
        Route::post('store', [AkunController::class, 'store'])->name('store');
        Route::put('update', [AkunController::class, 'update'])->name('update');
        Route::delete('delete', [AkunController::class, 'delete'])->name('delete');

        Route::get('pelanggan', [AkunController::class, 'pelangganIndex'])->name('pelangganIndex');
        Route::put('pelangganVerif', [AkunController::class, 'pelangganVerif'])->name('pelangganVerif');
        Route::delete('pelangganDelete', [AkunController::class, 'pelangganDelete'])->name('pelangganDelete');
    });

    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('changePassword/{id}', [ProfilController::class, 'changePassword'])->name('changePassword');
        Route::put('savePassword/{id}', [ProfilController::class, 'savePassword'])->name('savePassword');
    });

    Route::prefix('pengujian')->name('pengujian.')->group(function () {
        Route::get('', [PengujianOrderController::class, 'index'])->name('index');
        Route::get('getOrder/{id}', [PengujianOrderController::class, 'getOrder'])->name('getOrder');
        Route::put('gantiStatus', [PengujianOrderController::class, 'gantiStatus'])->name('gantiStatus');
        Route::get('cetakSkr/{id}', [PengujianOrderController::class, 'cetakSkr'])->name('cetakSkr');
        Route::get('cetakTbp/{id}', [PengujianOrderController::class, 'cetakTbp'])->name('cetakTbp');
        Route::get('hasilUji/{order}/sampel/{id}', [PengujianOrderController::class, 'hasilUji'])->name('hasilUji');
        Route::put('updateHasil', [PengujianOrderController::class, 'updateHasil'])->name('updateHasil');
        Route::get('cetakLaporanSementara/{order}/{sampel}', [PengujianOrderController::class, 'cetakLaporanSementara'])->name('cetakLaporanSementara');
        Route::get('cetakSertifikat/{order}/{sampel}', [PengujianOrderController::class, 'cetakSertifikat'])->name('cetakSertifikat');
        // Route::post('store', [PejabatController::class, 'store'])->name('store');
        // Route::put('update', [PejabatController::class, 'update'])->name('update');
        // Route::delete('delete', [PejabatController::class, 'delete'])->name('delete');
    });

    Route::prefix('pengambilanSampel')->name('pengambilanSampel.')->group(function () {
        Route::get('', [PengambilanSampelOrderController::class, 'index'])->name('index');
        Route::get('getOrder/{id}', [PengambilanSampelOrderController::class, 'getOrder'])->name('getOrder');
        Route::put('gantiStatus', [PengambilanSampelOrderController::class, 'gantiStatus'])->name('gantiStatus');
        Route::get('cetakLaporanSementara', [PengambilanSampelOrderController::class, 'cetakLaporanSementara'])->name('cetakLaporanSementara');
        Route::get('cetakSertifikat', [PengambilanSampelOrderController::class, 'cetakSertifikat'])->name('cetakSertifikat');
        Route::get('cetakSkr/{id}', [PengambilanSampelOrderController::class, 'cetakSkr'])->name('cetakSkr');
        Route::get('cetakTbp', [PengambilanSampelOrderController::class, 'cetakTbp'])->name('cetakTbp');
        // Route::post('store', [PejabatController::class, 'store'])->name('store');
        // Route::put('update', [PejabatController::class, 'update'])->name('update');
        // Route::delete('delete', [PejabatController::class, 'delete'])->name('delete');
    });
});

//bagian pelanggan
Route::prefix('pelanggan')->name('pelanggan.')->middleware(['auth', 'isPelanggan'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', [PelangganDashboardController::class, 'index'])->name('index');
    });

    Route::prefix('pengujian')->name('pengujian.')->group(function () {
        Route::get('', [PelangganPengujianController::class, 'index'])->name('index');
        Route::post('createOrder', [PelangganPengujianController::class, 'createOrder'])->name('createOrder');
        Route::delete('deleteOrder', [PelangganPengujianController::class, 'deleteOrder'])->name('deleteOrder');
        Route::post('sampel', [PelangganPengujianController::class, 'sampel'])->name('sampel');
        Route::get('getOrder/{id}', [PelangganPengujianController::class, 'getOrder'])->name('getOrder');
        Route::get('getParameter/{id}', [PelangganPengujianController::class, 'getParameter'])->name('getParameter');
         
        Route::get('createSampel/{id}', [PelangganPengujianController::class, 'createSampel'])->name('createSampel');
        Route::post('createSampelParameter', [PelangganPengujianController::class, 'createSampelParameter'])->name('createSampelParameter');
        Route::get('editSampelParameter/{id}', [PelangganPengujianController::class, 'editSampelParameter'])->name('editSampelParameter');
        Route::put('updateSampelParameter/{id}', [PelangganPengujianController::class, 'updateSampelParameter'])->name('updateSampelParameter');
        Route::delete('deleteSampelParameter', [PelangganPengujianController::class, 'deleteSampelParameter'])->name('deleteSampelParameter');

        Route::post('sendOrder', [PelangganPengujianController::class, 'sendOrder'])->name('sendOrder');
        Route::get('tracking/{id}', [PelangganPengujianController::class, 'tracking'])->name('tracking');

    });

    //pengujian selesai (pelanggan)
    Route::prefix('pengujianSelesai')->name('pengujianSelesai.')->group(function () {
        Route::get('', [PelangganPengujianSelesaiController::class, 'index'])->name('index');

    });

    Route::prefix('pengambilanSampel')->name('pengambilanSampel.')->group(function () {
        Route::get('', [PelangganPengambilanSampelController::class, 'index'])->name('index');
        Route::get('createOrder', [PelangganPengambilanSampelController::class, 'createOrder'])->name('createOrder');
        Route::post('storeOrder', [PelangganPengambilanSampelController::class, 'storeOrder'])->name('storeOrder');
        Route::get('editOrder/{id}', [PelangganPengambilanSampelController::class, 'editOrder'])->name('editOrder');
        Route::put('updateOrder/{id}', [PelangganPengambilanSampelController::class, 'updateOrder'])->name('updateOrder');
        Route::delete('deleteOrder', [PelangganPengambilanSampelController::class, 'deleteOrder'])->name('deleteOrder');

        Route::post('sendOrder', [PelangganPengambilanSampelController::class, 'sendOrder'])->name('sendOrder');
        Route::get('tracking/{id}', [PelangganPengambilanSampelController::class, 'tracking'])->name('tracking');
    });

    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('changePassword/{id}', [PelangganProfilController::class, 'changePassword'])->name('changePassword');
        Route::put('savePassword/{id}', [PelangganProfilController::class, 'savePassword'])->name('savePassword');
    });

    Route::prefix('daftarHarga')->name('daftarHarga.')->group(function () {
        Route::get('pengambilanSampel', [PelangganDaftarHargaController::class, 'pengambilanSampel'])->name('pengambilanSampel');
        Route::get('pengujian', [PelangganDaftarHargaController::class, 'pengujian'])->name('pengujian');
    });
});


// innovation-report.store0/{id}

// Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
// Route::get('dropdownlist','DataController@getCountries');
// Route::get('dropdownlist/getstates/{id}','DataController@getStates');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cek-biaya', [App\Http\Controllers\HomeController::class, 'biaya'])->name('biaya');

