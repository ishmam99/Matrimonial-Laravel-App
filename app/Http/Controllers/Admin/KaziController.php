<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kazi;
use App\Models\User;
use Illuminate\Http\Request;

class KaziController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role=User::Kazi;
        // $users=User::where('user_role',User::Kazi)->with('Kazi')->paginate(20);
        $kazis = Kazi::where('status',Kazi::ACCEPTED)->with('user')->paginate(20);
        return view('dashboard.kazi.index', compact('kazis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kazi.create');
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
     * @param  \App\Models\Kazi  $Kazi
     * @return \Illuminate\Http\Response
     */
    public function show(Kazi $kazi)
    {
        return view('dashboard.kazi.show', compact('kazi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kazi  $Kazi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kazi $kazi)
    {
        // $user=User::findOrfail($id);
        return view('dashboard.kazi.edit', compact('kazi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kazi  $Kazi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kazi $kazi)
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

        $kazi->update($validated);
        return back()->with('success', 'Kazi Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kazi  $Kazi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kazi $Kazi)
    {
        //
    }
    public function requestList()
    {
        $users = Kazi::where('status', Kazi::PENDING)->with('user')->paginate(20);
        return view('dashboard.kazi.list', compact('users'));
    }
    public function accept(Kazi $kazi)
    {
        $kazi->update(['status' => Kazi::ACCEPTED]);
        return back()->with('success', 'Kazi Accepted');
    }
    public function case(Kazi $kazi)
    {
        $cases = $kazi->contracts->load('profile.user');
        return view('dashboard.kazi.contract', compact('cases'));
    }
    public function addBadge(Request $request, Kazi $kazi)
    {
        if ($kazi->badge)
            $kazi->badge()->update(['badge_id' => $request->badge_id]);
        else
            $kazi->badge()->create(['badge_id' => $request->badge_id]);
        return back()->with('success', 'Badge Added To Kazi Profile Successfully');
    }
}
