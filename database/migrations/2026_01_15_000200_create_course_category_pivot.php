<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_course_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->foreignId('course_category_id')->constrained('course_categories')->cascadeOnDelete();
            $table->unique(['course_id', 'course_category_id']);
        });

        // Đồng bộ dữ liệu cũ: gán danh mục chính vào bảng pivot
        DB::table('courses')
            ->whereNotNull('course_category_id')
            ->orderBy('id')
            ->chunkById(200, function ($courses) {
                $rows = [];
                foreach ($courses as $course) {
                    $rows[] = [
                        'course_id' => $course->id,
                        'course_category_id' => $course->course_category_id,
                    ];
                }
                if ($rows) {
                    DB::table('course_course_category')->insertOrIgnore($rows);
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_course_category');
    }
};
