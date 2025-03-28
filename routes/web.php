<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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





Route::get('lang/{lang}', [LangController::class, 'change'])->name('changeLang');

//location
// Route::get('/location', [LangController::class, 'index'])->name('location');

Route::get('FAQ', [LangController::class, 'faq'])->name('FAQ');




Route::get('/chat', function () {
    return view('chat');
});



Route::post('/chat', [ChatController::class, 'chat']);





// start admin dashboard route
Route::middleware(['auth', 'admin'])->group(function () {
Route::get('admin/', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/all_team', [AdminController::class, 'all_team'])->name('admin.all.team');

Route::get('admin/joining_requests', [AdminController::class, 'joining_requests'])->name('admin.joining.requests');
Route::post('admin/approval/{id}', [AdminController::class, 'approval'])->name('admin.approval');
Route::delete('admin/team_delete/{id}', [AdminController::class, 'team_delete'])->name('admin.team.delete');
Route::get('admin/all_client', [AdminController::class, 'all_client'])->name('admin.all.client');
Route::get('admin/all_consultations', [AdminController::class, 'all_consultations'])->name('admin.all.consultations');
Route::delete('admin/client_delete/{id}', [AdminController::class, 'client_delete'])->name('admin.client.delete');

Route::get('admin/faq', [AdminController::class, 'faq'])->name('admin.faq');
Route::get('admin/add_faq', [AdminController::class, 'add_faq'])->name('admin.add_faq');
Route::post('admin/add_faq', [AdminController::class, 'sort_faq'])->name('admin.sort_faq');
Route::get('admin/faq_edit/{id}', [AdminController::class, 'faq_edit'])->name('admin.faq.edit');
Route::delete('admin/faq_destroy/{id}', [AdminController::class, 'faq_destroy'])->name('admin.faq.destroy');
Route::get('admin/show_consultation/{id}', [AdminController::class, 'show_consultation'])->name('admin.show_consultation');

Route::get('admin/my_home_service', [AdminController::class, 'client_home_service'])->name('admin.client_home_service');
Route::get('admin/show_home_service/{id}', [AdminController::class, 'show_home_service'])->name('admin.show_home_service');
Route::get('admin/show_home_service/{id}', [ClientController::class, 'show_home_service'])->name('admin.show_home_service');

Route::get('admin/change_status/{id}/{status}', [AdminController::class, 'change_status'])->name('admin.change.status');

// location

Route::get('admin/zone', [LangController::class, 'zone'])->name('admin.zone');
Route::post('admin/add_zone', [LangController::class, 'add_zone'])->name('admin.add_zone');
Route::delete('/posts/{id}', [LangController::class, 'destroy'])->name('posts.destroy');

Route::get('admin/location', [LangController::class, 'location'])->name('admin.location');
Route::post('admin/add_location', [LangController::class, 'add_location'])->name('admin.add_location');
Route::delete('/location/{id}', [LangController::class, 'location_destroy'])->name('location.destroy');



});




// end admin dashboard route

// start user dashboard route
Route::middleware(['auth', 'client'])->group(function () {
    Route::get('client/', [ClientController::class, 'index'])->name('client.index');
    Route::get('client/new_consultation', [ClientController::class, 'new_consultation'])->name('client.new_consultation');
    Route::get('client/my_consultations', [ClientController::class, 'client_consultations'])->name('client.client_consultations');
    Route::get('client/show_consultation/{id}', [ClientController::class, 'show_consultation'])->name('client.show_consultation');
    Route::post('client/save_consultation', [ClientController::class, 'save_consultation'])->name('client.save_consultation');
    Route::post('client/response', [ClientController::class, 'response'])->name('client.response');
    Route::post('client/image_upload', [ClientController::class, 'image_upload'])->name('client.image.upload');
    Route::get('client/change_status_closed/{id}/', [ClientController::class, 'change_status_closed'])->name('client.change.status.closed');
    Route::get('client/home_service', [ClientController::class, 'home_service'])->name('client.home.service');
    Route::post('client/home_service', [ClientController::class, 'save_home_service'])->name('client.save.home.service');
    Route::get('client/my_home_service', [ClientController::class, 'client_home_service'])->name('client.client_home_service');
    Route::get('client/show_home_service/{id}', [ClientController::class, 'show_home_service'])->name('client.show_home_service');
    Route::get('client/location', [ClientController::class, 'location'])->name('client.location');


    Route::get('/get-city-data', [ClientController::class, 'getCityData']);


});

// end client dashboard route

// start team dashboard route
Route::middleware(['auth', 'team'])->group(function () {
    Route::get('team/', [TeamController::class, 'index'])->name('team.index');
    Route::get('team/managed_consultations', [TeamController::class, 'managed_consultations'])->name('team.managed.consultations');
    Route::get('team/new_consultations', [TeamController::class, 'new_consultations'])->name('team.new.consultations');
    Route::get('client/change_status/{id}/{status}', [ClientController::class, 'change_status'])->name('client.change.status');
    Route::get('team/show_consultation/{id}', [TeamController::class, 'show_consultation'])->name('team.show_consultation');
    Route::post('team/response', [TeamController::class, 'response'])->name('team.response');

    Route::post('team/image_upload', [TeamController::class, 'image_upload'])->name('team.image.upload');



});

// end team dashboard route
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

