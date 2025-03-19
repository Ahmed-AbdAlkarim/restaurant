<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'price', 'image', 'category'];

    // العلاقة مع الطلبات عبر OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
