<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sendOrderPlacedEmail(Order $order)
    {
        Mail::to($order->user->email)->send(new OrderPlacedForUser($order));
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function user()
    {
        return $this->belongsTo(NormalUser::class, 'user_id');
    }

   
}
