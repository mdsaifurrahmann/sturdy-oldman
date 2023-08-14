<?php

use App\Http\Controllers\formerPrincipal;
use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\principal;
use App\Http\Controllers\APAController;
use App\Http\Controllers\InstituteInfoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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
Route::get('former-employees', [pageIndexController::class, 'exEmployees'])->name('former-employees');
Route::get('faculty', [pageIndexController::class, 'faculty'])->name('faculty');
Route::get('notice-list', [pageIndexController::class, 'notices'])->name('notices');
Route::get('admission', [pageIndexController::class, 'admissionList'])->name('admission');
Route::get('stipend', [pageIndexController::class, 'stipends'])->name('stipend');
Route::get('jobs', [pageIndexController::class, 'jobs'])->name('jobs');
Route::get('notice/detail/{id}/{name}', [pageIndexController::class, 'noticeDetails'])->name('notice-details');
Route::get('notice/download/{name}', [pageIndexController::class, 'noticeDownload'])->name('notice-download');
Route::get('gallery', [pageIndexController::class, 'gallery'])->name('gallery');
Route::get('album/{id}/{name}', [pageIndexController::class, 'gallerySingle'])->name('album');
Route::get('contact', [pageIndexController::class, 'contact'])->name('contact');



// apa routes
Route::get('apa/{routeName}', [pageIndexController::class, 'apa'])->name('apa.dynamic');

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
            // Route::Patch('slider-update/{id}', [HomeController::class, 'sliderUpdate'])->name('slider-update-view');
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
        Route::post('add', [formerPrincipal::class, 'addPrincipal'])->name('former-principal-add');
        Route::get('edit/{id}', [pageIndexController::class, 'updateFormerPrincipal'])->name('former-principal-edit');
        Route::patch('update/{id}', [formerPrincipal::class, 'editPrincipal'])->name('former-principal-update');
        Route::delete('delete/{id}', [formerPrincipal::class, 'destroy'])->name('former-principal-delete');
    });

    Route::prefix('administration/former-employees')->group(function () {
        Route::get('/', [formerPrincipal::class, 'employeeList'])->name('former-employee-list');
        Route::post('add', [formerPrincipal::class, 'addEmployee'])->name('former-employee-add');
        Route::get('edit/{id}', [pageIndexController::class, 'updateFormerEmployee'])->name('former-employee-edit');
        Route::patch('update/{id}', [formerPrincipal::class, 'editEmployee'])->name('former-employee-update');
        Route::delete('delete/{id}', [formerPrincipal::class, 'employeeDestroy'])->name('former-employee-delete');
    });


    Route::prefix('administration/faculty')->group(function () {
        Route::get('/', [FacultyController::class, 'create'])->name('faculty-add-view');
        Route::post('add', [FacultyController::class, 'store'])->name('faculty-add');
        Route::get('edit/{id}', [FacultyController::class, 'edit'])->name('faculty-edit');
        Route::patch('update/{id}', [FacultyController::class, 'update'])->name('faculty-update');
        Route::delete('delete/{id}', [FacultyController::class, 'destroy'])->name('faculty-delete');
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
        Route::get('/', [APAController::class, 'index'])->name('apa-add-form');
        Route::post('add', [APAController::class, 'addAPA'])->name('add-apa');
        Route::get('list', [APAController::class, 'list'])->name('apa-list');
        Route::delete('delete/{id}', [APAController::class, 'destroy'])->name('apa-delete');
        Route::get('edit/{id}', [APAController::class, 'edit'])->name('edit-apa');
        Route::post('update-file/{id}/{key}', [APAController::class, 'updateFile'])->name('update-apa-file');
        Route::post('update/{id}', [APAController::class, 'update'])->name('update-apa');

        // add type
        Route::get('add-type', [APAController::class, 'addTypeView'])->name('add-type-view');
        Route::get('type-update/{id}', [APAController::class, 'typeEditView'])->name('type-update-view');

        Route::post('add-types', [APAController::class, 'addType'])->name('add-type');
        Route::delete('apa-type-delete/{id}', [APAController::class, 'typeDestroy'])->name('apa-type-delete');
        Route::patch('update-type/{id}', [APAController::class, 'editType'])->name('type-update');

        // add category
        Route::get('add-category', [APAController::class, 'addCategoryView'])->name('add-category-view');
        Route::post('add_category', [APAController::class, 'addCategory'])->name('add-category');

        Route::get('update-category/{id}', [APAController::class, 'editCategoryView'])->name('edit-category');
        Route::patch('update-category/{id}', [APAController::class, 'editCategory'])->name('update-category');
        Route::delete('delete-category/{id}', [APAController::class, 'destroyCategory'])->name('delete-category');
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

    Route::prefix('administration/users/profile')->group(function () {
        Route::get('{username}/update', [ProfileController::class, 'updateView'])->name('profile-update-view');
        Route::patch('update', [ProfileController::class, 'update'])->name('profile-update');
        Route::delete('delete', [ProfileController::class, 'destroy'])->name('profile-delete');
    });

    Route::prefix('administration/users/view/profile')->group(function () {
        Route::get('/{username}', [ProfileController::class, 'show'])->name('profile-view');
    });

    Route::prefix('administration/users/profile/security')->group(function () {
        Route::get('/', [ProfileController::class, 'security'])->name('security');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('update-password');
    });

    Route::prefix('administration/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/response', [UserController::class, 'response'])->name('response');
        Route::delete('/delete/external/{id}', [UserController::class, 'destroy'])->name('external-delete');
        Route::patch('/update/external/{id}', [UserController::class, 'updateUser'])->name('external-update');
        // Route::put('/password', [UsersController::class, 'updatePassword'])->name('update-password');
    });
});

// Route::group(['prefix' => 'dti/access'], function () {
//     Route::get('register', [RegisteredUserController::class, 'create'])->name('register')->middleware('verified');
//     Route::post('register', [RegisteredUserController::class, 'store'])->middleware('verified');
// });

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
