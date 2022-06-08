<?php

namespace App\Http\Controllers;

use App\Models\CourseOrder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class CourseOrderController extends Controller
{
    public function index()
    {
        $this->checkPermission('order.access');
        if (auth()->user()->hasRole('Buyer')) {
            $all_orders = auth()->user()->orderedCourses;
        } else {
            $all_orders = CourseOrder::query();
        }

        $order_filter = null;
        $date = request('date');
        if (request()->has('order_filter') && request()->get('order_filter') != 'all') {
            $order_filter = request()->get('order_filter');
        }

        $orders = $all_orders->when($order_filter != null, function ($query) use ($order_filter) {
            return $query->where('status', $order_filter);
        })->when($date, function ($query) use ($date) {
            return $query->whereDate('created_at', $date);
        })->latest('id')->paginate($this->itemPerPage);

        return view('dashboard.course-order.index', compact('orders'));
    }

    public function destroy(CourseOrder $courseOrder)
    {
        $this->checkPermission('order.delete');
        $courseOrder->delete();
        return back()->with('success', 'Order Deleted Successfully.');
    }

    public function show(CourseOrder $courseOrder)
    {
        $this->checkPermission('order.view');
        $courseOrder->load('course','transaction');
        return view('dashboard.course-order.view', compact('courseOrder'));
    }

    public function changeCourseOrderStatus(Request $request, CourseOrder $courseOrder): RedirectResponse
    {
        // $this->checkPermission('order.access');
        $request->validate([
            'order_status' => 'required'
        ]);

        $courseOrder->update([
            'status' => $request->input('order_status'),
        ]);
        return back()->with('success', 'Order Status Changed.');
    }
}
