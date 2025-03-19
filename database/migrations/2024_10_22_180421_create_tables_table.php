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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();  // المعرف الفريد للطاولة (Primary Key)
            $table->string('name');  // اسم أو رقم الطاولة
            $table->integer('capacity');  // سعة الطاولة (عدد الأشخاص الممكن جلوسهم)
            $table->enum('status', ['available', 'reserved', 'occupied'])->default('available');  // حالة الطاولة
            $table->boolean('is_active')->default(true); // لو عاوز تعطل الترابيزة من النظام
            $table->timestamps();  // لحفظ وقت الإنشاء والتعديل للطاولة
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
