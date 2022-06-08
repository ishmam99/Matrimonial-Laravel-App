<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserPackageController extends Controller
{
    public function index(Package $package)
    {
       $users = Profile::where('package_id',$package->id)->paginate(10);
       
       return view('dashboard.package.users',compact('users'));
    }
    public function store(Request $request , $id)
    {
        $user = Profile::findOrfail($id);
        if($user->userPackage)
        {
            $user->userPackage()->update(['package_id'=>$request->package_id]);
            $user->update(['package_id' => $request->package_id]);
        }
        else{
              $user->userPackage()->create(['package_id' => $request->package_id]);
            $user->update(['package_id' => $request->package_id]);
        }
      
        return back()->with('success','Package Upgrade Done');
    }
}
