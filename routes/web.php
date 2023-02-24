<?php

use App\Http\Controllers\formerPrincipal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\principal;

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
Route::get('notice-list', [pageIndexController::class, 'notices'])->name('notices');
Route::get('admission', [pageIndexController::class, 'admissionList'])->name('admission');
Route::get('stipend', [pageIndexController::class, 'stipends'])->name('stipend');
Route::get('jobs', [pageIndexController::class, 'jobs'])->name('jobs');
Route::get('notice/detail/{id}/{name}', [pageIndexController::class, 'noticeDetails'])->name('notice-details');
Route::get('notice/download/{name}', [pageIndexController::class, 'noticeDownload'])->name('notice-download');
Route::get('gallery', [pageIndexController::class, 'gallery'])->name('gallery');
Route::get('album/{name}', [pageIndexController::class, 'gallerySingle'])->name('album');
Route::get('contact', [pageIndexController::class, 'contact'])->name('contact');

// Authenticated Route

Route::middleware(['auth', 'verified'])->prefix('authenticated/govern')->group(function () {
    Route::get('/', [pageIndexController::class, 'govern'])->name('govern');

    Route::prefix('homepage')->group(function () {
        Route::prefix('slider')->group(function () {
            Route::get('add', [pageIndexController::class, 'slider'])->name('slider');
            Route::post('add', [HomeController::class, 'create'])->name('slider-store');
            Route::get('list', [HomeController::class, 'sliderList'])->name('slider-list');
            Route::delete('delete/{id}', [HomeController::class, 'destroy'])->name('slider-delete');
        });

        Route::post('machine', [HomeController::class, 'machine'])->name('machine');
        Route::get('machinery', [pageIndexController::class, 'machine'])->name('machinery');
        Route::delete('machine/delete/{id}', [HomeController::class, 'machineDestroy'])->name('machine-delete');
    });

    Route::prefix('about/history')->group(function () {
        Route::get('/', [pageIndexController::class, 'updatehistory'])->name('update-history');
        Route::post('update', [HistoryController::class, 'update'])->name('update-history');
    });

    Route::prefix('about/principal')->group(function () {
        Route::get('/', [pageIndexController::class, 'updatePrincipal'])->name('update-principal');
        Route::post('update', [principal::class, 'update'])->name('principal-update');
    });

    Route::prefix('administration/former-principals')->group(function () {
        Route::get('/', [formerPrincipal::class, 'principalList'])->name('former-principal-list');
        Route::post('update', [formerPrincipal::class, 'addPrincipal'])->name('former-principal-update');
        Route::delete('delete/{id}', [formerPrincipal::class, 'destroy'])->name('former-principal-delete');
    });

    Route::prefix('administration/former-employees')->group(function () {
        Route::get('/', [formerPrincipal::class, 'employeeList'])->name('former-employee-list');
        Route::post('update', [formerPrincipal::class, 'addEmployee'])->name('former-employee-update');
        Route::delete('delete/{id}', [formerPrincipal::class, 'employeeDestroy'])->name('former-employee-delete');
    });


    Route::prefix('notice')->group(function () {
        Route::get('/', [NoticeController::class, 'index'])->name('add-notice-form');
        Route::post('add', [NoticeController::class, 'addNotice'])->name('add-notice');
        Route::get('list', [NoticeController::class, 'view'])->name('notice-list');
        Route::delete('delete/{id}', [NoticeController::class, 'destroy'])->name('notice-delete');
        Route::get('edit/{id}', [NoticeController::class, 'edit'])->name('edit-notice');
        Route::post('update-file/{id}/{key}', [NoticeController::class, 'updateFile'])->name('update-notice-file');
        Route::post('update/{id}', [NoticeController::class, 'update'])->name('update-notice');
    });
});

//Route::group(['prefix' => 'authenticated/govern'], function () {
//    Route::group(['middleware' => ['auth', 'verified']], function () {
//        Route::get('/', [pageIndexController::class, 'govern'])->name('govern');
//
//        Route::Group(['prefix' => 'homepage'], function () {
//            Route::group(['prefix' => 'slider'], function () {
//                Route::get('add', [pageIndexController::class, 'slider'])->name('slider');
//                Route::post('add', [HomeController::class, 'create'])->name('slider-store');
//                Route::get('list', [HomeController::class, 'sliderList'])->name('slider-list');
//                Route::delete('delete/{id}', [HomeController::class, 'destroy'])->name('slider-delete');
//            });
//        });
//    });
//});


// locale Route
//Route::get('lang/{locale}', [LanguageController::class, 'swap']);
