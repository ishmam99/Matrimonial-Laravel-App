<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KaziResource;
use App\Http\Resources\UserKaziResource;
use App\Models\Kazi;
use App\Models\User;
use App\Models\UserKazi;
use Illuminate\Http\Request;

class KaziController extends Controller
{
    public function index()
    {
        $Kazi = Kazi::where('status', Kazi::ACCEPTED)->with('user.reviews')->when(request()->has('search'), function ($query) {
            $query->where('name', 'LIKE', '%' . request()->get('search') . '%');
        })->paginate(10);
        return $this->apiResponseResourceCollection(200, 'Kazis List', KaziResource::collection($Kazi));
    }
    public function show(Kazi $kazi)
    {
        $kazi->load('user.reviews');
        return $this->apiResponse(200, 'Kazis List', KaziResource::make($kazi));
    }
    public function hire($id)
    {
        auth()->user()->profile->userKazi()->create([
            'kazi_id' => $id
        ]);
        return $this->apiResponse(201, 'Kazi Hired');
    }

    public function userKaziContractList()
    {
        $cases = auth()->user()->profile->userKazi->load('kazi');
        return $this->apiResponseResourceCollection(200, 'My cases', UserKaziResource::collection($cases));
    }
    public function kaziContractList()
    {

        if (auth()->user()->user_role == User::KAZI) {
            $cases = auth()->user()->Kazi->userKazi->load('profile');
            return $this->apiResponseResourceCollection(200, 'My cases', UserKaziResource::collection($cases));
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function userKaziContract($id)
    {
        $userKazi = UserKazi::findOrfail($id);
        return $this->apiResponse(200, 'Contract Details', UserKaziResource::make($userKazi));
    }
    public function kaziContract($id)
    {
        if (auth()->user()->user_role == User::KAZI) {
            $userKazi = UserKazi::findOrfail($id);
            return $this->apiResponse(200, 'Case Details', UserKaziResource::make($userKazi));
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function userKaziContractUpdate(Request $request, $id)
    {
        $userKazi = UserKazi::findOrfail($id);
        $input = $request->validate([
            'name'       => 'nullable|string',
            'details'    => 'nullable',
            'attachment' => 'nullable',
        ]);
        if ($request->hasFile('attachment'))
            $input['attachment'] = uploadFile($request->file('attachment'), 'images');
        $userKazi->update($input);
        return $this->apiResponse(201, 'Case Details Updated');
    }
    public function kaziContractUpdate(Request $request, $id)
    {
        if (auth()->user()->user_role == User::KAZI) {
            $userKazi = UserKazi::findOrfail($id);
            $input = $request->validate([
                'fee'       => 'nullable|string',
                'status'    => 'nullable',
            ]);

            $userKazi->update($input);
            return $this->apiResponse(201, 'Case Details Updated');
        } else
            return $this->apiResponse(403, 'Unauthorised');
    }
    public function casePayment(Request $request)
    {
    }
}
