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
Route::get('auth/user/data', function () {
    return Auth::user();
});


Route::get('/cart', 'FrontController@cart')->name('frontend.cart');
Route::get('/patient/order', 'Patient\OrderController@myOrder')->name('frontend.patient.order');
Route::get('/patient/cancel/order/{id}', 'Patient\OrderController@cancelOrder')->name('frontend.patient.cancelOrder');
Route::post('/checkout/pending',
    'Patient\OrderController@checkoutPending')
    ->name('frontend.checkout.pending');

Route::get('/checkout', 'FrontController@checkout')->name('frontend.checkout');



Route::get('/about_us','FrontController@about_us')->name('frontend.about_us');
Route::get('/admin/start/register','Admin\AuthController@getRegister')->name('admin.frontend.register');
Route::post('/admin/start/store','Admin\AuthController@registerAdmin')->name('admin.frontend.store');


Route::get('/medicine/detail/{id}','FrontController@medicineDetail')->name('frontend.medicine.detail');
Route::get('/all/medicines','FrontController@medicines')->name('frontend.medicine.all');
Route::post('/search/medicines','FrontController@searchMedecine')->name('frontend.medicine.search');
Route::get('/search/pharmacy/location/{pharmacy}','FrontController@pharmacyLocation')->name('frontend.pharmacy.location');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => '/home/'], function () {


//    user and admin account edition
    Route::get('profiles/change/password', [
        'uses' => 'ProfileController@changePassword',
        'as' => 'admin.getPassword'
    ]);
    Route::post('profiles/update/password', [
        'uses' => 'ProfileController@updatePassword',
        'as' => 'admin.updatePassword'
    ]);

    Route::get('profiles/view/profile', [
        'uses' => 'ProfileController@viewProfile',
        'as' => 'admin.viewProfile'
    ]);
    Route::get('profiles/getInfo', [
        'uses' => 'ProfileController@getInfo',
        'as' => 'admin.getInfo'
    ]);
    Route::post('profiles/update/info', [
        'uses' => 'ProfileController@updateInfo',
        'as' => 'admin.updateInfo'
    ]);
    Route::get('profiles/get/profile', [
        'uses' => 'ProfileController@getProfile',
        'as' => 'admin.getProfile'
    ]);
    Route::post('profiles/update/profile', [
        'uses' => 'ProfileController@updateProfile',
        'as' => 'admin.updateProfile'
    ]);
//Pharmacy routers

    Route::get('pharmacy', [
        'uses' => 'Admin\PharmacyController@index',
        'as' => 'admin.pharmacy.index'
    ]);
    Route::get('get/pharmacy', [
        'uses' => 'Admin\PharmacyController@getPharmacy',
        'as' => 'admin.pharmacy.getPharmacy'
    ]);
    Route::post('post/pharmacy', [
        'uses' => 'Admin\PharmacyController@store',
        'as' => 'admin.pharmacy.save'
    ]);
    Route::post('post/pharmacist', [
        'uses' => 'Admin\PharmacyController@registerPharmacist',
        'as' => 'admin.pharmacist.registerPharmacist'
    ]);
    Route::get('pharmacy/show/{id}', [
        'uses' => 'Admin\PharmacyController@show',
        'as' => 'admin.pharmacy.show'
    ]);
    Route::delete('/pharmacy/delete/{id}', [
        'uses' => 'Admin\PharmacyController@delete',
        'as' => 'admin.pharmacy.delete'
    ]);
    Route::post('update/pharmacy', [
        'uses' => 'Admin\PharmacyController@update',
        'as' => 'admin.pharmacy.update'
    ]);

    Route::get('pharmacist', [
        'uses' => 'Admin\PharmacyController@pharmacist',
        'as' => 'admin.pharmacist.pharmacist'
    ]);
    Route::get('get/pharmacist', [
        'uses' => 'Admin\PharmacyController@getPharmacist',
        'as' => 'admin.pharmacist.getPharmacist'
    ]);
    Route::get('patient', [
        'uses' => 'Admin\PharmacyController@patient',
        'as' => 'admin.patient.patient'
    ]);
    Route::get('get/patient', [
        'uses' => 'Admin\PharmacyController@getPatient',
        'as' => 'admin.patient.getPatient'
    ]);
    Route::get('medecines', [
        'uses' => 'Admin\PharmacyController@medecines',
        'as' => 'admin.medecines.medecines'
    ]);
    Route::get('get/medecines', [
        'uses' => 'Admin\PharmacyController@getMedecines',
        'as' => 'admin.medecines.getMedecines'
    ]);
    Route::get('insurances', [
        'uses' => 'Admin\PharmacyController@insurances',
        'as' => 'admin.insurances.insurances'
    ]);
    Route::get('get/insurances', [
        'uses' => 'Admin\PharmacyController@getInsurances',
        'as' => 'admin.insurances.getInsurances'
    ]);




    Route::get('pharmacy/insurance', [
        'uses' => 'Pharmacist\InsuranceController@index',
        'as' => 'pharmacist.insurance.index'
    ]);
    Route::get('get/pharmacy/insurance', [
        'uses' => 'Pharmacist\InsuranceController@getInsurances',
        'as' => 'pharmacist.insurance.getInsurances'
    ]);
    Route::post('post/pharmacy/insurance', [
        'uses' => 'Pharmacist\InsuranceController@store',
        'as' => 'pharmacist.insurance.save'
    ]);
    Route::post('post/pharmacist/insurance', [
        'uses' => 'Pharmacist\InsuranceController@registerPharmacist',
        'as' => 'pharmacist.insurance.registerPharmacist'
    ]);
    Route::get('pharmacy/insurance/show/{id}', [
        'uses' => 'Pharmacist\InsuranceController@show',
        'as' => 'pharmacist.insurance.show'
    ]);
    Route::delete('/pharmacy/insurance/delete/{id}', [
        'uses' => 'Pharmacist\InsuranceController@delete',
        'as' => 'pharmacist.insurance.delete'
    ]);
    Route::post('update/pharmacy/insurance', [
        'uses' => 'Pharmacist\InsuranceController@update',
        'as' => 'pharmacist.insurance.update'
    ]);

    Route::get('pharmacy/medecine', [
        'uses' => 'Pharmacist\MedecineController@index',
        'as' => 'pharmacist.medecine.index'
    ]);
    Route::get('get/pharmacy/medecine', [
        'uses' => 'Pharmacist\MedecineController@getMedecines',
        'as' => 'pharmacist.medecine.getMedecines'
    ]);
    Route::post('post/pharmacy/medecine', [
        'uses' => 'Pharmacist\MedecineController@store',
        'as' => 'pharmacist.medecine.save'
    ]);
    Route::post('post/pharmacist/insurance', [
        'uses' => 'Pharmacist\MedecineController@registerPharmacist',
        'as' => 'pharmacist.insurance.registerPharmacist'
    ]);
    Route::get('pharmacy/medecine/show/{id}', [
        'uses' => 'Pharmacist\MedecineController@show',
        'as' => 'pharmacist.medecine.show'
    ]);
    Route::delete('/pharmacy/medecine/delete/{id}', [
        'uses' => 'Pharmacist\MedecineController@delete',
        'as' => 'pharmacist.medecine.delete'
    ]);
    Route::post('update/pharmacy/medecine', [
        'uses' => 'Pharmacist\MedecineController@update',
        'as' => 'pharmacist.medecine.update'
    ]);
});
