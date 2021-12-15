<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KidsController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\Auth\KidLoginController;
use App\Http\Controllers\KidsActivitiesController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\KidsTripsController;

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



    });
});

Route::get('/zajecia', [ActivitiesController::class, 'index'])->name('activities.list');
Route::get('/zajecia/dodaj', [ActivitiesController::class, 'create'])->name('activities.create');
Route::post('zajecia/zapisz', [ActivitiesController::class, 'store'])->name('activities.store');
Route::get('/zajecia/edytuj/{id}', [ActivitiesController::class, 'edit'])->name('activities.edit');
Route::put('/zajecia/update/{id}', [ActivitiesController::class, 'update'])->name('activities.update');
Route::delete('/zajecia/usun/{id}',[ActivitiesController::class, 'delete'])->name('activities.delete');

Route::get('/zajecia/odbyte', [KidsActivitiesController::class, 'showFinished'])->name('activities.showFinished');

Route::get('/kids/list', [KidsController::class, 'index'])->name('kids.list');
Route::get('/kids/create', [KidsController::class, 'create'])->name('kids.create');
Route::post('/kids/save', [KidsController::class, 'store'])->name('kids.store');
Route::delete('/podopieczni/usun/{id}', [KidsController::class, 'delete'])->name('kids.delete');
Route::put('/podopieczni/update/{id}', [KidsController::class, 'update'])->name('kids.update');
Route::get('/podopieczni/edytuj/{id}', [KidsController::class, 'edit'])->name('kids.edit');

Route::put('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::get('/users/edit/data/{id}', [UsersController::class, 'editData'])->name('users.editData');
Route::put('/users/update/data/{id}', [UsersController::class, 'updateData'])->name('users.updateData');
Route::get('/users/show/data/{id}', [UsersController::class, 'showData'])->name('users.showData');

Route::post('/podopieczni/zajecia/zapisz', [KidsActivitiesController::class, 'store'])->name('kidsActivities.store');
Route::get('/podopieczni/dodajzajecia', function (){
    return view('kidsActivities.addActivities');
})->name('kidsActivities.addActivities');
//Route::get('/podopieczni/zajecia/list', [KidsActivitiesController::class, 'index'])->name('kidsActivities.list');

//Route::get('/podopieczni/zapisz1', function (){
//    $kid = \App\Models\Kids::first();
//    $activities = \App\Models\Activities::first();
//    $kid->activities()->attach($activities);
//})->name('kidsActivities.store1');

//Route::get('/podopieczni/twojezajecia', function (){
//    return view('kidsActivities.list');
//})->name('kidsActivities.list');

Route::get('/podopieczni/twojezajecia',[KidsActivitiesController::class, 'index'])->name('kidsActivities.list');
Route::get('/podopieczni/zajecia/pokaz/{id}', [KidsActivitiesController::class, 'show'])->name('kidsActivities.show');
Route::post('/podopieczny/zajęcia/wyslijprosbe',[KidsActivitiesController::class, 'sendRequest'])->name('kidsActivities.sendRequest');

Route::get('/wyjazdy/lista', [TripsController::class, 'index'])->name('trips.list');
Route::get('/wyjazdy/utwórz', [TripsController::class, 'create'])->name('trips.create');
Route::post('/wyjazdy/zapisz', [TripsController::class, 'store'])->name('trips.store');
Route::get('/wyjazdy/edytuj/{id}', [TripsController::class, 'edit'])->name('trips.edit');
Route::put('/wyjazdy/update', [TripsController::class, 'update'])->name('trips.update');
Route::delete('/wyjazdy/usun/{id}',[TripsController::class, 'delete'])->name('trips.delete');


Route::get('podpieczni/wyjazdy/dodaj', [KidsTripsController::class, 'create'])->name('kidsTrips.create');
Route::post('/podopieczni/wyjazdy/zapisz', [KidsTripsController::class, 'store'])->name('kidsTrips.store');
Route::get('/podopieczni/twojewyjazdy',[KidsTripsController::class, 'index'])->name('kidsTrips.list');
Route::get('/podopieczni/wyjazdy/pokaz/{id}', [KidsTripsController::class, 'show'])->name('kidsTrips.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//logowanie podopiecznego
Route::get('/podopieczny/login', [KidLoginController::class, 'showLoginForm'])->name('kid.login');
Route::post('/podopieczny/login', [KidLoginController::class, 'login'])->name('kid.login.post');
Route::post('/podopieczny/logout', [KidLoginController::class, 'logout'])->name('kid.logout');


//Route::group(['middleware'=>'kids'], function() {
//    Route::get('/kids/list', 'Kids\HomeController@index');
//});


