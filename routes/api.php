<?php

// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ProductVariantController;
// use App\Http\Controllers\VariantValueController;
// use App\Http\Controllers\VariantImageController;
// use App\Http\Controllers\CategoryController;
// use Illuminate\Support\Facades\Route;

// // ✅ Routes cho sản phẩm (products)
// Route::apiResource('products', ProductController::class);
// Route::put('products/{product}', [ProductController::class, 'update']);
// Route::delete('products/{product}/soft', [ProductController::class, 'softDelete']);
// Route::post('products/{product}/restore', [ProductController::class, 'restore']);
// Route::get('products/trashed', [ProductController::class, 'trashed']);

// // ✅ Routes cho biến thể sản phẩm (product_variants)
// Route::apiResource('products/{product}/variants', ProductVariantController::class);
// Route::put('variants/{variant}', [ProductVariantController::class, 'update']);
// Route::delete('variants/{variant}/soft', [ProductVariantController::class, 'softDelete']);
// Route::post('variants/{variant}/restore', [ProductVariantController::class, 'restore']);
// Route::get('variants/{product}/trashed', [ProductVariantController::class, 'trashed']);

// // ✅ Routes cho giá trị biến thể (variant_values)
// Route::apiResource('variants/{variant}/values', VariantValueController::class);
// Route::put('values/{value}', [VariantValueController::class, 'update']);
// Route::delete('values/{value}/soft', [VariantValueController::class, 'softDelete']);
// Route::post('values/{value}/restore', [VariantValueController::class, 'restore']);
// Route::get('values/{variant}/trashed', [VariantValueController::class, 'trashed']);

// // ✅ Routes cho hình ảnh biến thể (variant_images)
// Route::apiResource('values/{value}/images', VariantImageController::class);
// Route::put('images/{image}', [VariantImageController::class, 'update']);
// Route::delete('images/{image}/soft', [VariantImageController::class, 'softDelete']);
// Route::post('images/{image}/restore', [VariantImageController::class, 'restore']);
// Route::get('images/{value}/trashed', [VariantImageController::class, 'trashed']);

// // ✅ Routes cho danh mục sản phẩm (categories)
// Route::apiResource('categories', CategoryController::class);
// Route::put('categories/{category}', [CategoryController::class, 'update']);
// Route::delete('categories/{category}/soft', [CategoryController::class, 'softDelete']);
// Route::post('categories/{category}/restore', [CategoryController::class, 'restore']);
// Route::get('categories/trashed', [CategoryController::class, 'trashed']);




// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ProductVariantController;
// use App\Http\Controllers\VariantValueController;
// use App\Http\Controllers\VariantImageController;
// use Illuminate\Support\Facades\Route;

// // 🚀 Routes cho Authentication (Đăng nhập, Đăng ký, Đăng xuất)
// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

// // ✅ Các routes cần xác thực Sanctum
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('logout', [AuthController::class, 'logout']);

//     // ✅ Routes cho danh mục sản phẩm (categories) - Admin
//     Route::middleware('admin')->group(function () {
//         Route::apiResource('categories', CategoryController::class);
//         Route::put('categories/{category}', [CategoryController::class, 'update']);
//         Route::delete('categories/{category}/soft', [CategoryController::class, 'softDelete']);
//         Route::post('categories/{category}/restore', [CategoryController::class, 'restore']);
//         Route::get('categories/trashed', [CategoryController::class, 'trashed']);

//         // ✅ Routes cho sản phẩm (products) - Admin
//         Route::apiResource('products', ProductController::class);
//         Route::put('products/{product}', [ProductController::class, 'update']);
//         Route::delete('products/{product}/soft', [ProductController::class, 'softDelete']);
//         Route::post('products/{product}/restore', [ProductController::class, 'restore']);
//         Route::get('products/trashed', [ProductController::class, 'trashed']);

