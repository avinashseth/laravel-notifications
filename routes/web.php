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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('check-age/{age}', function($age) {

    $user = Auth::user();
    
    if($user->can('checkCheckUserAge', $user))
    {
        echo 'Student age is ' . $age;
    }
    else
    {
        echo 'Not allowed to view';
    }
});
