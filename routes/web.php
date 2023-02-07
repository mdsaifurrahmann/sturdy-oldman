<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pageIndexController;

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
//Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components
//Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
//Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
//Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
//Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
//Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');
//Route::get('layouts/client', [StaterkitController::class, 'layout_client'])->name('layout-client');


// locale Route
//Route::get('lang/{locale}', [LanguageController::class, 'swap']);