//         // ✅ Routes cho biến thể sản phẩm (product_variants) - Admin
//         Route::apiResource('products/{product}/variants', ProductVariantController::class);
//         Route::put('variants/{variant}', [ProductVariantController::class, 'update']);
//         Route::delete('variants/{variant}/soft', [ProductVariantController::class, 'softDelete']);
//         Route::post('variants/{variant}/restore', [ProductVariantController::class, 'restore']);
//         Route::get('variants/{product}/trashed', [ProductVariantController::class, 'trashed']);

//         // ✅ Routes cho giá trị biến thể (variant_values) - Admin
//         Route::apiResource('variants/{variant}/values', VariantValueController::class);
//         Route::put('values/{value}', [VariantValueController::class, 'update']);
//         Route::delete('values/{value}/soft', [VariantValueController::class, 'softDelete']);
//         Route::post('values/{value}/restore', [VariantValueController::class, 'restore']);
//         Route::get('values/{variant}/trashed', [VariantValueController::class, 'trashed']);

//         // ✅ Routes cho hình ảnh biến thể (variant_images) - Admin
//         Route::apiResource('values/{value}/images', VariantImageController::class);
//         Route::put('images/{image}', [VariantImageController::class, 'update']);
//         Route::delete('images/{image}/soft', [VariantImageController::class, 'softDelete']);
//         Route::post('images/{image}/restore', [VariantImageController::class, 'restore']);
//         Route::get('images/{value}/trashed', [VariantImageController::class, 'trashed']);
//     });
// });












// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ProductVariantController;
// use App\Http\Controllers\VariantValueController;
// use App\Http\Controllers\VariantImageController;
// use Illuminate\Support\Facades\Route;

// // 🚀 Routes cho Authentication (Đăng ký, Đăng nhập, Đăng xuất)
// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

// // ✅ Routes bảo vệ bằng Sanctum (Yêu cầu đăng nhập)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('logout', [AuthController::class, 'logout']);

//     // ✅ Routes chỉ dành cho Admin
//     Route::middleware('admin')->group(function () {

//         // ✅ Routes cho danh mục sản phẩm (categories)
//         Route::apiResource('categories', CategoryController::class);
//         Route::delete('categories/{category}/soft', [CategoryController::class, 'softDelete']);
//         Route::post('categories/{category}/restore', [CategoryController::class, 'restore']);
//         Route::get('categories/trashed', [CategoryController::class, 'trashed']);

//         // ✅ Routes cho sản phẩm (products)
//         Route::apiResource('products', ProductController::class);
//         Route::delete('products/{product}/soft', [ProductController::class, 'softDelete']);
//         Route::post('products/{product}/restore', [ProductController::class, 'restore']);
//         Route::get('products/trashed', [ProductController::class, 'trashed']);

//         // ✅ Routes cho biến thể sản phẩm (product_variants)
//         Route::apiResource('products/{product}/variants', ProductVariantController::class);
//         Route::delete('variants/{variant}/soft', [ProductVariantController::class, 'softDelete']);
//         Route::post('variants/{variant}/restore', [ProductVariantController::class, 'restore']);
//         Route::get('variants/{product}/trashed', [ProductVariantController::class, 'trashed']);

//         // ✅ Routes cho giá trị biến thể (variant_values)
//         Route::apiResource('variants/{variant}/values', VariantValueController::class);
//         Route::delete('values/{value}/soft', [VariantValueController::class, 'softDelete']);
//         Route::post('values/{value}/restore', [VariantValueController::class, 'restore']);
//         Route::get('values/{variant}/trashed', [VariantValueController::class, 'trashed']);

//         // ✅ Routes cho hình ảnh sản phẩm (variant_images)
//         Route::apiResource('products/{product}/images', VariantImageController::class);
//         Route::delete('images/{image}/soft', [VariantImageController::class, 'softDelete']);
//         Route::post('images/{image}/restore', [VariantImageController::class, 'restore']);
//         Route::get('images/trashed', [VariantImageController::class, 'trashed']);
//     });
// });















// use App\Http\Controllers\VoucherController;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ProductVariantController;
// use App\Http\Controllers\VariantValueController;
// use App\Http\Controllers\VariantImageController;

// use Illuminate\Support\Facades\Route;

