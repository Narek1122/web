<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserServices
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function editUserData($validated){

        if ($validated['name']){
            Auth::user()->name = $validated['name'];
            Auth::user()->save();
        }

        if(isset($validated['profile_image'])){
            $image = $validated['profile_image'];

            if($this->user->profile_image){
                $oldImagePath = $this->user->profile_image;
                if(Storage::exists($oldImagePath)){
                    Storage::delete($oldImagePath);
                }

            }
            $imageName = Storage::put('public/user-images',$image);
            Auth::user()->profile_image = $imageName;
            Auth::user()->save();
        }

    }





}
