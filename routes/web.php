<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FormateurController;
use App\Http\Controllers\Admin\GroupeController;
use App\Http\Controllers\Admin\PlanningController;
use App\Http\Controllers\Admin\SalleController;
use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\Formateur\PlanningFormateurController;
use App\Http\Controllers\Stagiaire\PlanningStagiaireController;

// Auth

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin (protege par middleware 'admin')

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard', function(){
        return view('admin.dashboard');})->name('dashboard');

    Route::resource('/formateurs', FormateurController::class);
    Route::resource('/groupes', GroupeController::class);
    Route::resource('/salles', SalleController::class);
    Route::resource('/seances', SeanceController::class);

    Route::get('/planning/groupe/{groupe}', [PlanningController::class, 'parGroupe'])->name('planning.groupe');
    Route::get('/planning/formateur/{formateur}', [PlanningController::class, 'parFormateur'])->name('planning.formateur');
    Route::get('/planning/salle/{salle}', [PlanningController::class, 'parSalle'])->name('planning.salle');
});
 
// Formateur (protege par middleware 'formateur')
Route::middleware('formateur')->prefix('formateur')->name('formateur.')->group(function(){
    Route::get('/planning', [PlanningFormateurController::class, 'index'])->name('planning');
    Route::get('/planning/{groupe}', [PlanningFormateurController::class, 'parGroupe'])->name('planning.groupe');
});

// Stagiaire (public)
Route::prefix('stagiaire')->name('stagiaire.')->group(function(){
    Route::get('/planning', [PlanningStagiaireController::class, 'index'])->name('planning');
    Route::get('/planning/{groupe}', [PlanningStagiaireController::class, 'parGroupe'])->name('planning.groupe');
});
