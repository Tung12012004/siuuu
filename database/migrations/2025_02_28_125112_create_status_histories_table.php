<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_status_histories', function (Blueprint $table) {
            $table->id(); // Tạo cột id mặc định làm khóa chính (PK)
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // FK1
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK2
            $table->enum('status', ['Chưa xác nhận', 'Đã xác nhận', 'Đang giao hàng', 'Thành công', 'Hủy đơn'])->default('Chưa xác nhận');
            $table->timestamp('updated_at')->useCurrent(); // Thời gian cập nhật trạng thái
    
            // Các khóa ngoại đã được xử lý trong các phương thức `constrained`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_histories');
    }
};
