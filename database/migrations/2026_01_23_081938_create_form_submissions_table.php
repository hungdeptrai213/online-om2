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
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('form_type'); // coaching, enterprise
            $table->string('plan_type')->nullable(); // buoi_le, lo_trinh (coaching)
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable(); // enterprise
            $table->string('contact_name')->nullable(); // enterprise contact
            $table->string('contact_phone')->nullable(); // enterprise contact phone
            $table->string('employee_count')->nullable(); // enterprise
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
