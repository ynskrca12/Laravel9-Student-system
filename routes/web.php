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

Route::get('/',[StudentController::class,'index']);
Route::get('/register',[UserController::class,'register']);
Route::get('/login',[UserController::class,'login']);
