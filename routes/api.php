<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\AuthController;
// use App\Http\Controllers\Api\UserController;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Đây là nơi bạn đăng ký các route API cho ứng dụng của mình.
// | Tất cả các route này sẽ được tải bởi RouteServiceProvider trong nhóm middleware "api".
// |
// */

// // Đăng ký và đăng nhập
// Route::post('/auth/register', [AuthController::class, 'RegisterUser']);
// // Route đăng nhập
// Route::post('/auth/login', [AuthController::class, 'loginUser'])->name('auth.login');

// // Route chỉ dành cho Admin
// Route::middleware(['auth:sanctum', 'role:Admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return response()->json(['message' => 'Welcome to Admin Dashboard']);
//     })->name('admin.dashboard');
// });

// // Route quên mật khẩu (gửi email reset password)
// Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

// // Route đặt lại mật khẩu bằng token từ email
// Route::post('/auth/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Chỉ những người dùng đã đăng nhập (có token) mới có thể đổi mật khẩu
// Route::middleware('auth:sanctum')->post('/auth/change-password', [AuthController::class, 'changePassword']);




// Route::middleware(['auth:sanctum', 'role:Admin'])->group(function () {
//     Route::get('/users', [UserController::class, 'index']); // Lấy danh sách user
//     Route::post('/users', [UserController::class, 'store']); // Tạo user mới
//     Route::get('/users/{id}', [UserController::class, 'show']); // Chi tiết user
//     Route::put('/users/{id}', [UserController::class, 'update']); // Cập nhật user
//     Route::delete('/users/{id}', [UserController::class, 'destroy']); // Xóa user
// });



















use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->post('/auth/change-password', [AuthController::class, 'changePassword']);

//  **Routes Đăng Ký & Đăng Nhập**
Route::post('/auth/register', [AuthController::class, 'RegisterUser'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'loginUser'])->name('auth.login');

//  **Routes Quên Mật Khẩu**
Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::post('/auth/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

//  **Routes Yêu Cầu Đăng Nhập**
Route::middleware(['auth:sanctum'])->group(function () {

    // Đăng Xuất
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Đổi Mật Khẩu
    Route::post('/auth/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');
  
    

    // Lấy Thông Tin Người Dùng
    Route::get('/auth/profile', [AuthController::class, 'profile'])->name('auth.profile');

    //  **Routes Chỉ Dành Cho ADMIN - Quản Lý Users**
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Danh sách user
        Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Thêm user mới
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show'); // Xem thông tin user
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // Cập nhật user
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Xóa user
    });
});

