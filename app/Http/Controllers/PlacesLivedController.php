<?php

namespace App\Http\Controllers;

use App\Models\PlacesLived;
use Illuminate\Http\Request;

class PlacesLivedController extends Controller
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
            'places_lived' => ['required', 'string'],
        ]);

        PlacesLived::create([
            'places_lived'=> $request->places_lived,
            'user_id' => auth()->user()->id

        ]);


        return redirect()->back()->with('success', 'Places Lived Submitted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlacesLived  $placesLived
     * @return \Illuminate\Http\Response
     */
    public function show(PlacesLived $placesLived)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlacesLived  $placesLived
     * @return \Illuminate\Http\Response
     */
    public function edit(PlacesLived $placesLived)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlacesLived  $placesLived
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlacesLived $placesLived)
    {
        $this->checkPermission('placesLived.edit');

        $validated = $request->validate([
            'places_lived' => ['required', 'string'],
        ]);

        $placesLived->update([
            'places_lived'=> $request->places_lived,

        ]);
        
        return redirect()->back()->with('success', 'Places Lived Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlacesLived  $placesLived
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlacesLived $placesLived)
    {
        //
    }
}
