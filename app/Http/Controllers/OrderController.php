<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\CarOrder;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function place() 
    {  
        Log::info(request());

        $validated_request = request()->validate([
            "*.id" => "required"
        ]);
        
        $order = new Order;
        $order->save();

        foreach ($validated_request as $order_part) 
        {
            $car_order = CarOrder::create([
                "car_id" => $order_part["id"],
                "order_id" => $order->id
            ]);

            $car_order->save();
        }
    }
}
