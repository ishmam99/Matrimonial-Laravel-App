<?php

namespace App\Http\Controllers;

use App\Models\ProfileStatusBoostPackage;
use App\Models\UserProfileStatusBoostPackage;
use Illuminate\Http\Request;

class ProfileStatusBoostPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileStatusBoostPackages = ProfileStatusBoostPackage::paginate(10);
       return view('dashboard.profile_status_package.index',compact('profileStatusBoostPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.profile_status_package.create');
    }

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
            'discount' => 'nullable|numeric',
            'type'      => 'required|integer',
            'details'   => 'required|string',
            'status'    => 'required',
            'duration'  => 'required|integer'
        ]);
        ProfileStatusBoostPackage::create($input);

        return redirect()->route('profileStatusBoostPackages.index')->with('success','Package Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileStatusBoostPackage  $profileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileStatusBoostPackage $profileStatusBoostPackage)
    {
        
        return view('dashboard.profile_status_package.view',compact('profileStatusBoostPackage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileStatusBoostPackage  $profileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileStatusBoostPackage $profileStatusBoostPackage)
    {
        return view('dashboard.profile_status_package.edit', compact('profileStatusBoostPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileStatusBoostPackage  $profileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileStatusBoostPackage $profileStatusBoostPackage)
    {
        $input = $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'type'      => 'required|integer',
            'details'   => 'required|string',
            'status'    => 'required',
            'duration'  => 'required|integer'
        ]);
        $profileStatusBoostPackage->update($input);
        return back()->with('success','Package Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileStatusBoostPackage  $profileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileStatusBoostPackage $profileStatusBoostPackage)
    {
        $profileStatusBoostPackage->delete();
        return back()->with('success', 'Package Deleted');
    }

    public function orders()
    {
        $orders = UserProfileStatusBoostPackage::paginate(10);
       
        return view('dashboard.profile_status_package.package-order.index',compact('orders'));
    }
    public function orderStatus(Request $request,$id)
    {
        $order = UserProfileStatusBoostPackage::findOrfail($id);
        $order->update(['status'=>$request->type]);
        return back()->with('success','Status Updated');
    }
}
