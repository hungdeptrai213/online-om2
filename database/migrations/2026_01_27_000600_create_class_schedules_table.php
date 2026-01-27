<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('schedule')->nullable()->comment('Ví dụ: Tối thứ 2 & tối thứ 4');
            $table->date('start_date')->nullable();
            $table->integer('sessions')->default(0)->comment('Số buổi');
            $table->string('format')->nullable()->comment('Online, Offline, Hybrid');
            $table->decimal('cost', 12, 2)->default(0);
            $table->string('author')->nullable();
            $table->string('shared_by')->nullable();
            $table->string('status')->nullable()->comment('Ví dụ: Còn trống, Đã kín');
            $table->string('cover_url')->nullable()->comment('Đường dẫn ảnh đại diện');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
    }
};
