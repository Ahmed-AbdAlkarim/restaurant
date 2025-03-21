<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Table extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'capacity', 'status', 'is_active'];

    // يمكنك إضافة علاقات إذا كانت الطاولة مرتبطة بأشياء أخرى مثل الطلبات
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'table_id')->latest();
    }

}
