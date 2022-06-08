<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserAgentResource;
use App\Models\Agent;
use App\Models\UserAgent;
use Illuminate\Http\Request;

class UserAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = UserAgent::with('profile','agent')->paginate(10);

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
            'agent_id'  => 'required',
            'name'      => 'required',
            'fee'       => 'nullable|numeric',
            'details'   => 'nullable',   
        ]);
        if($request->hasFile('attachment'))
        $input['attachment'] = uploadFile($request->file('attachment'),'contracts');

        auth()->user()->profile->userAgent()->create($input);
        return $this->apiResponse(201,'User Agent Contract Send to Agent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
    public function show(UserAgent $userAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAgent $userAgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAgent $userAgent)
    {
        $input = $request->validate([
            'profile_id'=> 'required',    
            'agent_id'  => 'required',
            'name'      => 'required',
            'fee'       => 'nullable|numeric',
            'details'   => 'nullable',   
        ]);
        if($request->hasFile('attachment'))
        $input['attachment'] = updateFile($request->file('attachment'),'contracts',$userAgent->attachment);
        $userAgent->update($input);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAgent  $userAgent
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAgent $userAgent)
    {
        deleteFile($userAgent->attachment);
        $userAgent->delete();
        return back()->with('success','Contract Deleted');
    }
    public function agentContracts(Agent $agent)
    {
       $contracts = $agent->userContracts->load('profile');
        return view('dashboard.agent.show',compact('contracts'));
    }

    public function userContract()
    {
        $contracts = auth()->user()->profile->userAgent->load('agent');
        return $this->apiResponseResourceCollection(200,'Agent Contract List',UserAgentResource::collection($contracts));
    }
}
