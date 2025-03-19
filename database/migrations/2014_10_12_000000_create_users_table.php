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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // العمود الافتراضي ID
            $table->string('name', 255); // اسم المستخدم
            $table->string('email')->unique(); // البريد الإلكتروني الفريد
            $table->string('contact'); // معلومات الاتصال
            $table->boolean('status')->default(1); // حالة المستخدم (نشط أو غير نشط) الافتراضي نشط
            $table->string('country'); // بلد المستخدم
            $table->enum('role', ['admin', 'user'])->default('user'); // دور المستخدم (افتراضي user)
            $table->string('plan')->nullable(); // الخطة (يمكن أن تكون فارغة)
            $table->string('password'); // كلمة المرور
            $table->timestamps(); // أعمدة لإنشاء وحفظ تاريخ الإنشاء والتعديل
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
