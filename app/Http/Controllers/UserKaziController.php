<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserKaziResource;
use App\Models\Kazi;
use App\Models\UserKazi;
use Illuminate\Http\Request;

class UserKaziController extends Controller
{
    public function index()
    {
        $contracts = UserKazi::with('profile', 'kazi')->paginate(10);
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
        $input = $request->validate([
            'kazi_id'  => 'required',
            'name'      => 'required',
            'fee'       => 'nullable|numeric',
            'details'   => 'nullable',
        ]);
        if ($request->hasFile('attachment'))
            $input['attachment'] = uploadFile($request->file('attachment'), 'contracts');

        auth()->user()->profile->userKazi()->create($input);
        return $this->apiResponse(201, 'User Agent Contract Send to Agent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserKazi $userKazi)
    {
        $input = $request->validate([
            'profile_id' => 'required',
            'kazi_id'  => 'required',
            'name'      => 'required',
            'fee'       => 'nullable|numeric',
            'details'   => 'nullable',
        ]);
        if ($request->hasFile('attachment'))
            $input['attachment'] = updateFile($request->file('attachment'), 'contracts', $userKazi->attachment);
        $userKazi->update($input);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserKazi $userKazi)
    {
        deleteFile($userKazi->attachment);
        $userKazi->delete();
        return back()->with('success', 'Contract Deleted');
    }
    public function agentContracts(Kazi $kazi)
    {
        $contracts = $kazi->userContracts->load('profile');
        return view('dashboard.kazi.show', compact('contracts'));
    }

    public function userContract()
    {
        $contracts = auth()->user()->profile->userKazi->load('kazi');
        return $this->apiResponseResourceCollection(200, 'Kazi Contract List', UserKaziResource::collection($contracts));
    }
}
