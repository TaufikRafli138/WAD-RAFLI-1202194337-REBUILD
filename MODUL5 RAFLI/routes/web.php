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
Route::get('/', function () {
    return view('Base.index');
});


Route::get('CIEVAKSIN', ['uses' =>'VaccinesController@index']);
Route::get('CIEVAKSIN/TambahDataVaksin', ['as' => ' CIEVAKSIN.TambahDataVaksin', 'uses' =>'VaccinesController@TambahDataVaksin']);
Route::get('CIEVAKSIN/edit/{id}', ['uses' =>'VaccinesController@edit']);
Route::get('PasienKopid', ['uses' =>'PatientController@index']);
Route::get('PasienKopid/CieVaksin', ['as' => 'PasienKopid.suntik', 'uses' =>'PatientController@Daftar_Vaksin']);
Route::get('PasienKopid/Tambah_Data_Pasien/{id}', function ($id) {
    return view('patient.Daftar_pasien',compact('id'));
});
Route::put('CIEVAKSIN/update/{id}', ['uses' =>'VaccinesController@update']);
Route::resource('PasienKopid', PatientController::class);
Route::resource('CIEVAKSIN', VaccinesController::class);


