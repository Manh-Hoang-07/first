<?php

include_once('admin.php');

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\Posts\PostController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Home\Posts\PostController as HomePostController;
use App\Http\Controllers\Stone\ApplicationController;
use App\Http\Controllers\Stone\CartController;
use App\Http\Controllers\Stone\CheckoutController;
use App\Http\Controllers\Stone\HomeController;
use App\Http\Controllers\Stone\OrderController;
use App\Http\Controllers\Stone\ProductController;
use App\Http\Controllers\Stone\ProjectController;
use App\Http\Controllers\Stone\ShowroomController;
use App\Http\Controllers\Stone\VideoController;
use App\Http\Controllers\Stone\TestController;
use App\Http\Controllers\Stone\ShowroomListController;
use App\Http\Controllers\Stone\ApplicationDetailController;
use App\Http\Controllers\Stone\ContactController;
use App\Http\Controllers\Home\SlideController as HomeSlideController;

// Chuyển hướng trang chủ đến trang đá
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index'); // Hiển thị form login
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post'); // Xử lý đăng nhập
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout'); // Xử lý đăng xuất
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login'); // Hiển thị form đăng nhập với google
Route::get('/auth/google/callback', [GoogleController::class, 'callback']); // Xử lý đăng nhập với google

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.index'); // Hiển thị form đăng ký
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register'); // Xử lý đăng ký
Route::post('/send-otp-register', [RegisterController::class, 'sendOtp'])->name('send.register'); // Gửi OTP đăng ký tài khoản

Route::get('/forgot-password', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('forgot.password.index'); // Hiển thị form quên mật khẩu
Route::post('/send-otp-forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('send.forgot.password'); // Gửi OTP quên mật khẩu
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password'); // Xử lý tạo lại mật khẩu

// Routes cho phần trang chủ (không yêu cầu đăng nhập)
Route::prefix('home')->name('home.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/{id}', [PostController::class, 'show'])->name('show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::post('/upload', [UploadController::class, 'upload'])->name('upload');

// Home Post routes
Route::get('/posts', [HomePostController::class, 'index'])->name('home.posts.index');
Route::get('/posts/{slug}', [HomePostController::class, 'show'])->name('home.posts.show');

// Admin routes
require __DIR__ . '/admin.php';

// Trang web đá
Route::prefix('stone')->name('stone.')->middleware('web')->group(function () {
    // Trang chủ
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Trang giới thiệu
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    // Trang liên hệ
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // Sản phẩm đá
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/category/{slug}', [ProductController::class, 'category'])->name('category');
        Route::get('/material/{slug}', [ProductController::class, 'material'])->name('material');
        Route::get('/surface/{slug}', [ProductController::class, 'surface'])->name('surface');
        Route::get('/{slug}', [ProductController::class, 'show'])->name('show');
        Route::get('/finish/{slug}', [ProductController::class, 'finish'])->name('finish');
    });

    // Giỏ hàng
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add', [CartController::class, 'add'])->name('add');
        Route::post('/update', [CartController::class, 'update'])->name('update');
        Route::post('/remove', [CartController::class, 'remove'])->name('remove');
        Route::post('/clear', [CartController::class, 'clear'])->name('clear');
    });

    // Thanh toán
    Route::prefix('checkout')->name('checkout.')->middleware('auth')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/process', [CheckoutController::class, 'process'])->name('process');
        Route::get('/success/{order}', [CheckoutController::class, 'success'])->name('success');
    });

    // Đơn hàng
    Route::prefix('orders')->name('orders.')->middleware('auth')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('show');
        Route::post('/{id}/cancel', [OrderController::class, 'cancel'])->name('cancel');
    });

    // Ứng dụng đá
    Route::prefix('applications')->name('applications.')->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('index');
        Route::get('/test-html/{slug}', [ApplicationController::class, 'testHtml'])->name('test_html');
        Route::get('/simple-test/{slug}', [ApplicationController::class, 'simpleTest'])->name('simple_test');
        Route::get('/minimal-test/{slug}', [ApplicationController::class, 'testMinimal'])->name('minimal_test');
        Route::get('/via-he-custom', [ApplicationController::class, 'viaHe'])->name('via_he_custom');
        Route::get('/detail/{slug}', [ApplicationDetailController::class, 'show'])->name('detail');
        Route::get('/{slug}', [ApplicationController::class, 'show'])->name('show');
    });

    // Dự án đá
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/{slug}', [ProjectController::class, 'show'])->name('show');
    });

    // Showroom
    Route::prefix('showrooms')->name('showrooms.')->group(function () {
        Route::get('/', [App\Http\Controllers\Stone\ShowroomPageController::class, 'index'])->name('index');
        Route::get('/{slug}', [App\Http\Controllers\Stone\ShowroomPageController::class, 'show'])->name('show');
    });

    // Video
    Route::prefix('videos')->name('videos.')->group(function () {
        Route::get('/', [VideoController::class, 'index'])->name('index');
    });

    // Test route
    Route::get('/test', [TestController::class, 'index'])->name('test');

    // New showroom list route
    Route::get('/showrooms-list', [ShowroomListController::class, 'index'])->name('showrooms.list');
});

// Test Blade rendering
Route::get('/test-blade', function () {
    return view('test_blade');
});

Route::get('/slides', [HomeSlideController::class, 'index'])->name('home.slides');

// Test showroom page
Route::get('/test-showroom', [App\Http\Controllers\TestShowroomController::class, 'index'])->name('test.showroom');
