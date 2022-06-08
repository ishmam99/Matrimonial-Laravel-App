<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserProfessionalPackageResource;
use App\Models\UserProfessionalPackage;
use Illuminate\Http\Request;

class UserProfessionalPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $orders = UserProfessionalPackage::where('profile_id',auth()->user()->profile->id)->with('professionalPackage')->paginate(10);
       return $this->apiResponseResourceCollection(200,'Order List',UserProfessionalPackageResource::collection($orders));
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
        $request->validate([
            'professional_package_id'    => 'required|exists:professional_packages,id'
        ]);
       if(auth()->user()->profile->userProfessionalPackage()->create(['professional_package_id'=>$request->professional_package_id]))

        return $this->apiResponse(201,'Subscription Request Sent');
        else
            return $this->apiResponse(404, 'Subscription Request Failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfessionalPackage  $userProfessionalPackage
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfessionalPackage $userProfessionalPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfessionalPackage  $userProfessionalPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfessionalPackage $userProfessionalPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfessionalPackage  $userProfessionalPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfessionalPackage $userProfessionalPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfessionalPackage  $userProfessionalPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfessionalPackage $userProfessionalPackage)
    {
        //
    }
}
