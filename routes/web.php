<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index', [
        "title" => "Beranda"
    ]);

});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "Chika Putri Maharani",
        "email" => "Chikaputri@gmail.com",
        "gambar" => "chika.jpeg"
    ]);
});

Route::get('/gallery', function () {
    return view('gallery', [
        "title" => "Gallery"
    ]);
});

Route::get('/home', function(){
    return view('admin.home', [
        "title" => "Home"
    ]);
});
Route::resource('/contacts', ContactController::class);
Route::get('/contacts', ContactController::class . '@index');

Auth::routes();

Route::get('/delete_contact/{id}', ContactController::class . '@destroy');
Route::get('/edit_contact/{id}', ContactController::class . '@edit');
Route::post('/update_contact', ContactController::class . '@update');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
