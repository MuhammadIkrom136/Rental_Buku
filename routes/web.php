<?php

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware(['only_client']);
    
    
    Route::middleware('only_admin')->group(function () {
        Route::get('register', [AuthController::class, 'register']);
        Route::post('register', [AuthController::class, 'registerProcess']);
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('books', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::post('book-edit/{slug}', [BookController::class, 'update']);
        // Route::get('book-delete/{slug}', [BookController::class, 'delete']);
        Route::post('book-destroy', [BookController::class, 'destroy']);
        Route::get('book-deleted', [BookController::class, 'deletedBook']);
        Route::get('book-restore/{slug}', [bookController::class, 'restore']);


        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        // Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::post('category-edit', [CategoryController::class, 'update']);
        // Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::post('category-destroy', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [categoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [categoryController::class, 'restore']);


        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        // Route::get('user-ban/{slug}', [UserController::class, 'delete']);
        Route::post('user-destroy', [UserController::class, 'destroy']);
        Route::get('user-banned', [UserController::class, 'banned']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        Route::get('book-rent', [BookRentController::class, 'index']);
        Route::post('book-rent', [BookRentController::class, 'store']);
        Route::get('book-return', [BookRentController::class, 'returnBook']);
        Route::post('book-return', [BookRentController::class, 'saveReturn']);
        
        Route::get('rentlogs', [RentLogController::class, 'index']);
        
    });
});
