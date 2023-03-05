<?php

use App\Http\Controllers\Admin\{AdminController, CategoryController, MenuController, TableController, AdmReservationController};
use App\Http\Controllers\User\ReservationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contoh', function() {
    return view('admin.contoh');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin ------------------ //

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/admin/categories', [CategoryController::class, 'category'])->name('category');
Route::get('/admin/add-categories/', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('/admin/categories/store/', [CategoryController::class, 'storeCategory'])->name('storeCategory');
Route::get('/admin/edit-categories/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/admin/edit-categories/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
Route::get('/admin/delete-categories/{id}', [CategoryController::class, 'destroyCategory'])->name('destroyCategory');

Route::get('/admin/menus', [MenuController::class, 'menu'])->name('menu');
Route::get('/admin/add-menus/', [MenuController::class, 'createMenu'])->name('createMenu');
Route::post('/admin/menus/store/', [MenuController::class, 'storeMenu'])->name('storeMenu');
Route::get('/admin/edit-menus/{id}', [MenuController::class, 'editMenu'])->name('editMenu');
Route::post('/admin/edit-menus/{id}', [MenuController::class, 'updateMenu'])->name('updateMenu');
Route::get('/admin/delete-menus/{id}', [MenuController::class, 'destroyMenu'])->name('destroyMenu');

Route::get('/admin/tables', [TableController::class, 'table'])->name('table');
Route::get('/admin/add-tables/', [TableController::class, 'createTable'])->name('createTable');
Route::post('/admin/tables/store/', [TableController::class, 'storeTable'])->name('storeTable');
Route::get('/admin/edit-tables/{id}', [TableController::class, 'editTable'])->name('editTable');
Route::post('/admin/edit-tables/{id}', [TableController::class, 'updateTable'])->name('updateTable');
Route::get('/admin/delete-tables/{id}', [TableController::class, 'destroyTable'])->name('destroyTable');

Route::get('/admin/reservations', [AdmReservationController::class, 'reservation'])->name('reservation');
Route::get('/admin/add-reservations/', [AdmReservationController::class, 'createReservation'])->name('createReservation');
Route::post('/admin/reservations/store/', [AdmReservationController::class, 'storeReservation'])->name('storeReservation');
Route::get('/admin/edit-reservations/{id}', [AdmReservationController::class, 'editReservation'])->name('editReservation');
Route::post('/admin/edit-reservations/{id}', [AdmReservationController::class, 'updateReservation'])->name('updateReservation');
Route::get('/admin/delete-reservations/{id}', [AdmReservationController::class, 'destroyReservation'])->name('destroyReservation');

// User ------------------ //

Route::get('/categories', function () {
    return view('user.categories');
});

Route::get('/menus', function () {
    return view('user.menus');
});








// Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function() {
//     Route::get('/', [AdminController::class, 'index'])->name('index');
// });

// require __DIR__ . '/auth.php';