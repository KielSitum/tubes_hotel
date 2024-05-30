<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/profile', function () {
        return view('profile.show');
    })->name('profile.show');
});

// Public routes
Route::get('/', [AdminController::class, 'home']);
Route::post('/contact', [HomeController::class, 'contact']);

// Routes that require email verification
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    
    Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
    Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

    Route::get('/history', [HomeController::class, 'index'])->name('history.index');
    Route::get('/history/{id}', [HomeController::class, 'show'])->name('history.show');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/download-ticket/{id}', [HomeController::class, 'downloadTicket'])->name('ticket.download');

});


// Admin routes
Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/create_room', [AdminController::class, 'create_room']);
    Route::post('/add_room', [AdminController::class, 'add_room']);
    Route::get('/view_room', [AdminController::class, 'view_room']);
    Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);
    Route::get('/room_update/{id}', [AdminController::class, 'room_update']);
    Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);
    
    Route::get('/bookings', [AdminController::class, 'bookings']);
    Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);
    Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);
    Route::get('/reject_book/{id}', [AdminController::class, 'reject_book']);
    
    Route::get('/view_gallery', [AdminController::class, 'view_gallery']);
    Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);
    Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery']);
    
    Route::get('/all_messages', [AdminController::class, 'all_messages']);
    Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);
    Route::post('/mail/{id}', [AdminController::class, 'mail']);
    Route::get('/send_mail_bookings/{id}', [AdminController::class, 'send_mail_bookings']);
    Route::post('/mail_bookings/{id}', [AdminController::class, 'mail_bookings']);
});