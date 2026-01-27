<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            $table->foreignId('document_id')->nullable()->after('field')->constrained('documents')->nullOnDelete();
            $table->string('document_title')->nullable()->after('document_id');
            $table->decimal('document_price', 12, 2)->nullable()->after('document_title');
            $table->string('payment_note')->nullable()->after('document_price');
            $table->text('address')->nullable()->after('payment_note');
            $table->text('notes')->nullable()->after('address');
        });
    }

    public function down(): void
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            if (Schema::hasColumn('form_submissions', 'notes')) {
                $table->dropColumn('notes');
            }
            if (Schema::hasColumn('form_submissions', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('form_submissions', 'payment_note')) {
                $table->dropColumn('payment_note');
            }
            if (Schema::hasColumn('form_submissions', 'document_price')) {
                $table->dropColumn('document_price');
            }
            if (Schema::hasColumn('form_submissions', 'document_title')) {
                $table->dropColumn('document_title');
            }
            if (Schema::hasColumn('form_submissions', 'document_id')) {
                $table->dropForeign(['document_id']);
                $table->dropColumn('document_id');
            }
        });
    }
};
