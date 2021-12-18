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
use App\Http\Controllers\NotificationsController;
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
Route::get('/rodzic', function () {
    return view('parent');
})->name('parent');
Route::get('/dziecko', function () {
    return view('kids');
})->name('kids');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware(['can:isAdmin'])->group(function() {
        Route::get('/uzytkownicy/lista', [UsersController::class, 'index'])->name('users.index');
        Route::delete('/uzytkownicy/usun/{id}', [UsersController::class, 'delete'])->name('users.delete');
    });
    Route::put('/uzytkownicy/aktualizuj/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/uzytkownicy/edytuj/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::get('/uzytkownicy/edytuj/dane/{id}', [UsersController::class, 'editData'])->name('users.editData');
    Route::put('/uzytkownicy/aktualizuj/dane/{id}', [UsersController::class, 'updateData'])->name('users.updateData');
    Route::get('/uzytkownicy/pokaz/dane/{id}', [UsersController::class, 'showData'])->name('users.showData');

    Route::get('/zajecia/lista', [ActivitiesController::class, 'index'])->name('activities.list');
    Route::get('/zajecia/dodaj', [ActivitiesController::class, 'create'])->name('activities.create');
    Route::post('zajecia/zapisz', [ActivitiesController::class, 'store'])->name('activities.store');
    Route::get('/zajecia/edytuj/{id}', [ActivitiesController::class, 'edit'])->name('activities.edit');
    Route::put('/zajecia/aktualizuj/{id}', [ActivitiesController::class, 'update'])->name('activities.update');
    Route::delete('/zajecia/usun/{id}',[ActivitiesController::class, 'delete'])->name('activities.delete');

    Route::get('/zajecia/odbyte', [KidsActivitiesController::class, 'showFinished'])->name('activities.showFinished');

    Route::get('/podopieczni/lista', [KidsController::class, 'index'])->name('kids.list');
    Route::get('/podopieczni/dodaj', [KidsController::class, 'create'])->name('kids.create');
    Route::post('/podopieczni/zapisz', [KidsController::class, 'store'])->name('kids.store');
    Route::delete('/podopieczni/usun/{id}', [KidsController::class, 'delete'])->name('kids.delete');
    Route::put('/podopieczni/aktualizuj/{id}', [KidsController::class, 'update'])->name('kids.update');
    Route::get('/podopieczni/edytuj/{id}', [KidsController::class, 'edit'])->name('kids.edit');




    Route::post('/podopieczni/zajecia/zapisz', [KidsActivitiesController::class, 'store'])->name('kidsActivities.store');
    Route::get('/podopieczni/zajecia/dodaj', [KidsActivitiesController::class, 'showAddActivities'])->name('kidsActivities.addActivities');
    Route::get('/podopieczni/zajecia/podopiecznego/wyswietl/{id}', [KidsActivitiesController::class, 'show'])->name('kidsActivities.show');



    Route::delete('/podopieczni/zajecia/prosby/usun/{id}', [NotificationsController::class, 'delete'])->name('notifications.delete');

    Route::get('/podopieczni/zajecia/prosby/pokaz',[NotificationsController::class, 'showRequest'])->name('kidsActivities.showRequest');




    Route::get('/wyjazdy/lista', [TripsController::class, 'index'])->name('trips.list');
    Route::get('/wyjazdy/utwórz', [TripsController::class, 'create'])->name('trips.create');
    Route::post('/wyjazdy/zapisz', [TripsController::class, 'store'])->name('trips.store');
    Route::get('/wyjazdy/edytuj/{id}', [TripsController::class, 'edit'])->name('trips.edit');
    Route::put('/wyjazdy/aktualizuj', [TripsController::class, 'update'])->name('trips.update');
    Route::delete('/wyjazdy/usun/{id}',[TripsController::class, 'delete'])->name('trips.delete');


    Route::get('/podpieczni/wyjazdy/dodaj', [KidsTripsController::class, 'create'])->name('kidsTrips.create');
    Route::post('/podopieczni/wyjazdy/zapisz', [KidsTripsController::class, 'store'])->name('kidsTrips.store');

    Route::get('/podopieczni/wyjazdy/pokaz/{id}', [KidsTripsController::class, 'show'])->name('kidsTrips.show');





});


    Route::get('/podopieczni/zajecia/wyswietl/twoje',[KidsActivitiesController::class, 'index'])->name('kidsActivities.list');
    Route::get('/podopieczni/zajecia/prosby/stworz',[NotificationsController::class, 'showRequestForm'])->name('kidsActivities.showRequestForm');
    Route::post('/podopieczny/zajecia/prosby/wyslij',[NotificationsController::class, 'sendRequest'])->name('kidsActivities.sendRequest');
    Route::get('/podopieczni/wyjazdy/twoje',[KidsTripsController::class, 'index'])->name('kidsTrips.list');





Route::get('/home', [HomeController::class, 'index'])->name('home');




Auth::routes();
//logowanie podopiecznego
Route::get('/podopieczny/login', [KidLoginController::class, 'showLoginForm'])->name('kid.login');
Route::post('/podopieczny/login', [KidLoginController::class, 'login'])->name('kid.login.post');
Route::post('/podopieczny/logout', [KidLoginController::class, 'logout'])->name('kid.logout');

//Route::group(['middleware'=>'kids'], function() {
//    Route::get('/kids/list', 'Kids\HomeController@index');
//});


