<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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
Route::group(['middleware' => 'auth'],

	function () {
		Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
	});


Route::middleware(ProtectAgainstSpam::class)->group(function () {
	Auth::routes(['verify' => true]);

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\SiteController::class, 'blog'])->name('blog');
Route::get('/show/{id}', [App\Http\Controllers\SiteController::class, 'show'])->name('show');
