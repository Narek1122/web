<?php

namespace App\Http\Controllers;

use App\Events\MailProcessed;
use Illuminate\Http\Request;
use App\Http\Requests\UserSignUpReq;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use App\Http\Requests\UserLoginReq;
use App\Http\Requests\UserEditReq;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function registerPage(){
        return view('user.register');
    }

    public function signUp(UserSignUpReq $request){
        User::create($request->validated());
        event(new MailProcessed($request->validated()));
        return view('user.login');
    }

    public function login(){
        return view('user.login');
    }

    public function signIn(UserLoginReq $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->isAdmin()) {
                return redirect()->route('adminProfile');
            }

            else if(Auth::user()->isUser()) {
                return redirect()->route('userProfile');
            }
        }

        return redirect()->route('login');
    }

    public function profile(){
        return view('user-profile.profile',['user' => Auth::user()]);
    }

    public function profileEdit(){
        return view('user-profile.edit',['user' => Auth::user()]);
    }

    public function userEditProfileData(UserEditReq $request){
        $data = $request->validated();
        $service  = new UserServices(Auth::user());
        $service->editUserData($data);
        return redirect()->route('userProfile');
    }


}
