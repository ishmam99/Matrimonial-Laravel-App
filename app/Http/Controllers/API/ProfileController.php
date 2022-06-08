<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\SkinToneResource;
use App\Models\City;
use App\Models\Country;
use App\Models\Package;
use App\Models\Priority;
use App\Models\Profile;
use App\Models\SkinTone;
use Illuminate\Support\Facades\File;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->profile)

            return $this->apiResponse(200, 'User Profile', ProfileResource::make(auth()->user()->profile));
        else return $this->apiResponse(404, 'Please Complete User Profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $profile  = auth()->user()->profile;
        $input = $request->validated();
        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo != null)
                $input['profile_photo'] = updateFile($request->file('profile_photo'), '/profile/', $profile->profile_photo);
            else
                $input['profile_photo'] = uploadFile($request->file('profile_photo'), '/profile');
        }

        if ($request->hasFile('cover_photo')) {
            if ($profile->cover_photo != null)
                $input['cover_photo'] = updateFile($request->file('cover_photo'), '/profile/', $profile->cover_photo);
            else
                $input['cover_photo'] = uploadFile($request->file('cover_photo'), '/profile');
        }


        // $input['user_id']   = auth()->id();
        $input['birthdate'] = Carbon::parse($request->birthdate)->format('Y-m-d');
        $input['name']  = auth()->user()->name;
        $input['email']  = auth()->user()->email;
        // $input['phone'] = auth()->user()->phone;
        // $input['nid'] = auth()->user()->nid;
        // $find = Profile::where('user_id', auth()->id())->first();
        // if ($find) return $this->apiResponse(200, 'Profile Already Exist');

        // Profile::create($input);
        auth()->user()->profile ? auth()->user()->profile()->update($input) : auth()->user()->profile()->create($input);
        return $this->apiResponse(201, 'Profile Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return $this->apiResponse(200, 'Profile', ProfileResource::make($profile));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $input = $request->all();
        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo != null)
                $input['profile_photo'] = updateFile($request->file('profile_photo'), '/profile/', $profile->profile_photo);
            else
                $input['profile_photo'] = uploadFile($request->file('profile_photo'), '/profile');
        }

        if ($request->hasFile('cover_photo')) {
            if ($profile->cover_photo != null)
                $input['cover_photo'] = updateFile($request->file('cover_photo'), '/profile/', $profile->cover_photo);
            else
                $input['cover_photo'] = uploadFile($request->file('cover_photo'), '/profile');
        }
        $profilee = auth()->user()->profile;
        $profilee->update($input);
        return $this->apiResponse(201, 'Profile Updated Successfully', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
    public function notification()
    {
        return response(auth()->user()->notifications);
    }
    public function topGroom()
    {
        $profiles = Priority::with('profile')->get()->pluck('profile')->where('gender', Profile::MALE);

        return $this->apiResponseResourceCollection(200, 'Top Groom', ProfileResource::collection($profiles));
    }
    public function topBride()
    {
        $profiles = Priority::with('profile')->get()->pluck('profile')->where('gender', Profile::FEMALE);

        return $this->apiResponseResourceCollection(200, 'Top Bride', ProfileResource::collection($profiles));
    }
    public function suggested()
    {
        $profile = auth()->user()->profile;
        $profiles = Profile::where([['gender', $profile->gender], ['religion', $profile->religion]])->whereOr([
                ['hobby_id', $profile->hobby_id],
                ['skin_tone_id', $profile->skin_tone_id]
            ])
            ->where('id', '!=', $profile->id)
            ->get();

        return $this->apiResponseResourceCollection(200, 'Suggested', ProfileResource::collection($profiles));
    }
    public function package(Request $request)
    {
        $request->validate([
            'package_id'        => 'required|exists:packages,id',
            'trx_id'            => 'required|string',
            'prove_document'    => 'required'
        ]);
        $package = Package::findOrfail($request->package_id);
        $prove_document = uploadFile($request->file('prove_document'), 'transaction');
        // dd($package->fee);
        $transaction = Transaction::create([
            'trx_id'        => $request->trx_id,
            'prove_document' => $prove_document,
            'amount'        => $package->fee
        ]);
        auth()->user()->profile->userPackage()->create(['package_id' => $package->id, 'transaction_id' => $transaction->id]);

        return $this->apiResponse(201, 'Package Request Sent To Admin');
    }
    public function country()
    {
        $countries = Country::with('city')->get();
        return $this->apiResponseResourceCollection(200, 'Country', CountryResource::collection($countries));
    }
    public function city()
    {
        $cities = City::with('country')->get();
        return $this->apiResponseResourceCollection(200, 'City', CityResource::collection($cities));
    }
    public function skin()
    {
        $skins = SkinTone::all();
        return $this->apiResponseResourceCollection(200, 'Skin Tones', SkinToneResource::collection($skins));
    }
}
