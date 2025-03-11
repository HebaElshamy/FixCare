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
        Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('user'); // الأدوار: admin, Expert ,Professional,Trainee,Client
        $table->boolean('is_approved')->default(false); // الموافقة من قبل الأدمن
        $table->string('cv_path')->nullable(); // مسار حفظ السيرة الذاتية
        $table->string('phone')->nullable(); // رقم الهاتف
        $table->string('company_name')->nullable(); // اسم الجهة
        $table->integer('experience_years')->nullable(); // سنوات الخبرة
        $table->decimal('consultation_fee', 8, 2)->default(0.00); // سعر الاستشارة

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
