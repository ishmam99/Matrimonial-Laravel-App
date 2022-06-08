<?php

namespace App\Http\Controllers;

use App\Models\PackageService;
use App\Models\ProfessionalPackage;
use App\Models\UserProfessionalPackage;
use Illuminate\Http\Request;

class ProfessionalPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professionalPackages = ProfessionalPackage::paginate(10);

        return view('dashboard.professional_package.index',compact('professionalPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.professional_package.create');
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
            'name'  =>'required',
            'price' => 'required',
            'discount' => 'required'
        ]);
        ProfessionalPackage::create($input);
        return redirect()->route('professional-package.index')->with('success','New Package Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfessionalPackage  $professionalPackage
     * @return \Illuminate\Http\Response
     */
    public function show(ProfessionalPackage $professionalPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfessionalPackage  $professionalPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfessionalPackage $professionalPackage)
    {
        return view('dashboard.professional_package.edit',compact('professionalPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfessionalPackage  $professionalPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfessionalPackage $professionalPackage)
    {
        $input = $request->validate([
            'name'  => 'required',
            'price' => 'required',
            'discount' => 'required'
        ]);
        $professionalPackage->update($input);
        return redirect()->route('professional-package.index')->with('success', 'Package Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfessionalPackage  $professionalPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfessionalPackage $professionalPackage)
    {
        $professionalPackage->delete();
        return redirect()->route('professional-package.index')->with('success', 'Package Deleted ');
    }
    public function service(Request $request, ProfessionalPackage $professionalPackage)
    {
        $professionalPackage->services()->create(['name'=>$request->name,'services'=>$request->services]);
        return back()->with('success','New Service Added');
    }
    public function serviceUpdate(Request $request, PackageService $packageService)
    {
        $packageService->update(['name'=>$request->name,'services'=>$request->services]);
        return back()->with('success','Service Updated');
    }
    public function requests()
    {
        $orders = UserProfessionalPackage::paginate(10);
        return view('dashboard.professional_package.package-order.index', compact('orders'));
    }
    public function requestView($id)
    {
        $order = UserProfessionalPackage::findOrfail($id);
        return view('dashboard.professional_package.package-order.view',compact('order'));
    }
    public function requestStatus(Request $request, $id)
    {
        $order = UserProfessionalPackage::findOrfail($id);
        $order->update(['status'=> $request->status]);
        return back()->with('success','Order Request Status Changed');
    }
}
