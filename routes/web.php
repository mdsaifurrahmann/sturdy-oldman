<?php

use App\Http\Controllers\formerPrincipal;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\principal;
use App\Http\Controllers\APAContoller;
use App\Http\Controllers\InstituteInfoController;
use App\Http\Controllers\GalleryController;


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
Route::get('album/{id}/{name}', [pageIndexController::class, 'gallerySingle'])->name('album');
Route::get('contact', [pageIndexController::class, 'contact'])->name('contact');

//APA Routes
Route::get('apa-gct', [pageIndexController::class, 'apa'])->name('apa-gct');
Route::get('apc', [pageIndexController::class, 'apa'])->name('apc');
Route::get('mer', [pageIndexController::class, 'apa'])->name('mer');
Route::get('mssl', [pageIndexController::class, 'apa'])->name('mssl');
Route::get('sccc', [pageIndexController::class, 'apa'])->name('sccc');
Route::get('fpo', [pageIndexController::class, 'apa'])->name('fpo');
Route::get('qamer', [pageIndexController::class, 'apa'])->name('qamer');
Route::get('laws', [pageIndexController::class, 'apa'])->name('laws');
Route::get('nps', [pageIndexController::class, 'apa'])->name('nps');
Route::get('committees', [pageIndexController::class, 'apa'])->name('committees');
Route::get('schedule', [pageIndexController::class, 'apa'])->name('schedule');
Route::get('reports', [pageIndexController::class, 'apa'])->name('reports');
Route::get('compendiums', [pageIndexController::class, 'apa'])->name('compendiums');
Route::get('innovation-team', [pageIndexController::class, 'apa'])->name('innovation-team');
Route::get('aiap', [pageIndexController::class, 'apa'])->name('aiap');
Route::get('innovative-projects', [pageIndexController::class, 'apa'])->name('innovative-projects');
Route::get('roaa', [pageIndexController::class, 'apa'])->name('roaa');
Route::get('appeal-form', [pageIndexController::class, 'apa'])->name('appeal-form');
Route::get('vdi', [pageIndexController::class, 'apa'])->name('vdi');
Route::get('guidelines', [pageIndexController::class, 'apa'])->name('guidelines');
Route::get('appellate-officers', [pageIndexController::class, 'apa'])->name('appellate-officers');
Route::get('cer', [pageIndexController::class, 'apa'])->name('cer');
Route::get('complaint-filing', [pageIndexController::class, 'apa'])->name('complaint-filing');
Route::get('complaint-laws', [pageIndexController::class, 'apa'])->name('complaint-laws');

// APA Single
Route::get('apa/details/{id}/{name}', [pageIndexController::class, 'apaSingle'])->name('apa-single');
Route::get('apa/download/{name}', [pageIndexController::class, 'apaDownload'])->name('apa-download');


// Authenticated Route

Route::middleware(['auth', 'verified'])->prefix('authenticated/govern')->group(function () {
    Route::get('/', [pageIndexController::class, 'govern'])->name('govern');
    Route::get('institution', [InstituteInfoController::class, 'index'])->name('institute-info');
    Route::post('institution', [InstituteInfoController::class, 'update'])->name('institute-info-update');

    Route::prefix('homepage')->group(function () {
        Route::prefix('slider')->group(function () {
            Route::get('add', [pageIndexController::class, 'slider'])->name('slider');
            Route::post('add', [HomeController::class, 'create'])->name('slider-store');
            Route::get('list', [HomeController::class, 'sliderList'])->name('slider-list');
            Route::delete('delete/{id}', [HomeController::class, 'destroy'])->name('slider-delete');
            Route::get('slider-update/{id}', [HomeController::class, 'sliderUpdate'])->name('slider-update-view');
            Route::Patch('slider-update/{id}', [HomeController::class, 'sliderUpdate'])->name('slider-update-view');
        });

        Route::post('machine', [HomeController::class, 'machine'])->name('machine');
        Route::get('machinery', [pageIndexController::class, 'machine'])->name('machinery');
        Route::delete('machine/delete/{id}', [HomeController::class, 'machineDestroy'])->name('machine-delete');
    });

    Route::prefix('about/history')->group(function () {
        Route::get('/', [pageIndexController::class, 'updatehistory'])->name('get-update-history');
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

    Route::prefix('apa')->group(function () {
        Route::get('/', [APAContoller::class, 'index'])->name('apa-add-form');
        Route::post('add', [APAContoller::class, 'addAPA'])->name('add-apa');
        Route::get('list', [APAContoller::class, 'list'])->name('apa-list');
        Route::delete('delete/{id}', [APAContoller::class, 'destroy'])->name('apa-delete');
        Route::get('edit/{id}', [APAContoller::class, 'edit'])->name('edit-apa');
        Route::post('update-file/{id}/{key}', [APAContoller::class, 'updateFile'])->name('update-apa-file');
        Route::post('update/{id}', [APAContoller::class, 'update'])->name('update-apa');
    });

    Route::prefix('gallery')->group(function () {
        Route::get('albums', [GalleryController::class, 'createAlbumView'])->name('albums-view');
        Route::post('albums', [GalleryController::class, 'createAlbum'])->name('create-albums');
        Route::delete('albums/delete/{id}', [GalleryController::class, 'deleteAlbum'])->name('delete-albums');

        Route::get('add-images', [GalleryController::class, 'addImagesToAlbum'])->name('get-add-images');
        Route::post('add-images', [GalleryController::class, 'addImages'])->name('add-images');

        Route::get('album/list', [GalleryController::class, 'albumList'])->name('album-list');
        Route::get('album/{id}', [GalleryController::class, 'albumImages'])->name('album-images');
        Route::delete('album/delete/{id}/{image}', [GalleryController::class, 'deleteImage'])->name('delete-album-image');
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
