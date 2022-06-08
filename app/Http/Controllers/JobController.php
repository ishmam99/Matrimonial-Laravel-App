<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return $this->apiResponseResourceCollection(200,'Jobs',JobResource::collection($jobs));
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
            'company_name' => ['required', 'string'],
            'year_started' => ['required', 'string'],
            'year_ended' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        Job::create([
            'company_name'=> $request->company_name,
            'year_started'=> $request->year_started,
            'year_ended' => $request->year_ended,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->back()->with('success', 'Post Submitted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $this->checkPermission('job.edit');

        $validated = $request->validate([
            'company_name' => ['required', 'string'],
            'year_started' => ['required', 'string'],
            'year_ended' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $job->update([
            'company_name'=> $request->company_name,
            'year_started'=> $request->year_started,
            'year_ended' => $request->year_ended,
            'description' => $request->description,
        ]);


        return redirect()->back()->with('success', 'Job Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
