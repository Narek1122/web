<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $datas = User::where('role','user')->get();
        return view('admin.profile',['datas' =>$datas]);
    }

    public function adminChangeUserData(Request $request){
        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->save();

        return response()->json([
           'status' => 'success',
            'data' => $user
        ]);
    }
}
