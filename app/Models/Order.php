<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone_number','total_price', 'status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            $order->status = $order->status ?? 'pending'; // تعيين حالة افتراضية
        });
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
