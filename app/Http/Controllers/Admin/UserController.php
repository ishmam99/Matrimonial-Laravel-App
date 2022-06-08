<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Models\Hobby;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Requests\ProfileRequest;
use App\Models\Priority;
use App\Models\Profile;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
       
        $users=User::where('status',User::ACCEPTED)->where('user_role',User::CLIENT)->with('profile')->paginate(20);
        return view('dashboard.user.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $category = $request->category;
        $input=  $request->validate([
            'name'       => 'required|string',
            'email'            => 'required|unique:users,email|email',
            'phone'            => 'nullable|string',
            'nid'         => 'nullable|string',
            'user_role'     =>'required'
       ]);
      
        $input['password'] = Hash::make(123123123);
    //    dd($input);
      $user= User::create($input);
        if ($request->user_role == User::CLIENT) {
            $user->profile()->create([
                    'name'  =>$user->name,
                    'nid'   =>$user->nid,
                    'email' =>$user->email,
                   
            ]);
        }
        elseif($request->user_role == User::LAWYER)
        {
            $user->lawyer()->create([
                'name'  => $user->name,
                'nid'   => $user->nid,
                'email' => $user->email,
                'lawyer_category_id' => $category,
                'phone' => $user->phone]);
        } elseif ($request->user_role == User::KAZI) {
            $user->kazi()->create([
                'name'  => $user->name,
                'nid'   => $user->nid,
                'email' => $user->email,
                'phone' => $user->phone]);
        } elseif ($request->user_role == User::EMPLOYEE) {
            $user->employee()->create([
                'name'  => $user->name,
                'nid'   => $user->nid,
                'email' => $user->email,
                'phone' => $user->phone,
                'post'  => $request->post
            ]);
        } elseif ($request->user_role == User::AGENT) {
            $user->agent()->create([
                'name'  => $user->name,
                'nid'   => $user->nid,
                'agent_category_id' => $category,
                'email' => $user->email,
                'phone' => $user->phone
            ]);
        }
       return redirect()->back()->with('success','New User Created');
    }

    public function show(User $user)
    {

       
        return view('dashboard.user.view',compact('user'));
    }

    public function edit(User $user)
    {
       // $this->checkPermission('profile.access');

        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
      
       // $this->checkPermission('user.edit');
//dd($user);
      $input=  $request->validate([
           
            'name'       => 'required|string',
           
            'email'            => 'required|email',
            'phone'            => 'nullable|string',
          
            'nid'         => 'nullable|string',
            
       ]);
      
       
        $user->update($input);
            // 'first_name'       => $request->input('first_name'),
            // 'last_name'        => $request->input('last_name'),
            // 'ancestry'         => $request->input('ancestry'),
            // 'email'            => $request->input('email'),
            // 'phone'            => $request->input('phone'),
            // 'website'          => $request->input('website'),
            // 'telegram'         => $request->input('telegram'),
            // 'password'         => $request->input('password'),
            // 'marital_status'   => $request->input('marital_status'),
            // 'religion'         => $request->input('religion'),
            // 'otp_code'         => $request->input('otp_code'),
            // 'otp_expire_time'  => $request->input('otp_expire_time'),
            // 'looking_for'      => $request->input('looking_for'),
            // 'gender'           => $request->input('gender'),
            // 'account_type'     => $request->input('account_type'),
            // 'referral_code'    => $request->input('referral_code'),
            // 'package_id'       => $request->input('package_id'),
            
            // 'cover_photo'    => $request->input('cover_photo'),
         //   'profile_photo' => $fileName,
            // 'nid' => $request->input('nid'),
            // 'verification' => $request->input('verification'),
            // 'skin_tone' => $request->input('skin_tone'),
            // 'notification' => $request->input('notification'),
            // 'political_point' => $request->input('political_point'),
            // 'religion_point' => $request->input('religion_point'),
            // 'short_intro' => $request->input('short_intro'),
            // 'medical_history' => $request->input('medical_history'),
       // ]);


        // $user->certificate->update([
        //     'certificate_image'  => $request->input('certificate_image'),
        //     'status'             => $request->input('status'),
        // ]);

        // Hobby::create([
        //     'hobby'=> $input['hobby'],
        //     'user_id' => auth()->user()->id

        // ]);

        // Job::create([
        //     'company_name'=> $input['company_name'],
        //     'year_started'=> $input['year_started'],
        //     'year_ended' => $input['year_ended'],
        //     'description' => $input['description'],
        //     'user_id' => auth()->user()->id
        // ]);

        return back()->with('success', 'Settings Updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success','User Data Deleted');
    }
    public function accept($id)
    {
       $user=User::findOrfail($id);
       $user->status=1;
       $user->update();
       return back();
    }
    public function change_password($id)
    {
        $user=User::findOrfail($id);

        return view('dashboard.user.change_password',compact('user'));
    }
    public function regesitrationRequest()
    {
         $users=User::where('status',User::PENDING)->where('user_role',User::CLIENT)->with('profile')->paginate(20);
        return view('dashboard.user.list',compact('users'));
    }
public function profileUpdate(ProfileRequest $request,$id)
{
    $profile=Profile::findOrfail($id);
        $input = $request->all();
        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo!=null)
            $input['profile_photo'] = updateFile($request->file('profile_photo'),'/profile/',$profile->profile_photo);
            else
                $input['profile_photo'] = uploadFile($request->file('profile_photo'), '/profile');
        }

        if ($request->hasFile('cover_photo')) {
            if ($profile->cover_photo != null)
                $input['cover_photo'] = updateFile($request->file('cover_photo'), '/profile/', $profile->cover_photo);
            else
                $input['cover_photo'] = uploadFile($request->file('cover_photo'), '/profile');
        }

        $profile->update($input);

        return back()->with('success','Profile Updated Successfully');
    }
    public function control($id)
    {
        $user = User::findOrfail($id);

        return view('dashboard.user.control', compact('user'));
    }
    public function priority(Request $request, $id)
    {
        $date=Carbon::today()->addDays($request->day);
        $profile=Profile::findOrfail($id);
        $profile->priority == null ? $profile->priority()->create(['days'=>$date]) : $profile->priority->update(['days'=>$date]);
      
       return back()->with('success','User is Added To Priority User');
    }
    public function status($id,$status)
    {
      Profile::findOrfail($id)->update(['profile_type'=>$status]);
      return back()->with('success','Status Updated');
    }

}