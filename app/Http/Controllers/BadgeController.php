<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $badges = Badge::with('badgeUser')->paginate(10);
      
        return view('dashboard.badge.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $this->checkPermission('badge.create');

    //     return view('dashboard.badge.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'badge_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            // 'status' => ['required', 'boolean'],
        ]);
        $validated['badge_image'] = uploadFile($request->file('badge_image'), 'images');
        // dd($validated);
        Badge::create($validated);

        return redirect()->route('badge.index')->with('success', 'Badge Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Badge $badge)
    {
        $this->checkPermission('badge.edit');

        return view('dashboard.badge.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Badge $badge)
    {
       // dd($request);
        $validated = $request->validate([
            'badge_image' => ['nullable', 'mimes:jpeg,jpg,png,webp', 'max:1024'],
            'name'     => ['required', 'string'],
            'status'    => ['required', ]
        ]);


        if ($request->hasFile('badge_image')) {
            if (File::exists('storage/images/' . $badge->badge_image)) {
                File::delete('storage/images/' . $badge->badge_image);
            }
            $validated['badge_image'] = uploadFile($request->file('badge_image'), 'images');
        }

        $validated['status'] = $request->status == "on" ? 1 : 0;
        $badge->update($validated);

        return back()->with('success', 'Badge successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badge $badge)
    {
        $this->checkPermission('badge.delete');

        $badge->delete();
        return back()->with('success', 'Badge deleted successfully.');
    }

    public function badgeUser(Request $request,$id)
    {
        $profile=Profile::findOrfail($id);
        if($profile->badgeUser)
        $profile->badgeUser->update(['badge_id'=>$request->badge_id]);
        else
        {
            $profile->badgeUser()->create(['badge_id'=>$request->badge_id]);
        }
        return back()->with('success','Badge Updated');
    }
}
