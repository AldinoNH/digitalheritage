<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\ObjekwisataController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaketWisataController;
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

Route::get('/', [BeritaController::class, 'index'])->name('indexuas');

Route::get('/desawisataa', function () {
    return view('desawisata');
});

Route::get('/paketwisata', function () {
    return view('paketwisata');
});


Route::get('/dashboarddd', function () {
    return view('indexuas');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/beritaadmin', [ItemController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('beritaadmin');

Route::get('/desawisataadmin', [ItemController::class, 'indexobjekwisata'])
    ->middleware(['auth', 'verified'])
    ->name('desawisataadmin');

Route::get('/festivaladmin', [ItemController::class, 'indexfestival'])
    ->middleware(['auth', 'verified'])
    ->name('festivaladmin');

Route::get('/customeradmin', [ItemController::class, 'indexcustomer'])
    ->middleware(['auth', 'verified'])
    ->name('customeradmin');

Route::get('/paketwisataadmin', [ItemController::class, 'indexpaketwisata'])
    ->middleware(['auth', 'verified'])
    ->name('paketwisataadmin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/store', [ItemController::class, 'store'])->name('store');
Route::post('/storeobjekwisata', [ItemController::class, 'storeobjekwisata'])->name('objekwisata.store');
Route::post('/storefestival', [ItemController::class, 'storefestival'])->name('festival.store');
Route::post('/storepaketwisata', [ItemController::class, 'storepaketwisata'])->name('paketwisata.store');

Route::get('/berita/{id}/edit', [ItemController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{id}', [ItemController::class, 'update'])->name('berita.update');

Route::get('/objekwisata/{id}/edit', [ItemController::class, 'editobjekwisata'])->name('objekwisata.edit');
Route::put('/objekwisata/{id}', [ItemController::class, 'updateobjekwisata'])->name('objekwisata.update');

Route::get('/festival/{id}/edit', [ItemController::class, 'editfestival'])->name('festival.edit');
Route::put('/festival/{id}', [ItemController::class, 'updatefestival'])->name('festival.update');

Route::get('/paketwisata/{id}/edit', [ItemController::class, 'editpaketwisata'])->name('paketwisata.edit');
Route::put('/paketwisata/{id}', [ItemController::class, 'updatepaketwisata'])->name('paketwisata.update');

Route::delete('/berita/{id_berita}', [ItemController::class, 'destroy'])->name('berita.destroy');
Route::delete('/objekwisata/{id_objekwisata}', [ItemController::class, 'destroyobjekwisata'])->name('objekwisata.destroy');
Route::delete('/festival/{id_festival}', [ItemController::class, 'destroyfestival'])->name('festival.destroy');
Route::delete('/customer/{id_customer}', [ItemController::class, 'destroycustomer'])->name('customer.destroy');
Route::delete('/paketwisata/{id_customer}', [ItemController::class, 'destroypaketwisata'])->name('paketwisata.destroy');

Route::get('/dashboard', [BeritaController::class, 'index'])->name('indexuas');
Route::get('/desawisata', [ObjekwisataController::class, 'index'])->name('indexobjekwisata');
Route::get('/festival', [FestivalController::class, 'index'])->name('indexfestival');
Route::get('/paketwisata', [PaketWisataController::class, 'index'])->name('indexpaketwisata');

Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');


require __DIR__.'/auth.php';
