<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;


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
//     return view('welcome');
// });

//Common routes naming
//index - show all datas or students
//show - show a single data or student
//create - show a form to a new user
//store - store  a data
//edit - show form to a data
//update - update a data
//destroy - delete a data

Route::controller(UserController::class)->group(function(){
    Route::get('/register','register');
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::post('/login/process','process');
    Route::post('/logout','logout');
    Route::post('/store','store');
});

Route::controller(StudentController::class)->group(function() {
    Route::get('/','index')->middleware('auth');
    Route::get('/add/student','create');
    Route::post('/add/student','store');
    Route::get('/student/{id}','show');
    Route::put('/student/{student}','update');
    Route::delete('/student/{student}','destroy');

});

