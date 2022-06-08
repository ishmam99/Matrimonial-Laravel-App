<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuccessStoriesResource;
use App\Models\SuccessStories;
use Illuminate\Http\Request;

class SuccessStoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $successStories = SuccessStories::paginate(10);
        return view('dashboard.successStories.index',compact('successStories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.successStories.create');
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
            'bride_name'    =>  'required',
            'groom_name'    =>  'required',
            'bride_story'   =>  'required',
            'groom_story'   =>  'required',
            'bride_image'   =>  'required',
            'groom-image'   =>  'required' 
        ]);
        if($request->hasFile('bride_image'))
        {
            $input['bride_image']   = uploadFile($request->file('bride_image'),'/images');
        }
        if ($request->hasFile('groom_image')) {
            $input['groom_image']   = uploadFile($request->file('groom_image'), '/images');
        }
        SuccessStories::create($input);
        return back()->with('success','Success Stories Uploaded');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuccessStories  $successStories
     * @return \Illuminate\Http\Response
     */
    public function show(SuccessStories $successStories)
    {
        return view('dashboard.successStories.view',compact('successStories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuccessStories  $successStories
     * @return \Illuminate\Http\Response
     */
    public function edit(SuccessStories $successStories)
    {
        return view('dashboard.successStories.edit',compact('successStories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuccessStories  $successStories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuccessStories $successStories)
    {
       $input = $request->validate([
            'bride_name'    =>  'required',
            'groom_name'    =>  'required',
            'bride_story'   =>  'required',
            'groom_story'   =>  'required',
            'bride_image'   =>  'nullable',
            'groom-image'   =>  'nullable' 
       ]);
       if($request->hasFile('bride_image'))
       {
           $input['bride_image'] = updateFile($request->file('bride_image'),'/images',$successStories->bride_image);
       }
        if ($request->hasFile('groom_image')) {
            $input['groom_image'] = updateFile($request->file('groom_image'), '/images', $successStories->bride_image);
        }
        $successStories->update($input);
        return back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuccessStories  $successStories
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuccessStories $successStories)
    {
        deleteFile($successStories->bride_image);
        deleteFile($successStories->groom_image);
        $successStories->delete();
        return back()->with('success','Deleted Successfully');
    }
    public function stories()
    {
        $stories = SuccessStories::take(5)->get();
        return $this->apiResponseResourceCollection(200,'Success Stories List',SuccessStoriesResource::collection($stories));
    }
}
