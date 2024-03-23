<?php

use App\Http\Controllers\CRUDController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [CRUDController::class, "index"])->name('crud.index');

Route::post("/add-product", [CRUDController::class, "create"])->name('crud.create');

Route::post("/update-product", [CRUDController::class, "update"])->name('crud.update');

Route::get("/delete-product-{Id}", [CRUDController::class, "delete"])->name('crud.delete');
