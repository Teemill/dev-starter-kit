<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Car;
use App\CarOrder;
use Carbon\Carbon;
use App\Http\Resources\CarResource;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function place() 
    {  
        $validated_request = request()->validate([
            "*.id" => "required"
        ]);
        
        $order = new Order;
        $order->save();

        foreach ($validated_request as $order_part) 
        {
            $car_order = CarOrder::create([
                "car_id" => $order_part["id"],
                "order_id" => $order->id,
                "order_made_at" => Carbon::now()
            ]);

            $car_order->save();
        }

        return response($order->id, 200);
    }

    public function retrieve() 
    {
        if (!request("order_id")) 
        {
            return;
        }
        
        $order_id = request("order_id");
        $car_orders = CarOrder::where("order_id", $order_id)->get(); 

        $cars = [];

        foreach ($car_orders as $car_order)
        {
            $car = Car::findOrFail($car_order["car_id"]);
            $cars[] = new CarResource($car);
        }

        return $cars;
    }

    public function totalCarOrders() 
    {
        $cars = Car::all();

        $total_count_data = [];

        foreach ($cars as $car) 
        {
            $count_data = [
                "name" => $car->name, 
                "count" => CarOrder::where("car_id", $car->id)->count()
            ];
            
            $total_count_data[] = $count_data;
        }

        return $total_count_data;
    }

    public function ordersOverTime() 
    {
        $grouped_orders = CarOrder::all()->sortBy("order_made_at")->groupBy(function($date) {
            return Carbon::parse($date["order_made_at"])->format("d");
        });

        $grouped_orders = $grouped_orders->take(10);

        $final_data = [];

        foreach ($grouped_orders as $day => $orders) 
        {
            $final_data[] = [
                "name" => $day,
                "count" => count($orders)
            ];
        }

        return $final_data;
    }
}
