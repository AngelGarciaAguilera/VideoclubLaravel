<?php

use App\Http\Controllers\ProfileController;
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

//############################
//EJERCICIO 1

/*Route::get('/', function () {
    return 'Pantalla principal';
});

Route::get('/login', function () {
    return 'Login usuario';
});

Route::get('/logout', function () {
    return 'Logout usuario';
});

Route::get('/catalog', function () {
    return 'Listado de películas';
});

Route::get('/catalog/show/{id}', function (int $id) {
    return 'Vista detalle película '.$id;
});

Route::get('/catalog/create', function () {
    return 'Añadir película';
});

Route::get('/catalog/edit/{id}', function (int $id) {
    return 'Modificar película '.$id;
});*/

//############################

Route::get('/', [\App\Http\Controllers\HomeController::class, "getHome"])->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/catalog', [\App\Http\Controllers\CatalogController::class, "getIndex"])->name('catalog.index');
    Route::get('/catalog/show/{id}', [\App\Http\Controllers\CatalogController::class, "getShow"])->where('id', '[0-9]+')->name('catalog.show');
    Route::get('/catalog/create', [\App\Http\Controllers\CatalogController::class, "getCreate"])->name('catalog.create');
    Route::post('/catalog/create', [\App\Http\Controllers\CatalogController::class, "postCreate"])->name('catalog.store');
    Route::get('/catalog/edit/{id}', [\App\Http\Controllers\CatalogController::class, "getEdit"])->where('id', '[0-9]+')->name('catalog.edit');
    Route::put('/catalog/edit/{id}', [\App\Http\Controllers\CatalogController::class, "putEdit"])->where('id', '[0-9]+')->name('catalog.update');
    Route::put('/catalog/rent/{id}', [\App\Http\Controllers\CatalogController::class, "putRent"])->where('id', '[0-9]+')->name('catalog.rent');
    Route::put('/catalog/return/{id}', [\App\Http\Controllers\CatalogController::class, "putReturn"])->where('id', '[0-9]+')->name('catalog.return');
    Route::delete('/catalog/delete/{id}', [\App\Http\Controllers\CatalogController::class, "deleteMovie"])->where('id', '[0-9]+')->name('catalog.delete');
});

Route::get('/dashboard', [\App\Http\Controllers\CatalogController::class, "getRented"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
