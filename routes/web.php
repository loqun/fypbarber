<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\ShopstatusController;






Route::get('/', function () {
    return view('testhome');
});


Route::get('/test', function () {
    return view('testhome');
})->name('userhome');

Auth::routes();
Route::delete('/history/{id}', [BookingController::class, 'destroyhistory'])->name('deletehistory');
Route::get('/history', [BookingController::class, 'userhistory'])->name('userhistory');
Route::get('/announcement', [AnnouncementController::class, 'userfeed'])->name('userfeed');
Route::get('/appointment', [BookingController::class, 'userappointment'])->name('appointment');
Route::post('/appointment/store', [BookingController::class, 'userstore'])->name('store');
Route::get('/appointment/available-slots/{date}', [BookingController::class, 'available_slots'])->name('available');




Route::prefix('admin')->middleware('auth','is_admin')->group(function(){
    Route::get('/status', [ShopstatusController::class, 'getShopstatus']);
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/bookings/available-slots/{date}', [BookingController::class, 'available_slots'])->name('bookings.available_slot');
    Route::post('/slotinterval', [SlotController::class, 'storetimeintervals'])->name('slotintervals');
    Route::resource('slots', SlotController::class);
    Route::get('/bookings/testcreate', [BookingController::class, 'testcreate'])->name('bookings.testcreate');
    Route::resource('bookings', BookingController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('products', ProductController::class);
    Route::resource('staffs', StaffController::class);
    Route::resource('customers', CustomerController::class);   
    Route::resource('orders', OrderController::class);
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);
    Route::get('/bookings/available-slot/{date}', [BookingController::class, 'available_slot'])->name('bookings.available_slot');
    



});
