<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgentResource;
use App\Http\Resources\UserAgentResource;
use App\Http\Resources\UserCaseResource;
use App\Models\Agent;
use App\Models\User;
use App\Models\UserAgent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agent = Agent::where('status', Agent::ACCEPTED)->with('user.reviews')->when(request()->has('search'), function ($query) {
            $query->where('name', 'LIKE', '%' . request()->get('search') . '%');
        })->paginate(10);
        return $this->apiResponseResourceCollection(200, 'Kazis List', AgentResource::collection($agent));
    }
    public function show(Agent $agent)
    {
        $agent->load('user.reviews');
        return $this->apiResponse(200, 'Agent', AgentResource::make($agent));
    }
    public function hire($id)
    {
        auth()->user()->profile->userAgent()->create([
            'agent_id' => $id
        ]);
        return $this->apiResponse(201, 'Agent Hired');
    }

    public function userAgentContractList()
    {
        $cases = auth()->user()->profile->userAgent->load('agent');
        return $this->apiResponseResourceCollection(200, 'My Contracts', UserAgentResource::collection($cases));
    }
    public function agentContractList()
    {

        if (auth()->user()->user_role == User::AGENT) {
            $cases = auth()->user()->agent->userAgent->load('profile');
            return $this->apiResponseResourceCollection(200, 'My cases', UserAgentResource::collection($cases));
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function userAgentContract($id)
    {
        $userAgent = UserAgent::findOrfail($id);
        return $this->apiResponse(200, 'Contract Details', UserAgentResource::make($userAgent));
    }
    public function agentContract($id)
    {
        if (auth()->user()->user_role == User::AGENT) {
            $userAgent = UserAgent::findOrfail($id);
            return $this->apiResponse(200, 'Case Details', UserAgentResource::make($userAgent));
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function userAgentContractUpdate(Request $request, $id)
    {
        $userAgent = UserAgent::findOrfail($id);
        $input = $request->validate([
            'name'       => 'nullable|string',
            'details'    => 'nullable',
            'attachment' => 'nullable',
        ]);
        if ($request->hasFile('attachment'))
            $input['attachment'] = uploadFile($request->file('attachment'), 'images');
        $userAgent->update($input);
        return $this->apiResponse(201, 'Contract Details Updated');
    }
    public function agentContractUpdate(Request $request, $id)
    {
        if (auth()->user()->user_role == User::AGENT) {
            $userAgent = UserAgent::findOrfail($id);
            $input = $request->validate([
                'fee'       => 'nullable|string',
                'status'    => 'nullable',
            ]);

            $userAgent->update($input);
            return $this->apiResponse(201, 'Contract Details Updated');
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function casePayment(Request $request)
    {
    }
}
