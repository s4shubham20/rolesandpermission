<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::namespace('App\Http\Controllers\Admin')->group(function () {
    Route::group(['prefix' => "admin", 'middleware' => ['auth']], function(){
        Route::group(['middleware' => ['role:admin|superadmin']], function () {
            Route::group(['middleware' => ['role:superadmin']], function () {
                Route::resource('role', RoleController::class);
                Route::resource('permission', PremissionController::class);
                Route::resource('user', UserController::class);
            });
        });
        Route::get('dashboard','UserController@getUsers')->name('dashboard');
        Route::post('update/lead/status','LeadController@updateUserStatus')->name('update.lead.status');
    });
});
