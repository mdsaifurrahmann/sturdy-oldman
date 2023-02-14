<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageIndexController;
use App\Http\Controllers\HomeController;

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

// public route
Route::get('/', [pageIndexController::class, 'home'])->name('home');
Route::get('infrastructure', [pageIndexController::class, 'infrastructure'])->name('infrastructure');
Route::get('history', [pageIndexController::class, 'history'])->name('history');
Route::get('principal', [pageIndexController::class, 'principal'])->name('principal');
Route::get('former-principals', [pageIndexController::class, 'formerPrincipals'])->name('former-principals');
Route::get('ex-employees', [pageIndexController::class, 'exEmployees'])->name('ex-employees');
Route::get('notices', [pageIndexController::class, 'notices'])->name('notices');
Route::get('admission', [pageIndexController::class, 'admissionList'])->name('admission');
Route::get('stipend', [pageIndexController::class, 'stipends'])->name('stipend');
Route::get('jobs', [pageIndexController::class, 'jobs'])->name('jobs');
Route::get('admission/detail/{name}', [pageIndexController::class, 'admissionDetails'])->name('admission-details');
Route::get('notice/detail/{name}', [pageIndexController::class, 'noticeDetails'])->name('notice-details');
Route::get('stipend/detail/{name}', [pageIndexController::class, 'stipendDetails'])->name('stipend-details');
Route::get('job/detail/{name}', [pageIndexController::class, 'jobDetails'])->name('job-details');
Route::get('gallery', [pageIndexController::class, 'gallery'])->name('gallery');
Route::get('album/{name}', [pageIndexController::class, 'gallerySingle'])->name('album');
Route::get('contact', [pageIndexController::class, 'contact'])->name('contact');

// Authenticated Route

Route::group(['prefix' => 'authenticated/govern'], function () {
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('/', [pageIndexController::class, 'govern'])->name('govern');

        Route::Group(['prefix' => 'homepage'], function () {
            Route::group(['prefix' => 'slider'], function () {
                Route::get('add', [pageIndexController::class, 'slider'])->name('slider');
                Route::post('add', [HomeController::class, 'create'])->name('slider-store');
                Route::get('list', [HomeController::class, 'sliderList'])->name('slider-list');
                Route::delete('delete/{id}', [HomeController::class, 'destroy'])->name('slider-delete');
            });
        });
    });
});





// locale Route
//Route::get('lang/{locale}', [LanguageController::class, 'swap']);
