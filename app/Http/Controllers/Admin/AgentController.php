<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::where('status', Agent::ACCEPTED)->with('user', 'category')->paginate(20);
        return view('dashboard.agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return view('dashboard.agent.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        // $user=User::findOrfail($id);
        return view('dashboard.agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $validated = $request->validate([
            'name'  => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'fee'   => 'nullable|string',
            'profile_photo' => 'nullable'
        ]);

        if ($request->profile_photo)
            $validated['profile_photo'] = uploadFile($request->file('profile_photo'), 'images');

        $agent->update($validated);
        return back()->with('success', 'Agent Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $Agent)
    {
        //
    }
    public function requestList()
    {
        $users = Agent::where('status', Agent::PENDING)->with('user','category')->paginate(20);
        return view('dashboard.Agent.list', compact('users'));
    }
    public function accept(Agent $Agent)
    {
        $Agent->update(['status' => Agent::ACCEPTED]);
        return back()->with('success', 'Agent Accepted');
    }
    public function case(Agent $Agent)
    {
        $cases = $Agent->contracts->load('profile.user');
        return view('dashboard.agent.contract', compact('cases'));
    }
    public function addBadge(Request $request, Agent $agent)
    {
        if ($agent->badge)
            $agent->badge()->update(['badge_id' => $request->badge_id]);
        else
            $agent->badge()->create(['badge_id' => $request->badge_id]);
       return back()->with('success','Badge Added To Agent Profile Successfully');
    }
}