// // 🚀 Routes cho Authentication (Đăng ký, Đăng nhập, Đăng xuất)
// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

// // ✅ Routes bảo vệ bằng Sanctum (Yêu cầu đăng nhập)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('logout', [AuthController::class, 'logout']);

//     // ✅ Routes chỉ dành cho Admin
//     Route::middleware('admin')->group(function () {

//         // ✅ Routes cho danh mục sản phẩm (categories)
//         Route::apiResource('categories', CategoryController::class);
//         Route::delete('categories/{category}/soft', [CategoryController::class, 'softDelete']);
//         Route::post('categories/{category}/restore', [CategoryController::class, 'restore']);
//         Route::get('categories/trashed', [CategoryController::class, 'trashed']);

//         // ✅ Routes cho sản phẩm (products)
//         Route::apiResource('products', ProductController::class);
//         Route::delete('products/{product}/soft', [ProductController::class, 'softDelete']);
//         Route::post('products/{product}/restore', [ProductController::class, 'restore']);
//         Route::get('products/trashed', [ProductController::class, 'trashed']);

//         // ✅ Routes cho biến thể sản phẩm (product_variants)
//         Route::apiResource('products/{product}/variants', ProductVariantController::class);
//         Route::delete('variants/{variant}/soft', [ProductVariantController::class, 'softDelete']);
//         Route::post('variants/{variant}/restore', [ProductVariantController::class, 'restore']);
//         Route::get('variants/{product}/trashed', [ProductVariantController::class, 'trashed']);

//         // ✅ Routes cho giá trị biến thể (variant_values)
//         Route::apiResource('variants/{variant}/values', VariantValueController::class);
//         Route::delete('values/{value}/soft', [VariantValueController::class, 'softDelete']);
//         Route::post('values/{value}/restore', [VariantValueController::class, 'restore']);
//         Route::get('values/{variant}/trashed', [VariantValueController::class, 'trashed']);

//         // ✅ Routes cho hình ảnh sản phẩm (variant_images)
//         Route::apiResource('products/{product}/images', VariantImageController::class);
//         Route::delete('images/{image}/soft', [VariantImageController::class, 'softDelete']);
//         Route::post('images/{image}/restore', [VariantImageController::class, 'restore']);
//         Route::get('images/trashed', [VariantImageController::class, 'trashed']);

//         // ✅ Routes cho vouchers
//         Route::apiResource('vouchers', VoucherController::class);
//         Route::delete('vouchers/{id}/soft', [VoucherController::class, 'softDelete']);
//         Route::post('vouchers/{id}/restore', [VoucherController::class, 'restore']);
//         Route::get('vouchers/trashed', [VoucherController::class, 'trashed']);
//     });
//     // ✅ Tất cả user có thể áp dụng voucher
//     Route::post('vouchers/apply', [VoucherController::class, 'applyVoucher']);
// });







// use App\Http\Controllers\{
//     AuthController,
//     CategoryController,
//     ProductController,
//     ProductVariantController,
//     VariantValueController,
//     VariantImageController,
//     VoucherController
// };
// use Illuminate\Support\Facades\Route;

// // 🚀 Routes cho Authentication (Đăng ký, Đăng nhập, Đăng xuất)
// Route::prefix('auth')->group(function () {
//     Route::post('register', [AuthController::class, 'register']);
//     Route::post('login', [AuthController::class, 'login']);
// });

// // ✅ Routes bảo vệ bằng Sanctum (Yêu cầu đăng nhập)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('auth/logout', [AuthController::class, 'logout']);

//     // ✅ Routes chỉ dành cho Admin
//     Route::middleware('admin')->prefix('admin')->group(function () {

//         // ✅ Routes cho danh mục sản phẩm (categories)
//         Route::apiResource('categories', CategoryController::class);
//         Route::prefix('categories')->group(function () {
//             Route::delete('{category}/soft', [CategoryController::class, 'softDelete']);
//             Route::post('{category}/restore', [CategoryController::class, 'restore']);
//             Route::get('trashed', [CategoryController::class, 'trashed']);
//         });

