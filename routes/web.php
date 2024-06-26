<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClasstypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\MeetingRoomController;
use App\Http\Controllers\PointmarketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\DiscussionDetailController;

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

Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::get('/', function () {
  return view('welcome');
});

Route::get('home', [HomeController::class, 'index']);
Route::get('install', [HomeController::class, 'install']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('otp-verification', [HomeController::class, 'otp'])->name('otp-verification');;
Route::post('/user/get-otp', [ProfileController::class, 'sendOTPNew'])->name('new.get-otp');

Route::get('/my-classes', [HomeController::class, 'myclass'])->name('myclass');
Route::get('/my-classes/{room}', [HomeController::class, 'classShow'])->name('class.show');

Route::get('/classes', [HomeController::class, 'products'])->name('products');
Route::get('/class/{room}', [HomeController::class, 'productShow'])->name('product.show');
Route::get('/category-class/{slug}', [HomeController::class, 'productByCat'])->name('product.category');
Route::get('/class-list', [HomeController::class, 'productList'])->name('product.list');
Route::get('/class/{room}/checkout', [HomeController::class, 'checkout'])->name('product.checkout');
Route::post('/class/invoice', [HomeController::class, 'storeCheckout'])->name('product.store');
Route::get('/class/invoice/{id}', [HomeController::class, 'invoiceDone']);
Route::get('/class/{id}/discussion', [HomeController::class, 'discussion'])->name('product.discussion');
Route::get('/class/{id}/discussion/part', [HomeController::class, 'discussionPart'])->name('product.discussion.part');
Route::post('/class/discussion', [HomeController::class, 'storeDiscussion'])->name('product.store.discussion');
Route::get('/class/discussion/create/{id}', [HomeController::class, 'createDiscussion'])->name('product.create.discussion');
Route::post('/class/discussion/room', [HomeController::class, 'storeDiscussionRoom'])->name('product.store.discussion.room');

Route::middleware('auth')->group(function () {

  Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
  Route::get('/member/classmarket', [MemberController::class, 'classMarket'])->name('member.market');
  Route::get('/member/myclass', [MemberController::class, 'myClass'])->name('member.myclass');
  Route::get('/member/{room}/detail', [MemberController::class, 'detail'])->name('member.detail');
  Route::get('/member/{room}/checkout', [MemberController::class, 'checkout'])->name('member.checkout');
  Route::post('/member/invoice', [MemberController::class, 'storeCheckout'])->name('member.store');
  Route::get('/member/myorder', [MemberController::class, 'myOrder'])->name('member.myorder');
  Route::get('/member/invoice/{id}', [MemberController::class, 'invoiceDone']);

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::post('/profile', [ProfileController::class, 'updateUserDetail'])->name('profile.detail');
  Route::post('/profile/get-otp', [ProfileController::class, 'sendOTP'])->name('profile.get-otp');
  Route::post('/profile/verify-otp', [ProfileController::class, 'verifyOTP'])->name('profile.verify-otp');

  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);
  Route::get('/user/{id}/class', [UserController::class, 'listClass'])->name('users.class');
  Route::get('/user/{id}/class/create', [UserController::class, 'createClass'])->name('class.create');
  Route::post('/user/class/create/send', [UserController::class, 'storeClass'])->name('class.store');
  Route::post('users-import', [UserController::class, 'import'])->name('users.import');
  Route::resource('rooms', RoomController::class);
  Route::resource('cruds', CrudController::class);
  Route::resource('classtypes', ClasstypeController::class);
  Route::resource('categories', CategoryController::class);
  Route::resource('transactions', TransactionController::class);
  Route::resource('pointmarkets', PointmarketController::class);
  Route::resource('sliders', SliderController::class);

  // Course
  Route::resource('courses', CourseController::class);  

  // Meeting Room
  Route::resource('meetingrooms', MeetingRoomController::class);
  Route::get('/meetingrooms/{meetingroom}/join', [MeetingRoomController::class, 'join'])->name('meetingrooms.join');

  // Discussion
  Route::resource('discussions', DiscussionController::class);
  Route::get('/discussions/{discussion}/room', [DiscussionController::class, 'room'])->name('discussions.room');  

  // Discussion Detail
  Route::resource('discussiondetails', DiscussionDetailController::class);

});

require __DIR__ . '/auth.php';
