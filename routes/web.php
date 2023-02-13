<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pageIndexController;
use App\Http\Controllers\StaterkitController;

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

Route::get('/', [HomeController::class, 'create'])->name('home');
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


Route::get('authenticated/govern', [StaterkitController::class, 'home'])->name('govern')->middleware('auth');
// Route Components
//Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
//Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
//Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
//Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
//Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');
//Route::get('layouts/client', [StaterkitController::class, 'layout_client'])->name('layout-client');


// locale Route
//Route::get('lang/{locale}', [LanguageController::class, 'swap']);
