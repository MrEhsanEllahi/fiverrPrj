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
});
