<?php

namespace App\Http\Controllers;

use App\Models\ProductReturn;
use Illuminate\Http\Request;

class ProductReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ProductReturn::paginate(10);
        return view('dashboard.product.returned',compact('list'));
    }

  

  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductReturn  $productReturn
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReturn $productReturn)
    {
        return view('dashboard.product.return_view',compact('productReturn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductReturn  $productReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReturn $productReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductReturn  $productReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReturn $productReturn)
    {
       $input = $request->validate([
           'status' => 'required',
       ]);
       if($request->status == 1)
       {
           $quantity = $productReturn->order->quantity + $productReturn->order->product->stock;
           $productReturn->order->product()->update(['stock'=>$quantity]);
       }
       $productReturn->update($input);
       return back()->with('success','Status Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductReturn  $productReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReturn $productReturn)
    {
        //
    }
}
