<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public static function createOrder(array $data): void
    {
        $order = new Order();

        $order->fill($data);
        $order->price = round($order->good->price * $order->good_quantity, 2);
        $order->save();
    }
}
