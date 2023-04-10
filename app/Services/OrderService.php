<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class OrderService
{

    private $order, $product;

    public function __construct(Order $order, Product $product)
    {

        $this->order = $order;
        $this->product = $product;

    }

    public static function getOrderId($order_id): string
    {

        return sprintf("%04d", $order_id);

    }

    public function orderPlace($userId, $orderDetail, $cart, $request)
    {
        $tempCart = $cart;
        $sub_total = $tempCart->sub_total;
        $cartData = $tempCart->cart_items;
        
        foreach (json_decode($cartData) as $item) {
            
            $product = $this->product->where('id',$item->item_id)->first();
         
            if ($product->quantity > 0 && $product->quantity >= $item->item_quantity) {
                $product->update([
                    'quantity' => $product->quantity - $item->item_quantity
                ]);
            }
        }
       
        return $this->order->create([
            'user_id' => $userId,
            'cart' => json_encode($cart),
            'subtotal' => $sub_total,
            'total_payment' => $sub_total,
            'shipping_fee' => 0,
            'payment_method' => $request->payment_type,
            'order_status' => 1,
            'payment_status' => Order::$paymentStatus[3],
            'order_details' => $orderDetail
        ]);
      

    }

}
