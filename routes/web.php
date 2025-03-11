<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LangController;
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

// Route::get('/test-lang', function () {
//     return App::getLocale();
// });

//Route::get('lang/{lang}', [LangController::class, 'change']);
Route::get('lang/{lang}', [LangController::class, 'change'])->name('changeLang');


// Route::get('lang/{lang}', function ($lang) {
//     if (in_array($lang, ['en', 'ar'])) {
//         App::setLocale($lang);
//         session()->put('applocale', $lang);
//         // dd(session()->$_GET('applocale'));
//     }    return redirect()->back();
// })->name('lang.switch');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
