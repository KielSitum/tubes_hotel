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


route::get('/',[AdminController::class, 'home']);

route::get('/home',[AdminController::class, 'index'])->name('home')->middleware('verified');

route::get('/create_room',[AdminController::class, 'create_room'])
->middleware(['auth','admin']);

route::post('/add_room',[AdminController::class, 'add_room'])
->middleware(['auth','admin']);

route::get('/view_room',[AdminController::class, 'view_room'])
->middleware(['auth','admin']);

route::get('/cancel_booking/{id}',[HomeController::class, 'cancel_booking']);

route::get('/room_delete/{id}',[AdminController::class, 'room_delete'])
->middleware(['auth','admin']);

route::get('/room_update/{id}',[AdminController::class, 'room_update'])
->middleware(['auth','admin']);

route::post('/edit_room/{id}',[AdminController::class, 'edit_room'])
->middleware(['auth','admin']);


route::post('/add_booking/{id}',[HomeController::class, 'add_booking']);


route::get('/bookings',[AdminController::class, 'bookings'])
->middleware(['auth','admin']);

route::get('/delete_booking/{id}',[AdminController::class, 'delete_booking'])
->middleware(['auth','admin']);

route::get('/approve_book/{id}',[AdminController::class, 'approve_book'])
->middleware(['auth','admin']);

route::get('/reject_book/{id}',[AdminController::class, 'reject_book'])
->middleware(['auth','admin']);

route::get('/view_gallery',[AdminController::class, 'view_gallery'])
->middleware(['auth','admin']);

route::post('/upload_gallery',[AdminController::class, 'upload_gallery'])
->middleware(['auth','admin']);

route::get('/delete_gallery/{id}',[AdminController::class, 'delete_gallery'])
->middleware(['auth','admin']);

Route::get('/contact', function () {
    return view('contact');
})->middleware('auth');

Route::post('/contact', [HomeController::class, 'contact'])->middleware('auth');


route::get('/all_messages',[AdminController::class, 'all_messages'])
->middleware(['auth','admin']);

route::get('/send_mail/{id}',[AdminController::class, 'send_mail'])
->middleware(['auth','admin']);

route::get('/send_mail_bookings/{id}',[AdminController::class, 'send_mail_bookings'])
->middleware(['auth','admin']);

route::post('/mail/{id}',[AdminController::class, 'mail'])
->middleware(['auth','admin']);

route::post('/mail_bookings/{id}',[AdminController::class, 'mail_bookings'])
->middleware(['auth','admin']);

Route::middleware('auth')->group(function () {
    route::get('/room_details/{id}',[HomeController::class, 'room_details']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/history', [HomeController::class, 'index'])->name('history.index');
    Route::get('/history/{id}', [HomeController::class, 'show'])->name('history.show');
});




route::middleware([
    'auth:sanctum', 
     config ('jetstream.auth_session'),
     'verified'
     ])->group(function(){
        Route::get('/dashboard', function () {
            return view ('dashboard');
        })->name('dashboard');
     });