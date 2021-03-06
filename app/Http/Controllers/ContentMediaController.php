<?php

namespace App\Http\Controllers;

use App\Models\ContentMedia;
use Illuminate\Http\Request;

class ContentMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = ContentMedia::paginate(10);
        return view('dashboard.course.course_content.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.course.course_content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =  $request->validate([
            'name'  => 'required|string',
            'image' => 'file|mimes:png,jpg',
            'media' => 'file|mimes:png,jpg,mpeg4,avi,mp4|nullable',
            'link'  => 'string|nullable'

        ]);
        // dd($request);
        if ($request->file('media'))
        $input['media'] = uploadFile($request->file('media'),'content');
        if($request->file('image'))
        $input['thumb'] = uploadFile($request->file('image'), 'content');
        // dd($input);
        ContentMedia::create($input);
        return redirect()->route('contentMedia.index')->with('success','Content Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentMedia  $contentMedia
     * @return \Illuminate\Http\Response
     */
    public function show(ContentMedia $contentMedia)
    {
        return view('dashboard.course.course_content.view',compact('contentMedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentMedia  $contentMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentMedia $contentMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContentMedia  $contentMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentMedia $contentMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentMedia  $contentMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentMedia $contentMedia)
    {
        //
    }
}
