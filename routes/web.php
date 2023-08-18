<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\LoginComponent;
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
});