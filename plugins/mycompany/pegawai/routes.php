<?php

Route::group(['middleware' => ['web']], function () {

    // Rute untuk Autentikasi
    Route::get('/login', 'MyCompany\Pegawai\Controllers\Auth@login')->name('login');
    Route::post('/login', 'MyCompany\Pegawai\Controllers\Auth@loginProcess');
    Route::get('/logout', 'MyCompany\Pegawai\Controllers\Auth@logout');

    // Rute untuk Presensi
    Route::get('/presensi', 'MyCompany\Pegawai\Controllers\PresensiController@index');
    Route::post('/presensi/masuk', 'MyCompany\Pegawai\Controllers\PresensiController@masuk');
    Route::post('/presensi/pulang', 'MyCompany\Pegawai\Controllers\PresensiController@pulang');

});
