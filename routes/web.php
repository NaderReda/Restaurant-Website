<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/',[UserController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[UserController::class,'home'])->name('dashboard');
    Route::post('/addtocart',[UserController::class, 'addToCart'])->name('addtocart');
    Route::get('/foodcart',[UserController::class, 'foodCart'])->name('food.cart');
    Route::get('/removecart/{id}',[UserController::class, 'removeCart'])->name('delete.cart');
    Route::post('/confirmorder', [UserController::class, 'confirmOrderCart'])->name('cart.confirm');
    Route::get('/order_status',[UserController::class, 'orderStatus'])->name('order_status');
});

Route::get('/addfood',[AdminController::class,'addFood'])->middleware('auth','admin')->name('admin.addfood');
Route::post('/addfood',[AdminController::class, 'postAddFood'])->middleware('auth','admin')->name('admin.postaddfood');

Route::get('/showfood',[AdminController::class, 'showFood'])->middleware('auth', 'admin')->name('admin.showfood');
Route::get('/deletefood/{id}',[AdminController::class, 'deleteFood'])->middleware('auth','admin')->name('admin.delete');
Route::get('/updatefood/{id}',[AdminController::class, 'updateFood'])->middleware('auth','admin')->name('admin.update');
Route::post('/updatefood/{id}',[AdminController::class, 'postUpdateFood'])->middleware('auth','admin')->name('admin.postupdatefood');

Route::get('/vieworder',[AdminController::class, 'viewOrders'])->middleware('auth','admin')->name('admin.vieworders');
Route::get('/delivered/{id}',[AdminController::class, 'foodStatusDelivered'])->middleware('auth','admin')->name('admin.delivered');
Route::get('/cancel/{id}',[AdminController::class,'foodStateCancel'])->middleware('auth','admin')->name('admin.cancel');

Route::post('/findtable',[UserController::class, 'findATable'])->name('book.table');
Route::get('/view_booked_table',[AdminController::class, 'viewBookedTable'])->middleware('auth','admin')->name('admin.viewbookedtable');