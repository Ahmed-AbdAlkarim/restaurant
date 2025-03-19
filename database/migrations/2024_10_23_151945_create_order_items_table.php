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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');  // ربط الطلب بتفاصيل الأصناف
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');  // ربط تفاصيل الطلب بالأصناف
            $table->integer('quantity')->default(1);  // الكمية
            $table->decimal('price', 8, 2);  // السعر لكل صنف (الكميّة * سعر الصنف)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
