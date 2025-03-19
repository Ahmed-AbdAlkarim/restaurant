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
    Schema::create('about', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // العنوان الرئيسي
        $table->string('subtitle'); // العنوان الفرعي
        $table->text('description_1'); // الفقرة الأولى
        $table->text('description_2'); // الفقرة الثانية
        $table->integer('years_experience'); // عدد سنوات الخبرة
        $table->integer('master_chefs'); // عدد الطهاة
        $table->timestamps();
    });
}

    /**    php artisan db:seed --class=AboutSeeder
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
