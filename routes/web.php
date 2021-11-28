<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\RoleController;
use App\Http\Livewire\Index;
use App\Http\Livewire\ShowDates;
use App\Http\Livewire\ShowDatesUser;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPets;
use App\Http\Livewire\ShowStatus;
use App\Http\Livewire\ShowTypes;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\ShowDonations;
use App\Http\Livewire\ShowDonationsUser;

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
//Ruta para Admin y User
Route::get('/', Index::class)->name('index');
//Rutas Admin
Route::middleware(['auth:sanctum', 'verified'])->middleware('can:showpets')->get('/mascotas', ShowPets::class)->name('showpets');
Route::middleware(['auth:sanctum', 'verified'])->middleware('can:showdates')->get('/citas', ShowDates::class)->name('showdates');
Route::middleware(['auth:sanctum', 'verified'])->middleware('can:showtypes')->get('/tipos', ShowTypes::class)->name('showtypes');
Route::middleware(['auth:sanctum', 'verified'])->middleware('can:showstatus')->get('/estatus', ShowStatus::class)->name('showstatus');
Route::middleware(['auth:sanctum', 'verified'])->middleware('can:showusers')->get('/usuarios', ShowUsers::class)->name('showusers');
Route::middleware(['auth:sanctum', 'verified'])->middleware('can:showdonations')->get('/donaciones', ShowDonations::class)->name('showdonations');

//Rutas User
Route::middleware(['auth:sanctum', 'verified'])->get('/usuario/citas', ShowDatesUser::class)->name('showdatesuser');
Route::middleware(['auth:sanctum', 'verified'])->get('/usuario/donar', ShowDonationsUser::class)->name('showdonationsuser');
Route::middleware(['auth:sanctum', 'verified'])->get('/usuario/donar/{donation}/pay', [ShowDonationsUser::class, 'pay'])->name('donation.pay');
