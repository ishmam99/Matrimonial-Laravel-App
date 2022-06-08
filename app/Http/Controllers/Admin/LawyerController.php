<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role=User::LAWYER;
        // $users=User::where('user_role',User::LAWYER)->with('lawyer')->paginate(20);
        $lawyers=Lawyer::where('status',Lawyer::ACCEPTED)->with('user','category')->paginate(20);
        return view('dashboard.lawyer.index',compact('lawyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lawyer.create');
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
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function show(Lawyer $lawyer)
    {
        return view('dashboard.lawyer.lawyer',compact('lawyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lawyer $lawyer)
    {
        // $user=User::findOrfail($id);
        return view('dashboard.lawyer.edit',compact('lawyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lawyer $lawyer)
    {
        $validated=$request->validate([
            'name'  =>'nullable|string',
            'email' =>'nullable|email',
            'phone' =>'nullable',
            'fee'   =>'nullable|string',
            'profile_photo' =>'nullable'
        ]);
       
        if($request->profile_photo)
        $validated['profile_photo'] = uploadFile($request->file('profile_photo'), 'images');
        
        $lawyer->update($validated);
        return back()->with('success','Lawyer Data Updated Successfully');
    }

   
    public function destroy(Lawyer $lawyer)
    {
        //
    }
    public function requestList()
    {
        $users = Lawyer::where('status', Lawyer::PENDING)->with('user','category')->paginate(20);
        return view('dashboard.lawyer.list', compact('users'));
    }
    public function accept(Lawyer $lawyer)
    {
       $lawyer->update(['status'=>Lawyer::ACCEPTED]);
       return back()->with('success','Lawyer Accepted');
    }
    public function case(Lawyer $lawyer)
    {
       $cases = $lawyer->userCase->load('profile.user');
       return view('dashboard.lawyer.case',compact('cases'));
    }
    public function addBadge(Request $request, Lawyer $lawyer)
    {
        if($lawyer->badge)
        $lawyer->badge()->update(['badge_id' => $request->badge_id]);
        else
        $lawyer->badge()->create(['badge_id' => $request->badge_id]);
        return back()->with('success', 'Badge Added To Lawyer Profile Successfully');
    }
   
}
