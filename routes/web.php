<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KidsController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\Auth\KidLoginController;


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

Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware(['can:isAdmin'])->group(function(){
        Route::get('/users/list', [UsersController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [UsersController::class, 'delete'])->name('users.delete');

        Route::get('/zajecia', [ActivitiesController::class, 'index'])->name('activities.list');
        Route::get('/zajecia/dodaj', [ActivitiesController::class, 'create'])->name('activities.create');
        Route::post('zajecia/zapisz', [ActivitiesController::class, 'store'])->name('activities.store');
        Route::get('/zajecia/edytuj/{id}', [ActivitiesController::class, 'edit'])->name('activities.edit');
        Route::put('/zajecia/update', [ActivitiesController::class, 'update'])->name('activities.update');
        Route::delete('/zajecia/usun/{id}',[ActivitiesController::class, 'delete'])->name('activities.delete');

    });
});
Route::get('/kids/list', [KidsController::class, 'index'])->name('kids.list');
Route::get('/kids/create', [KidsController::class, 'create'])->name('kids.create');
Route::post('/kids/save', [KidsController::class, 'store'])->name('kids.store');
Route::delete('/podopieczni/{id}', [KidsController::class, 'delete'])->name('kids.delete');
Route::put('/podopieczni/update/{id}', [KidsController::class, 'update'])->name('kids.update');
Route::get('/podopieczni/edytuj/{id}', [KidsController::class, 'edit'])->name('kids.edit');

Route::put('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');

Route::get('/podopieczni/zajecia', function (){
   return view('kids.addActivities');
})->name('kids.addActivities');

Route::get('/podopieczni/twojezajecia', function (){
    return view('kids.kidsActivities');
})->name('kids.kidsActivities');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//logowanie podopiecznego
Route::get('/podopieczny/login', [KidLoginController::class, 'showLoginForm'])->name('kid.login');
Route::post('/podopieczny/login', [KidLoginController::class, 'login'])->name('kid.login.post');
Route::post('/podopieczny/logout', [KidLoginController::class, 'logout'])->name('kid.logout');


//Route::group(['middleware'=>'kids'], function() {
//    Route::get('/kids/list', 'Kids\HomeController@index');
//});


