<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Admin\CycleComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\LoginComponent;
use App\Http\Livewire\Admin\ProfilComponent;
use App\Http\Livewire\Admin\StudentComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', LoginComponent::class)->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/tableau-de-board', DashboardComponent::class)->name('admin.dashboard');
    Route::get('/cycles', CycleComponent::class)->name('admin.cycles');
    Route::get('/etudiants', StudentComponent::class)->name('admin.students');
    Route::get('/profil', ProfilComponent::class)->name('admin.profil');

    Route::get('/etudiants/pdf', [StudentComponent::class, 'downloadPdf'])->name('admin.students.pdf');
});