//         // ✅ Routes cho sản phẩm (products)
//         Route::apiResource('products', ProductController::class);
//         Route::prefix('products')->group(function () {
//             Route::delete('{product}/soft', [ProductController::class, 'softDelete']);
//             Route::post('{product}/restore', [ProductController::class, 'restore']);
//             Route::get('trashed', [ProductController::class, 'trashed']);
//         });

//         // ✅ Routes cho biến thể sản phẩm (product_variants)
//         Route::apiResource('products/{product}/variants', ProductVariantController::class);
//         Route::prefix('variants')->group(function () {
//             Route::delete('{variant}/soft', [ProductVariantController::class, 'softDelete']);
//             Route::post('{variant}/restore', [ProductVariantController::class, 'restore']);
//             Route::get('{product}/trashed', [ProductVariantController::class, 'trashed']);
//         });

//         // ✅ Routes cho giá trị biến thể (variant_values)
//         Route::apiResource('variants/{variant}/values', VariantValueController::class);
//         Route::prefix('values')->group(function () {
//             Route::delete('{value}/soft', [VariantValueController::class, 'softDelete']);
//             Route::post('{value}/restore', [VariantValueController::class, 'restore']);
//             Route::get('{variant}/trashed', [VariantValueController::class, 'trashed']);
//         });

//         // ✅ Routes cho hình ảnh sản phẩm (variant_images)
//         Route::apiResource('products/{product}/images', VariantImageController::class);
//         Route::prefix('images')->group(function () {
//             Route::delete('{image}/soft', [VariantImageController::class, 'softDelete']);
//             Route::post('{image}/restore', [VariantImageController::class, 'restore']);
//             Route::get('trashed', [VariantImageController::class, 'trashed']);
//         });

//         // ✅ Routes cho vouchers (Admin quản lý)
//         Route::apiResource('vouchers', VoucherController::class);
//         Route::prefix('vouchers')->group(function () {
//             Route::delete('{id}/soft', [VoucherController::class, 'softDelete']);
//             Route::post('{id}/restore', [VoucherController::class, 'restore']);
//             Route::get('trashed', [VoucherController::class, 'trashed']);
//         });
//     });

//     // ✅ Người dùng có thể áp dụng voucher
//     Route::post('vouchers/apply', [VoucherController::class, 'applyVoucher']);
// });







use App\Http\Controllers\{
    AuthController,
    CategoryController,
    ProductController,
    ProductVariantController,
    VariantValueController,
    VariantImageController,
    VoucherController,
    CartController,
    CartItemController,
    OrderController,
    OrderItemController,
    PaymentController
};
use Illuminate\Support\Facades\Route;

// 🚀 Routes cho Authentication (Đăng ký, Đăng nhập, Đăng xuất)
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

