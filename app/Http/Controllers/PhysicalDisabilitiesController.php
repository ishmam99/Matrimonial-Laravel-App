<?php

namespace App\Http\Controllers;

use App\Models\PhysicalDisabilities;
use Illuminate\Http\Request;

class PhysicalDisabilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'physical_disabilities' => ['required', 'string'],
        ]);

        PhysicalDisabilities::create([
            'physical_disabilities'=> $request->physical_disabilities,
            'user_id' => auth()->user()->id

        ]);


        return redirect()->back()->with('success', 'Physical Disabilities Updated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhysicalDisabilities  $physicalDisabilities
     * @return \Illuminate\Http\Response
     */
    public function show(PhysicalDisabilities $physicalDisabilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhysicalDisabilities  $physicalDisabilities
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysicalDisabilities $physicalDisabilities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhysicalDisabilities  $physicalDisabilities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhysicalDisabilities $physicalDisabilities)
    {
        $this->checkPermission('physicalDisabilities.edit');

        $validated = $request->validate([
            'physical_disabilities' => ['required', 'string'],
        ]);

        $physicalDisabilities->update([
            'physical_disabilities'=> $request->physical_disabilities,

        ]);


        return redirect()->back()->with('success', 'Physical Disabilities Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhysicalDisabilities  $physicalDisabilities
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysicalDisabilities $physicalDisabilities)
    {
        //
    }
}
