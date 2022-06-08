<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopPackage;
use App\Models\ShopPackageOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = ShopPackage::with('packageProduct','shopPackageOrder')->paginate(10);
        return view('dashboard.shop_package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
            
        ]);
        if($request->expired_at)
        {
            $input['expired_at'] = Carbon::parse($request->expired_at)->format('Y-m-d');
        }
        if($request->file('image'))
        {
            $input['banner'] =uploadFile($request->file('image'), 'package');
        }
        foreach ($request->products as $product) {
            $prod = Product::findOrfail($product);
            if ($prod->stock < 1)
                return back()->with('error', $prod->title . ' stock insufficinet');
        }
       $package = ShopPackage::create($input);
        foreach($request->products as $product)
        {
            return back()->with('error',$product->title.' stock insufficinet');
            $package->packageProduct()->create(['product_id'=>$product]);
        }
        return redirect()->route('shopPackage.index')->with('success','Package Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopPackage  $shopPackage
     * @return \Illuminate\Http\Response
     */
    public function show(ShopPackage $shopPackage)
    {
        return view('dashboard.shop_package.show',compact('shopPackage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopPackage  $shopPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopPackage $shopPackage)
    {
        return view('dashboard.shop_package.edit', compact('shopPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopPackage  $shopPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopPackage $shopPackage)
    {
        $input = $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',

        ]);
        if ($request->expired_at) {
            $input['expired_at'] = Carbon::parse($request->expired_at)->format('Y-m-d');
        }
        if ($request->file('image')) {
            if($shopPackage->banner)
            $input['banner'] = updateFile($request->file('image'), 'package',$shopPackage->banner);
            else
            $input['banner'] = uploadFile($request->file('image'), 'package');
        }
        $shopPackage->update($input);
        $shopPackage->packageProduct()->delete();
        foreach ($request->products as $product) {
            $shopPackage->packageProduct()->create(['product_id' => $product], 'package');
        }
        return redirect()->route('shopPackage.index')->with('success', 'Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopPackage  $shopPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopPackage $shopPackage)
    {
        $shopPackage->delete();
        return back()->with('success','Package Deleted Successfully');
    }

    public function orders()
    {
        $orders = ShopPackageOrder::with('shopPackage','profile')->paginate(10);
        return view('dashboard.shop_package.package-order.index',compact('orders'));
    }
    public function orderView($id)
    {
        $order = ShopPackageOrder::with('shopPackage.packageProduct.product')->findOrfail($id);
        return view('dashboard.shop_package.package-order.view',compact('order'));
    }
    public function orderStatus(Request $request,$id)
    {
        $order = ShopPackageOrder::findOrfail($id);
        $value=$order->quantity;
        if($request->status == 2)
        {foreach($order->shopPackage->packageProduct->load('product') as $product){
            if($value> $product->product->stock)
            return back()->with('error','Insufficient Stock');
           $product->product->decrement('stock',$value);
        }
           
        }
        $order->update(['status'=>$request->status]);
        return back()->with('success','Order Status Updated');
    }
}
