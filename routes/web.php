<?php

use Illuminate\Support\Facades\Route;

// controller admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminOrderController;

// controller member
use App\Http\Controllers\LandingPagesController;
use App\Http\Controllers\Member\MemberAuthController;
use App\Http\Controllers\Member\MemberTransactionController;



// home
Route::get('/', [LandingPagesController::class, 'index'])->name('home');

// untuk member / buyer
Route::get('member/login', [MemberAuthController::class, 'index'])->name('member.login');
Route::post('member/login/auth', [MemberAuthController::class, 'login'])->name('member.login.auth');
Route::get('member/logout', [MemberAuthController::class, 'logout'])->name('member.logout');

Route::get('member/register', [MemberAuthController::class, 'register'])->name('member.register');
Route::post('member/register/store', [MemberAuthController::class, 'store'])->name('member.register.store');


// checkout
Route::post('member/checkout', [MemberTransactionController::class, 'checkout'])->name('member.checkout');


// untuk admin / seller
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('admin/login/auth', [AdminAuthController::class, 'login'])->name('admin.login.auth');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('seller.middleware')->group(function () {
  // view halaman utama
  Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

  // route crud product
  // create
  Route::get('/create', [AdminDashboardController::class, 'create'])->name('admin.dashboard.create');
  Route::post('/create/store', [AdminDashboardController::class, 'store'])->name('admin.dashboard.create.store');
  // edit
  Route::get('/edit/{id}', [AdminDashboardController::class, 'edit'])->name('admin.dashboard.edit');
  Route::put('/edit/update/{id}', [AdminDashboardController::class, 'updated'])->name('admin.dashboard.edit.update');
  // delete
  Route::get('/delete/{id}', [AdminDashboardController::class, 'delete'])->name('admin.dashboard.delete');

  Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
  Route::post('/orders/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
});
