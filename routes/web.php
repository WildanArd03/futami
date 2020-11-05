<?php

use Illuminate\Support\Facades\Route;

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

// Route::match(['get', 'post'],'/tambahmulti', function () {
//     return view('tambahmulti');
// });
// Route::post('/tambahmulti/simpan','tambahmulti@simpan');



// login
Route::get('/login', 'otentikasi\OtentikasiController@index' )-> name('login') ;
Route::post('/login', 'otentikasi\OtentikasiController@login') -> name('login');
Route::get('/logout', 'otentikasi\OtentikasiController@logout') -> name('logout');

//login group midleware
Route::group(['middleware' => 'auth'], function () {
    Route::resource('ketentuanklaim','prokomKetentuanKlaimController');
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('/', function () {
        return view('home');
    });
    // tambah user
    Route::get('/lihatuser', 'otentikasi\OtentikasiController@lihatuser' )-> name('lihat-user') ;
    Route::get('/tambahuser', 'otentikasi\OtentikasiController@tambah' )-> name('tambah-user') ;
    Route::post('/tambahuser/simpan', 'otentikasi\OtentikasiController@simpan') -> name('tambah-user-simpan');
    //profile user
    Route::get('/profile', 'otentikasi\OtentikasiController@profile' )-> name('profile') ;
    Route::post('/profile/simpan', 'otentikasi\OtentikasiController@profilesimpan') -> name('profile-user-simpan');
    //prokom form F1
    Route::get('prokom', 'prokomController@index' ) -> name('prokomF1-index');
    Route::get('prokom/tambah', 'prokomController@tambah' ) -> name('prokomF1-tambah');
    Route::post('prokom/simpan', 'prokomController@simpan' ) -> name('prokomF1-simpan');
    
    //prokom form jenis program
    Route::get('prokom/jenisprogram/', 'prokomJenisProgramController@index' ) -> name('prokomF1-index-jenis-program');
    Route::get('prokom/jenisprogram/tambah', 'prokomJenisProgramController@tambah' ) -> name('prokomF1-tambah-jenis-program');
    Route::post('prokom/jenisprogram/simpan', 'prokomJenisProgramController@simpan' ) -> name('prokomF1-simpan-jenis-program');
    
    
    //prokom form channel program
    Route::get('prokom/channelprogram/', 'prokomChannelController@index' ) -> name('prokomF1-index-channel-program');
    Route::get('prokom/channelprogram/tambah', 'prokomChannelController@tambah' ) -> name('prokomF1-tambah-channel-program');
    Route::post('prokom/channelprogram/simpan', 'prokomChannelController@simpan' ) -> name('prokomF1-simpan-channel-program');
    
    //prokom form kode wilayah
    Route::get('prokom/kodewilayah/', 'prokomKodeWilayahController@index' ) -> name('prokomF1-index-kode-wilayah');
    Route::get('prokom/kodewilayah/tambah', 'prokomKodeWilayahController@tambah' ) -> name('prokomF1-tambah-kode-wilayah');
    Route::post('prokom/kodewilayah/simpan', 'prokomKodeWilayahController@simpan' ) -> name('prokomF1-simpan-kode-wilayah');
    Route::delete('prokom/kodewilayah/hapus', 'prokomKodeWilayahController@hapus' ) -> name('prokomF1-hapus-kode-wilayah');
    Route::get('prokom/kodewilayah/edit/{id}', 'prokomKodeWilayahController@edit' ) -> name('prokomF1-edit-kode-wilayah');
    Route::put('prokom/kodewilayah/edit/{id}', 'prokomKodeWilayahController@update' );
    
    //prokom form metode klaim
    Route::get('prokom/metodeklaim/', 'prokomMetodeKlaimController@index' ) -> name('prokomF1-index-metode-klaim');
    Route::get('prokom/metodeklaim/tambah', 'prokomMetodeKlaimController@tambah' ) -> name('prokomF1-tambah-metode-klaim');
    Route::post('prokom/metodeklaim/simpan', 'prokomMetodeKlaimController@simpan' ) -> name('prokomF1-simpan-metode-klaim');
    Route::delete('prokom/metodeklaim/hapus', 'prokomMetodeKlaimController@hapus' ) -> name('prokomF1-hapus-metode-klaim');
    Route::get('prokom/metodeklaim/edit/{id}', 'prokomMetodeKlaimController@edit' ) -> name('prokomF1-edit-metode-klaim');
    Route::put('prokom/metodeklaim/edit/{id}', 'prokomMetodeKlaimController@update' );
    
    //prokom form Cost Sheet
    Route::get('prokom/costsheet/', 'costsheetController@index' ) -> name('prokomF1-index-chost-sheet');
    Route::get('prokom/costsheet/tambah', 'costsheetController@tambah' ) -> name('prokomF1-tambah-chost-sheet');
    Route::post('prokom/costsheet/simpan', 'costsheetController@simpan' ) -> name('prokomF1-simpan-chost-sheet');
    Route::get('/prokom/costsheet/p/{id}', 'costsheetController@print' )-> name('costsheet-print') ;
    Route::POST('prokom/costsheet/update/{id}', 'costsheetController@update' ) -> name('costsheet-update');
    Route::get('prokom/costsheet/detail/{id}', 'costsheetController@detail' ) -> name('costsheet-detail');
    
    //Kelengkapan dokumen
    Route::get('/prokom/kelengkapandokumen', 'kelengkapandokumenController@index' )-> name('kelengkapan-dokumen-index') ;
    Route::get('/prokom/kelengkapandokumen/p/{id}', 'kelengkapandokumenController@print' )-> name('kelengkapan-dokumen-print');
    Route::get('/prokom/kelengkapandokumen/tambah', 'kelengkapandokumenController@tambah' )-> name('kelengkapan-dokumen-tambah') ;
    Route::post('/prokom/kelengkapandokumen/simpan', 'kelengkapandokumenController@simpan' )-> name('kelengkapan-dokumen-simpan') ;
    Route::get('/prokom/kelengkapandokumen/lampiran', 'kelengkapandokumenController@tambahlampiran' )-> name('kelengkapan-dokumen-tambah-lampiran') ;
    Route::post('/prokom/kelengkapandokumen/simpanlampiran', 'kelengkapandokumenController@simpanlampiran' )-> name('kelengkapan-dokumen-simpan-lampiran') ;
    Route::POST('prokom/kelengkapandokumen/update/{id}', 'kelengkapandokumenController@update' ) -> name('kelengkapan-dokumen-update');
    Route::get('prokom/kelengkapandokumen/detail/{id}', 'kelengkapandokumenController@detail' ) -> name('kelengkapan-dokumen-detail');
    Route::delete('/prokom/jenisprogram/hapus/{id}', 'prokomJenisProgramController@hapus' ) -> name('prokomF1-jenis-program-hapus');
    Route::delete('/prokom/channelprogram/hapus/{id}', 'prokomChannelController@hapus' ) -> name('prokomF1-channel-program-hapus');
    Route::get('/prokom/kelengkapandokumen/p/{id}', 'kelengkapandokumenController@print' )-> name('kelengkapan-dokumen-print') ;
    Route::get('/prokom/kelengkapandokumen/{id}', 'kelengkapandokumenController@detail' )-> name('kelengkapan-dokumen-detail') ;
    
    //prokom view with get id
    Route::get('/prokom/print/{id}', 'prokomController@print' ) -> name('prokomF1-print');
    Route::post('prokom/update/{id}', 'prokomController@update' ) -> name('prokomF1-update');
    Route::get('/prokom/detail/{id}', 'prokomController@detail' ) -> name('prokomF1-detail');
    Route::get('/prokom//{id}', 'prokomController@hapus' ) -> name('prokomF1-hapus');
});







