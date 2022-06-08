<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
       
        $input =  $request->validate([
            'name'       => 'required|string',
            'email'            => 'required|unique:users,email|email',
            'phone'            => 'nullable|string',
            'nid'         => 'nullable|string|unique:users,nid',
            'user_role'     => 'required',
            'password'  => 'required|min:6|confirmed'
        ]);

        $input['password'] = Hash::make($request->input('password'));
        //    dd($input);
        $user = User::create($input);
        if ($request->user_role == User::CLIENT) {
            $user->profile()->create([
                'name'  => $user->name,
                'nid'   => $user->nid,
                'email' => $user->email,

            ]);
        } elseif ($request->user_role == User::LAWYER) {
            $user->lawyer()->create([
                'name'  => $user->name,
                'nid'   => $user->nid,
                'email' => $user->email,
                'phone' => $user->phone
            ]);
        } elseif ($request->user_role == User::KAZI) {
            $user->kazi()->create([
                'name'  => $user->name,
                'nid'   => $user->nid,
                'email' => $user->email,
                'phone' => $user->phone
            ]);
        }
     
       $token = $user->createToken($request->input('email'))->plainTextToken;

        return $this->apiResponse(201,'Registration Successful.', [
            'token' => $token,
            'data'  => [
                'user_id' => $user->id,
                'name'     =>$user->name,
                'email'     => $user->email,
            ]
        ]);
    }
    public function logout()
    {

        auth()->user()->currentAccessToken()->delete();
        return response(['message' => 'You have been successfully logged out.'], 200);
    }

    public function login(Request $request): JsonResponse
    {
       
       $request->validate([
            'email'      => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        $user = User::where('email', $request->input('email'))->first();
       
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->apiResponse(422, 'The provided credentials are incorrect.');
        }

        $token = $user->createToken($request->input('email'))->plainTextToken;

        return $this->apiResponse(200,'Login Successful.', [
            'token' => $token,
            'data'  => [
                'user_id' => $user->id,
                'email'     => $user->email,
            ]
        ]);
    }
    public function clearNotification()
    {
        auth()->user()->notifications()->delete();
    }
    public function notification()
    {
        return response(auth()->user()->notifications);
    }

}
