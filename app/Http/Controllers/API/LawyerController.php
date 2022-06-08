<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LawyerResource;
use App\Http\Resources\UserCaseResource;
use App\Models\Lawyer;
use App\Models\User;
use App\Models\UserCase;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function index()
    {
        $lawyer=Lawyer::where('status',Lawyer::ACCEPTED)->with('user.reviews')->when(request()->has('search'), function ($query) {
            $query->where('name', 'LIKE', '%'.request()->get('search').'%');
        })->paginate(10);
        return $this->apiResponseResourceCollection(200,'Lawyers List',LawyerResource::collection($lawyer));
    }
    public function show(Lawyer $lawyer)
    {
        $lawyer->load('user.reviews');
        return $this->apiResponse(200, 'Lawyer List', LawyerResource::make($lawyer));
    }
    public function hire($id)
    {
        auth()->user()->profile->userCase()->create([
            'lawyer_id'=>$id
        ]);
        return $this->apiResponse(201,'Lawyer Hired');
    }
    public function myCase()
    {
        $cases=auth()->user()->profile->userCase->load('lawyer');
        return $this->apiResponseResourceCollection(200,'My cases',UserCaseResource::collection($cases));
    }
    public function lawyerCaseList()
    {
       
        if (auth()->user()->user_role == User::LAWYER) {
        $cases = auth()->user()->lawyer->userCase->load('profile');
        return $this->apiResponseResourceCollection(200, 'My cases', UserCaseResource::collection($cases));
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function userCase($id)
    {
        $userCase = UserCase::findOrfail($id);
        return $this->apiResponse(200, 'Case Details', UserCaseResource::make($userCase));
    }
    public function lawyerCase($id)
    {
        if (auth()->user()->user_role == User::LAWYER) {
        $userCase = UserCase::findOrfail($id);
        return $this->apiResponse(200, 'Case Details', UserCaseResource::make($userCase));
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function userUpdate(Request $request,$id)
    {
        $userCase=UserCase::findOrfail($id);
        $input=$request->validate([
            'name'       =>'nullable|string',
            'details'    =>'nullable',
            'attachment' =>'nullable',
        ]);
        if($request->hasFile('attachment'))
        $input['attachment']= uploadFile($request->file('attachment'), 'images');
        $userCase->update($input);
        return $this->apiResponse(201,'Case Details Updated');
    }
    public function lawyerUpdate(Request $request,$id)
    {
        if(auth()->user()->user_role==User::LAWYER)
        {
        $userCase = UserCase::findOrfail($id);
        $input = $request->validate([
            'fee'       => 'nullable|string',
            'status'    => 'nullable',
        ]);
       
        $userCase->update($input);
        return $this->apiResponse(201, 'Case Details Updated');
        }
        else
            return $this->apiResponse(403, 'Unauthorised');

    }     
    public function casePayment(Request $request)
    {
        
    }
}
