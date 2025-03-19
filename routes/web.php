<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EmargementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Routes d'authentification
Auth::routes();

// Page d'accueil après connexion
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Routes pour les émargements (présences)
Route::resource('emargements', EmargementController::class)->middleware('auth');

// Routes pour les cours
Route::resource('cours', CoursController::class)->middleware('auth');

// Routes pour les utilisateurs (admin)
Route::resource('users', UserController::class)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/emargements/export/{format}', [EmargementController::class, 'export'])->name('emargements.export');
Route::get('/emargements/exportExel/{format}', [EmargementController::class, 'exportExel'])->name('emargements.exportExel');

// Page d'accueil pour les utilisateurs non connectés
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
