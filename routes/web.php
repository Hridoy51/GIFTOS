<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorders', [HomeController::class, 'myorders'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);

Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);

Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);

Route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);

Route::post('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);

Route::get('search_product', [AdminController::class, 'search_product'])->middleware(['auth', 'admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

Route::post('place_order', [HomeController::class, 'place_order'])->middleware(['auth', 'verified']);

Route::get('view_orders', [AdminController::class, 'view_orders'])->middleware(['auth', 'admin']);

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);

Route::controller(HomeController::class)->group(function () {

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{val}', 'stripePost')->name('stripe.post');

});

Route::get('shop', [HomeController::class, 'shop'])->middleware(['auth', 'verified']);

Route::get('why', [HomeController::class, 'why'])->middleware(['auth', 'verified']);
Route::get('testimonial', [HomeController::class, 'testimonial'])->middleware(['auth', 'verified']);

Route::get('contactus', [HomeController::class, 'contactus'])->middleware(['auth', 'verified']);

Route::get('remove_from_cart/{id}', [HomeController::class, 'remove_from_cart'])->middleware(['auth', 'verified']);