// ✅ Routes bảo vệ bằng Sanctum (Yêu cầu đăng nhập)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // ✅ Routes chỉ dành cho Admin
    Route::middleware('admin')->prefix('admin')->group(function () {

        // ✅ Routes cho danh mục sản phẩm (categories)
        Route::apiResource('categories', CategoryController::class);
        Route::prefix('categories')->group(function () {
            Route::delete('{category}/soft', [CategoryController::class, 'softDelete']);
            Route::post('{category}/restore', [CategoryController::class, 'restore']);
            Route::get('trashed', [CategoryController::class, 'trashed']);
        });

        // ✅ Routes cho sản phẩm (products)
        Route::apiResource('products', ProductController::class);
        Route::prefix('products')->group(function () {
            Route::delete('{product}/soft', [ProductController::class, 'softDelete']);
            Route::post('{product}/restore', [ProductController::class, 'restore']);
            Route::get('trashed', [ProductController::class, 'trashed']);
        });

        // ✅ Routes cho biến thể sản phẩm (product_variants)
        Route::apiResource('products/{product}/variants', ProductVariantController::class);
        Route::prefix('variants')->group(function () {
            Route::delete('{variant}/soft', [ProductVariantController::class, 'softDelete']);
            Route::post('{variant}/restore', [ProductVariantController::class, 'restore']);
            Route::get('{product}/trashed', [ProductVariantController::class, 'trashed']);
        });

        // ✅ Routes cho giá trị biến thể (variant_values)
        Route::apiResource('variants/{variant}/values', VariantValueController::class);
        Route::prefix('values')->group(function () {
            Route::delete('{value}/soft', [VariantValueController::class, 'softDelete']);
            Route::post('{value}/restore', [VariantValueController::class, 'restore']);
            Route::get('{variant}/trashed', [VariantValueController::class, 'trashed']);
        });

        // ✅ Routes cho hình ảnh sản phẩm (variant_images)
        Route::apiResource('products/{product}/images', VariantImageController::class);
        Route::prefix('images')->group(function () {
            Route::delete('{image}/soft', [VariantImageController::class, 'softDelete']);
            Route::post('{image}/restore', [VariantImageController::class, 'restore']);
            Route::get('trashed', [VariantImageController::class, 'trashed']);
        });

        // ✅ Routes cho vouchers (Admin quản lý)
        Route::apiResource('vouchers', VoucherController::class);
        Route::prefix('vouchers')->group(function () {
            Route::delete('{id}/soft', [VoucherController::class, 'softDelete']);
            Route::post('{id}/restore', [VoucherController::class, 'restore']);
            Route::get('trashed', [VoucherController::class, 'trashed']);
        });

        // ✅ Routes cho Quản lý đơn hàng (Admin)
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index']); // Xem danh sách đơn hàng
            Route::get('{orderId}', [OrderController::class, 'show']); // Xem chi tiết đơn hàng
            Route::put('{orderId}/update-status', [OrderController::class, 'updateStatus']); // Admin cập nhật trạng thái
        });
    });

    // ✅ Người dùng có thể áp dụng voucher
    Route::post('vouchers/apply', [VoucherController::class, 'applyVoucher']);

    // ✅ Routes cho Cart (Giỏ hàng)
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index']); // Xem giỏ hàng
        Route::delete('{cartId}', [CartController::class, 'destroy']); // Xóa giỏ hàng
    });

    // ✅ Routes cho CartItem (Sản phẩm trong giỏ hàng)
    Route::prefix('cart/items')->group(function () {
        Route::get('/', [CartItemController::class, 'index']); // Xem danh sách sản phẩm trong giỏ hàng
        Route::post('/', [CartItemController::class, 'store']); // Thêm sản phẩm vào giỏ hàng
        Route::put('{cartItemId}', [CartItemController::class, 'update']); // Cập nhật số lượng
        Route::delete('{cartItemId}', [CartItemController::class, 'destroy']); // Xóa sản phẩm khỏi giỏ hàng
    });

    // ✅ Routes cho Order (Đơn hàng)
    Route::prefix('orders')->group(function () {
        Route::post('/', [OrderController::class, 'create']); // Tạo đơn hàng mới
        Route::put('{orderId}/cancel', [OrderController::class, 'cancelOrder']); // Khách hàng có thể hủy đơn hàng khi ở trạng thái 'Chưa xác nhận'
    });

    // ✅ Routes cho OrderItem (Sản phẩm trong đơn hàng)
    Route::prefix('order/{orderId}/items')->group(function () {
        Route::get('/', [OrderItemController::class, 'index']); // Lấy danh sách sản phẩm trong đơn hàng
        Route::post('/', [OrderItemController::class, 'store']); // Thêm sản phẩm vào đơn hàng
    });

    Route::prefix('order/item')->group(function () {
        Route::put('{orderItemId}', [OrderItemController::class, 'update']); // Cập nhật số lượng sản phẩm
        Route::delete('{orderItemId}', [OrderItemController::class, 'destroy']); // Xóa sản phẩm khỏi đơn hàng
    });

    // ✅ Routes cho Thanh toán
    Route::prefix('payment')->group(function () {
        Route::post('{orderId}', [PaymentController::class, 'payment']); // Xử lý thanh toán
        Route::get('{orderId}/status', [PaymentController::class, 'paymentResult']); // Nhận kết quả thanh toán
    });
});
