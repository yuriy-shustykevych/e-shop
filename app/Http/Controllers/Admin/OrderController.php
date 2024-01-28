<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        //$todayDate = Carbon::now();

        //$orders = Order::where('created_at', $todayDate)->paginate(10);
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public  function show($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if($order){
            return view('admin.orders.view', compact('order'));
        }
        else{
            return redirect('admin/orders')->with('message', 'Order Id not Found');
        }

    }

    public function updateOrderStatus($orderId, Request $request)
    {

        $order = Order::where('id', $orderId)->first();
        if($order){
            $order->update([
               'status' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Order Status Updated');
        }
        else{
            return redirect('admin/orders/'.$orderId)->with('message', 'Order Id not Found');
        }
    }
}
