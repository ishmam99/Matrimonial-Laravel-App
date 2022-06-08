<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\SliderResource;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Notification;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.dashboard');
    }
    public function slider()
    {
        $slider = Slider::where('status',0)->get();
        return $this->apiResponseResourceCollection(200,'Slider List',SliderResource::collection($slider));
    }
    public function latestMember()
    {
        $users = Profile::with('city','country')->orderBy('id','DESC')->take(10)->get();
        return $this->apiResponseResourceCollection(200, 'Latest Member List', ProfileResource::collection($users));
    }
    public function sendNotification(Request $request,$id)
    {
        $user = User::findOrfail($id);
       
        $data = [
            'greeting' => 'Hi '.$user->profile->name.'',
            'body' => $request->details,
            'thanks' => 'Thank you for using shonshari.com !',
            'actionText' => 'Click on the link',
            'actionURL' => url($request->url),
           
        ];

        $user->notify(new UserNotification($data));

       return back()->with('success','Notification Send To User');
    }
    public function sendNotificationPay($id)
    {
        $user = User::findOrfail($id);
        $data = [
            'greeting' => 'Hi ' . $user->profile->name . '',
            'body' => 'Please Pay the package fee to enjoy the exclusive features in this package',
            'thanks' => 'Thank you for using shonshari.com !',
        ];

        $user->notify(new UserNotification($data));

        return back()->with('success', 'Notification Send To User');
    }
    public function sendNotificationUpgrade($id)
    {
        $user = User::findOrfail($id);
        $data = [
            'greeting' => 'Hi ' . $user->profile->name . '',
            'body' => 'Please Upgrade To any subscription packages to enojoy more features and facilities',
            'thanks' => 'Thank you for using shonshari.com !',
        ];

        $user->notify(new UserNotification($data));

        return back()->with('success', 'Notification Send To User');
    }
}
