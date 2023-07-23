<?php

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
    return view('Welcome');
});

Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

/** Admin | Control **/

//Auth | Admin
Route::get('admin/Dashboard', [App\Http\Controllers\AdminController::class, 'AdminDashboard'])->name('Dashboard')->middleware('admin');

//Add | Admin
Route::get('/Add', [App\Http\Controllers\AdminController::class, 'Add'])->middleware('admin');

//Update | Deactivation of a Account
Route::put('/status/update/{id}', [App\Http\Controllers\AdminController::class, 'updateStatus'])->name('status.update');

//Book Management | CRUD
Route::get('/admin/Books',[App\Http\Controllers\BookManageController::class, 'AdminBook'])->name('book.manage')->middleware('admin');

Route::put('/admin/Books/add', [App\Http\Controllers\BookManageController::class, 'Addbooks'])->middleware('admin');
Route::delete('/admin/Books/delete/{id}',[App\Http\Controllers\BookManageController::class, 'Delete'])->name('books.delete')->middleware('admin');

//Edit
Route::get('/admin/Books/Edit/{id}',[App\Http\Controllers\BookManageController::class, 'Check'])->name('books.Edit')->middleware('admin');
Route::put('/admin/Books/change/{id}', [App\Http\Controllers\BookManageController::class, 'update'])->name('Books.change')->middleware('admin');


/** User | Control **/

//Table | Display
Route::get('/User/RentBooks',[App\Http\Controllers\RentController::class, 'RentBooks'])->name('User.RentBooks')->middleware('status');
Route::get('/User/BorrowedBooks',[App\Http\Controllers\RentController::class, 'BorrowedBooks'])->name('User.BorrowedBooks')->middleware('status');

//Borrow | Rent user
Route::put('/User/BorrowedBooks/Add/{id}',[App\Http\Controllers\RentController::class, 'BorrowAdd'])->name('User.BorrowedBooks.Add')->middleware('status');

//Return | User
Route::delete('/User/BorrowedBooks/Back/{id}',[App\Http\Controllers\RentController::class, 'Return'])->name('User.BorrowedBooks.Back')->middleware('status');

//Setting | User
Route::get('Settings', [App\Http\Controllers\RentController::class, 'Settings'])->name('Settings');
Route::put('Settings/Save/{id}', [App\Http\Controllers\RentController::class, 'USave'])->name('Settings.Save')->middleware('status');

//Disable | User
Route::put('Settings/Disable/{id}', [App\Http\Controllers\RentController::class, 'Disable'])->name('Settings.Disable')->middleware('status');;