<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClasstypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index']);
Route::get('/classes', [HomeController::class, 'products'])->name('products');
Route::get('/class/{room}', [HomeController::class, 'productShow'])->name('product.show');
Route::get('/category-pclass/{slug}', [HomeController::class, 'productByCat'])->name('product.category');
Route::get('/class-list', [HomeController::class, 'productList'])->name('product.list');

Route::middleware('auth')->group(function () {
    
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
    Route::get('/member/classmarket', [MemberController::class, 'classMarket'])->name('member.market');
    Route::get('/member/myclass', [MemberController::class, 'myClass'])->name('member.myclass');
    Route::get('/member/{room}/detail', [MemberController::class, 'detail'])->name('member.detail');
    Route::get('/member/{room}/checkout', [MemberController::class, 'checkout'])->name('member.checkout');
    Route::post('/member/invoice', [MemberController::class, 'storeCheckout'])->name('member.store');
    Route::get('/member/myorder', [MemberController::class, 'myOrder'])->name('member.myorder');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post ('/profile',[ProfileController::class, 'updateUserDetail'])->name('profile.detail');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('cruds', CrudController::class);
    Route::resource('classtypes', ClasstypeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('transactions', TransactionController::class);
});

require __DIR__.'/auth.php';
