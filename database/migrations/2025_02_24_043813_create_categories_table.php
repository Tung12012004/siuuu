<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Laravel tự động tạo khóa chính với tên 'id'
            $table->string('name');
            $table->text('description')->nullable();    
            $table->enum('status', ['Hoạt động', 'Ngừng hoạt động'])->default('Hoạt động'); // ENUM status
            $table->timestamps();
            $table->softDeletes(); // Xóa mềm (deleted_at)
        });
    }

    public function down() {
        Schema::dropIfExists('categories');
    }
};

