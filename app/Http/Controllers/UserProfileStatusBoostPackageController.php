<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileStatusPackageResource;
use App\Http\Resources\UserProfileStatusPackageResource;
use App\Models\ProfileStatusBoostPackage;
use App\Models\UserProfileStatusBoostPackage;
use Illuminate\Http\Request;

class UserProfileStatusBoostPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $packages = ProfileStatusBoostPackage::where('status',0)->with('package')->paginate(10);
       return $this->apiResponseResourceCollection(200,'Package List',ProfileStatusPackageResource::collection($packages));
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
            'package_id'    => 'required|exists:profile_status_boost_packages,id'
        ]);
        auth()->user()->profile->userProfileStatusPackage()->create(['package_id' => $request->package_id]);

        return $this->apiResponse(201, 'Subscription Request Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfileStatusBoostPackage  $userProfileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfileStatusBoostPackage $userProfileStatusBoostPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfileStatusBoostPackage  $userProfileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfileStatusBoostPackage $userProfileStatusBoostPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfileStatusBoostPackage  $userProfileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfileStatusBoostPackage $userProfileStatusBoostPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfileStatusBoostPackage  $userProfileStatusBoostPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfileStatusBoostPackage $userProfileStatusBoostPackage)
    {
        //
    }

    public function pending()
    {
        $packages = auth()->user()->profile->userProfileStatusPackage->where('status',0)->load('package');
        return $this->apiResponseResourceCollection(200,'Packages',UserProfileStatusPackageResource::collection($packages));
    }
}
