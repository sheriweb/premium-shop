<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_status', 'cart', 'subtotal', 'total_payment', 'shipping_fee', 'payment_method', 'payment_status', 'order_details'];

    public static array $orderStatus = [
        1 => 'processing',
        2 => 'delivered',
        3 => 'shipped',
        4 => 'cancelled'
    ];

    public static array $paymentStatus = [
        1 => 'Paid',
        2 => 'Payment Failed',
        3 => 'Awaiting',
        4 => 'Cash On Delivery',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
