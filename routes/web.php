<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GuestAuthController;

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

// User Routes
Route::resource('users', UserController::class);


Route::middleware('guest')->group(function () {
    // Index Route
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/login', function () {
        return view('hotel-login');
    });

    Route::get('about', function () {
        return view('about');
    });

    Route::get('contact', function () {
        return view('contact');
    });


    // Hotel Sign-up Routes
    Route::get('HSignup', [UserController::class, 'hotel_create']);
    Route::post('signup', [UserController::class, 'store']);
    // Restaurant Sign-up Routes
    Route::get('RSignup', [UserController::class, 'rest_create']);

    // Login Routes
    Route::resource('sessions', SessionsController::class);
    Route::post('login', [SessionsController::class, 'store']);
    Route::get('login', function () {
        return view('login');
    })->name('login');
});

// Authenticated Dashboard Route
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

    // Landing page
    Route::get('landing', function () {
        return view('end-user.landing');
    })->name('landing');

    // Edit User Route
    Route::get('edit', [UserController::class, 'edit'])->name('accont.edit');

    // Menu Routes
    Route::get('menu', [FoodController::class, 'menu'])->name('menu');
    Route::get('menu/{food:id}', [FoodController::class, 'show']);

    // Checkout Routes
    Route::resource('checkout', CheckoutController::class, [
        'except' => ['show', 'edit', 'update']
    ]);
});


// Employee Dashboard Route
Route::middleware('employee')->group(function () {
    Route::get('employee', [EmployeeController::class, 'show'])->name('employe');
    Route::get('employee/new-order', [EmployeeController::class, 'showNew']);
    Route::post('employee/remove-order', [EmployeeController::class, 'remove']);
    Route::post('employee/add-order', [EmployeeController::class, 'addOrder']);
    Route::post('employee/place-order', [EmployeeController::class, 'place']);
    Route::post('employee/confirm-order', [EmployeeController::class, 'confirm']);
    Route::post('employee/edit-order', [EmployeeController::class, 'getEdit'])->name('edit-order');
    Route::get('employee/show-edit-order/{order:id}', [EmployeeController::class, 'showEdit']);
    Route::post('employee/save-edit-order', [EmployeeController::class, 'save']);


    Route::get('employee/show-order/{order:id}', [EmployeeController::class, 'showShow']);
    Route::post('employee/order-show', [EmployeeController::class, 'getShow']);
});

// Admin Dashboard Route
Route::middleware('admin')->group(function () {
    Route::resource('adminpage', AdminController::class);
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin-menu/{food:id}', [AdminController::class, 'editorView']);
});
