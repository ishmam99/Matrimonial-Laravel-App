<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Education::all());
        $educations=Education::where('profile_id',auth()->user()->profile->id)->get();
       // dd($educations);
        return $this->apiResponseResourceCollection(201,'Education Details List',EducationResource::collection($educations));
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
            'institute_name' => ['required', 'string'],
            'degree'        =>['required','string'],
            'year_started' => ['required', 'string'],
            'year_ended' => ['required', 'string'],
            'description' => ['required', 'string'],
            'education_certificate' => ['nullable', 'mimes:jpeg,jpg,png,webp,pdf', 'max:1024'],
        ]);
        if($request->education_certificate){
             $validated['education_certificate'] = uploadFile($request->file('education_certificate'), 'education_certificate');
        }
       
        $validated['profile_id']    = auth()->user()->profile->id;
       // dd($validated);
        Education::create($validated);


        return $this->apiResponse(201, 'Education Submitted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institute_name' => ['required', 'string'],
            'year_started' => ['required', 'string'],
            'year_ended' => ['required', 'string'],
            'description' => ['required', 'string'],
            'education_certificate' => ['nullable', 'mimes:jpeg,jpg,png,webp,pdf', 'max:1024'],
        ]);

        if ($request->hasFile('education_certificate')) {
            if (File::exists('storage/' . $education->education_certificate)) {
                File::delete('storage/' . $education->education_certificate);
            }
            $fileName = Rand() . '.' . $request->file('education_certificate')->getClientOriginalExtension();
            $validated = $request->file('education_certificate')->storeAs('education_certificate', $fileName, 'public');
        }

        $education->update([
            'institute_name'=> $request->institute_name,
            'year_started'=> $request->year_started,
            'year_ended' => $request->year_ended,
            'description' => $request->description,
            'education_certificate' => $request->education_certificate,
        ]);


        return $this->apiResponse(201, 'Education Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
    }
}
