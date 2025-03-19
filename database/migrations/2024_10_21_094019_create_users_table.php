<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // العمود الافتراضي ID
            $table->string('name', 255); // اسم المستخدم
            $table->string('email')->unique(); // البريد الإلكتروني الفريد
            $table->text('contact'); // معلومات الاتصال
            $table->boolean('status'); // حالة المستخدم (نشط أو غير نشط)
            $table->string('country'); // بلد المستخدم
            $table->string('role'); // دور المستخدم
            $table->string('plan'); // الخطة التي اختارها المستخدم
            $table->string('password'); // كلمة المرور
            $table->timestamps(); // أعمدة لإنشاء وحفظ تاريخ الإنشاء والتعديل
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
