<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MbtiInterprestationController;
use App\Http\Controllers\MbtiCharacteristicsController;
use App\Http\Controllers\MbtiQuestionController;

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

// Route::get('/', function () {
//     return view('home/test');
// });
Route::get('/', 'HomeController@index');
Route::get('tes', 'HomeController@tes');
Route::post('hasil-tes', 'HomeController@hasilTes')->name('hasil-tes');
Route::post('cekToken', 'HomeController@cekToken')->name('cek-token');

Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('auth','AuthController@authCheck')->name('auth.check');
Route::get('registrasi', 'AuthController@register')->name('auth.regist');
// Route::get('forget-password', 'AuthController@forgetPassword')->name('auth.forgetPassword');
// Route::post('forget-password-sent', 'AuthController@forgetPasswordSent')->name('auth.forgetPasswordSent');
// Route::get('reset-password/{email}/{token}', 'AuthController@resetPassword')->name('auth.resetPassword');
// Route::post('change-password', 'AuthController@changePassword')->name('auth.changePassword');
Route::post('regist-store', 'AuthController@store')->name('auth.store');
Route::post('logout','AuthController@logout')->name('auth.logout');
Route::get('verify-email/{email}','AuthController@verifyEmail')->name('email.verify');

Route::group(['prefix' => 'admin'], function() {
    Route::get('', 'AdminController@index')->name('admin.index');
    Route::get('user', 'AdminController@user')->name('admin.user');
    Route::get('perusahaan', 'AdminController@perusahaan')->name('admin.perusahaan');

    Route::get('profile', 'AdminController@profile')->name('admin.profile');
    Route::get('profile-edit', 'AdminController@profileEdit')->name('admin.profile-edit');
    Route::post('profile-update', 'AdminController@profileUpdate')->name('admin.profile-update');
    Route::post('pass-update', 'AdminController@updatePassword')->name('admin.profile-pass');

    Route::group(['prefix' => 'user'], function() {
        Route::get('create', 'UserController@create')->name('user.create');
        Route::get('{id}/show', 'UserController@show')->name('user.show');
        Route::get('{id}/edit', 'UserController@edit')->name('user.edit');
        Route::get('{id}/accepted', 'UserController@accepted')->name('user.accepted');
        Route::get('{id}/decline', 'UserController@decline')->name('user.decline');

        Route::post('store', 'UserController@store')->name('user.store');
        Route::post('update', 'UserController@update')->name('user.update');

        Route::delete('{id}/delete', 'UserController@delete')->name('user.delete');
    });
    Route::group(['prefix' => 'perusahaan'], function() {
        Route::get('{id}/show', 'AdminController@showPerusahaan')->name('prshn.show');
        Route::get('{id}/edit', 'AdminController@editPerusahaan')->name('prshn.edit');
        Route::get('{id}/accepted', 'AdminController@acceptedPerusahaan')->name('prshn.accepted');
        Route::get('{id}/decline', 'AdminController@declinePerusahaan')->name('prshn.decline');
        Route::post('update', 'AdminController@updatePerusahaan')->name('prshn.update');
        Route::get('{id}/delete', 'AdminController@perusahaan')->name('prshn.delete');
    });
    Route::group(['prefix' => 'mbti-interprestation'], function() {
        Route::get('', 'MbtiInterprestationController@index')->name('mbti.interpres');
        Route::get('{id}/edit', 'MbtiInterprestationController@edit')->name('mbti.interpres.edit');
        Route::post('update', 'MbtiInterprestationController@update')->name('mbti.interpres.update');
    });
    Route::group(['prefix' => 'mbti-question'], function() {
        Route::get('', 'MbtiquestionController@index')->name('mbti.question');
        Route::get('{id}/edit', 'MbtiquestionController@edit')->name('mbti.question.edit');
        Route::post('update', 'MbtiquestionController@update')->name('mbti.question.update');
    });
    Route::group(['prefix' => 'mbti-characteristic'], function() {
        Route::get('', 'MbtiCharacteristicsController@index')->name('mbti.characteristic');
        Route::get('create', 'MbtiCharacteristicsController@create')->name('mbti.characteristic.create');
        Route::get('{id}/edit', 'MbtiCharacteristicsController@edit')->name('mbti.characteristic.edit');
        Route::post('store', 'MbtiCharacteristicsController@store')->name('mbti.characteristic.store');
        Route::post('update', 'MbtiCharacteristicsController@update')->name('mbti.characteristic.update');
        Route::post('{id}/delete', 'MbtiCharacteristicsController@delete')->name('mbti.characteristic.delete');
    });
    Route::group(['prefix' => 'mbti-development'], function() {
        Route::get('', 'MbtiDevelopmentSuggestionController@index')->name('mbti.development');
        Route::get('create', 'MbtiDevelopmentSuggestionController@create')->name('mbti.development.create');
        Route::get('{id}/edit', 'MbtiDevelopmentSuggestionController@edit')->name('mbti.development.edit');
        Route::post('store', 'MbtiDevelopmentSuggestionController@store')->name('mbti.development.store');
        Route::post('update', 'MbtiDevelopmentSuggestionController@update')->name('mbti.development.update');
        Route::post('{id}/delete', 'MbtiDevelopmentSuggestionController@delete')->name('mbti.development.delete');
    });
    Route::group(['prefix' => 'mbti-carrier'], function() {
        Route::get('', 'MbtiCarrierSuggestionController@index')->name('mbti.carrier');
        Route::get('{id}/edit', 'MbtiCarrierSuggestionController@edit')->name('mbti.carrier.edit');
        Route::post('update', 'MbtiCarrierSuggestionController@update')->name('mbti.carrier.update');
    });
});
Route::prefix('perusahaan')->group(function () {
    Route::get('', 'PerusahaanController@index');
    Route::get('profile', 'PerusahaanController@profile')->name('perusahaan.profile');
    Route::get('profile-edit', 'PerusahaanController@profileEdit')->name('perusahaan.profile-edit');
    Route::post('profile-update', 'PerusahaanController@profileUpdate')->name('perusahaan.profile-update');
    Route::post('pass-update', 'PerusahaanController@updatePassword')->name('perusahaan.profile-pass');
    Route::get('data-perusahaan', 'PerusahaanController@perusahaan')->name('perusahaan.data');
    Route::get('data-perusahaan/add', 'PerusahaanController@perusahaanAdd')->name('perusahaan.add');
    Route::get('data-perusahaan/edit', 'PerusahaanController@perusahaanEdit')->name('perusahaan.edit');


    Route::post('getkota', 'PerusahaanController@getKota')->name('perusahaan.kota');
    Route::post('getkecamatan', 'PerusahaanController@getKecamatan')->name('perusahaan.kecamatan');
    Route::post('getkelurahan', 'PerusahaanController@getKelurahan')->name('perusahaan.kelurahan');

    Route::post('store', 'PerusahaanController@store')->name('perusahaan.store');
    Route::post('update', 'PerusahaanController@update')->name('perusahaan.update');

    Route::get('tes', 'PerusahaanController@tesMBTI')->name('perusahaan.tes');
    Route::get('tes/create', 'PerusahaanController@tesCreate')->name('perusahaan.tes.create');
    Route::get('tes/{id}/edit', 'PerusahaanController@tesEdit')->name('perusahaan.tes.edit');
    Route::get('tes/{id}/view', 'PerusahaanController@tesShow')->name('perusahaan.tes.show');
    Route::get('tes/{id}/exportExcel', 'PerusahaanController@tesExportExcel')->name('perusahaan.tes.export.excel');

    Route::post('tes/store', 'PerusahaanController@tesStore')->name('perusahaan.tes.store');
    Route::post('tes/update', 'PerusahaanController@tesUpdate')->name('perusahaan.tes.update');

    Route::delete('tes/{id}/delete', 'PerusahaanController@tesDelete')->name('perusahaan.tes.delete');

    Route::get('tes/peserta/{idPeserta}', 'PerusahaanController@pesertaShow')->name('perusahaan.peserta.tes.show');


});