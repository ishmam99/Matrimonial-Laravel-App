<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Course;
use App\Models\CourseOrder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Validation\Rule;

class OrderController extends Controller
{
    public function index()
    {
       
        $orders=Order::with('product')->paginate(10);
        return view('dashboard.buyer.order.index', compact('orders'));
    }

    public function ongoing()
    {

        $orders = Order::with('product')->where('status',Order::PROCESSING)->paginate(10);
        return view('dashboard.buyer.order.ongoing', compact('orders'));
    }
    public function history()
    {

        $orders = Order::with('product')->where([['status', Order::DELIVERED],['status', Order::CANCELLED]])->paginate(10);
        return view('dashboard.buyer.order.history', compact('orders'));
    }
    public function delivered()
    {

        $orders = Order::with('product')->where('status', Order::DELIVERED)->paginate(10);
        return view('dashboard.buyer.order.delivered', compact('orders'));
    }
    public function destroy(Order $order)
    {
     
        $order->delete();
        return back()->with('success', 'Order Deleted Successfully.');
    }

    public function show(Order $order)
    {
       
        $order->load('product','transaction');
        return view('dashboard.buyer.order.view', compact('order'));
    }

    public function orderStatus(Request $request, Order $order)
    {
     
        $request->validate([
            'order_status' => ['required']
        ]);
        if($request->order_status == Order::DELIVERED)
        {
            $quantity =$order->product->stock - $order->quantity;
            if($quantity<=$order->product->stock)
            $order->product->update(['stock'=>$quantity]);
            else
            return back()->with('error', 'Insufficient Stock.');
        }
        $order->update([
            'status' => $request->input('order_status'),
        ]);
        return back()->with('success', 'Order Status Changed.');
    }
    public function orderPayment(Request $request, Order $order)
    {
        $request->validate([
            'paid_status' => ['required']
        ]);

        $order->update([
            'paid_status' => $request->input('paid_status'),
        ]);
        return back()->with('success', 'Order Status Changed.');
    }
}
