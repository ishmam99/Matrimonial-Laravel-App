<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=Package::with('profile')->orderBy('fee','ASC')->paginate(20);
        return view('dashboard.package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Package::where('name',$request->name)->where('type',$request->type)->first();
      $request->validate([
          'name'    =>'required|string',
          'fee'     =>'required',
          'type'    =>'required'
      ]);
      if($check==null)
      Package::create($request->all());
      else
      $check->update($request->all());
      return back()->with('success','New Package Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('dashboard.package.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            // 'name'    => 'required|string',
            'fee'     =>'required|numeric',  
            // 'type'    => 'required'
        ]);
        $package->update($request->all());
        return back()->with('success', ' Package Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return back()->with('success','Package Deleted Successfully');
    }

    public function userPackage()
    {
        $lists=UserPackage::where('status',UserPackage::PENDING)->with('package','profile')->paginate(10);
        return view('dashboard.package.package-order.index',compact('lists'));
    }
    public function packageOrder(UserPackage $userPackage)
    {
        return view('dashboard.package.package-order.view',compact('userPackage'));
    }
    
    public function packageOrderStatus(UserPackage $userPackage)
    {
        $userPackage->update(['status'=>UserPackage::APPROVED]);
        $userPackage->profile->update(['package_id'=>$userPackage->package_id]);
        return back()->with('success','Package Request Approved');
    }
    public function packageOrderCancel(UserPackage $userPackage)
    {
        $userPackage->update(['status' => UserPackage::CANCELLED]);
     
        return back()->with('success', 'Package Request Cancelled');
    }
}
      