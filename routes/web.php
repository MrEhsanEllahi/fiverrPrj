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
    return view('welcome');
});

Route::get('/migrate', function () {
    Artisan::call("migrate");
    return "Done";
});

Auth::routes();

Route::get('mentors', 'MainController@getMenotrs');
Route::get('mentee', 'MainController@getMentees');

Route::get('user-profile/{id}', 'MainController@getUserProfile');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('update-profile', 'HomeController@updateUserProfile')->name('user.update_profile');

Route::group(['middleware' => 'admin'], function()
{
    //All the admin routes goes here
    Route::get('admin/dashboard', 'AdminController@index')->name('adminDashboard');
    Route::get('activate-user-account/{id}', 'AdminController@activateUser');
    Route::get('deactivate-user-account/{id}', 'AdminController@deactivateUser');
    Route::get('/admin/log-activity', 'AdminController@getLogActivity');

    Route::get('industries', 'AdminController@industry_view');
    Route::get('hobbies', 'AdminController@hobby_view');
    Route::get('interests', 'AdminController@interest_view');
    Route::get('needs', 'AdminController@need_view');
    Route::get('passions', 'AdminController@passion_view');


    Route::post('industries', 'AdminController@industry_store');
    Route::post('hobbies', 'AdminController@hobby_store');
    Route::post('interests', 'AdminController@interest_store');
    Route::post('needs', 'AdminController@need_store');
    Route::post('passions', 'AdminController@passion_store');

    Route::get('delete/industry/{id}', 'AdminController@industry_delete');
    Route::get('delete/hobby/{id}', 'AdminController@hobby_delete');
    Route::get('delete/interest/{id}', 'AdminController@interest_delete');
    Route::get('delete/need/{id}', 'AdminController@need_delete');
    Route::get('delete/passion/{id}', 'AdminController@passion_delete');
});
