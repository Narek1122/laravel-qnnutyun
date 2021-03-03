<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegistrRequest;

class UserController extends Controller
{
    public function registr(RegistrRequest $request){
      $validated = $request->validated();

      User::create($validated);
    }

    public function getuser($id){

      $user = User::where('id','=',$id)->get();
      return response()->json([
        'status' => 1,
        'data' => $user
      ]);

    }


    public function userUpdate(Request $request,$id){
      $validated = $request->validate([
        "password" => "required"
      ]);
      $validated['password'] = bcrypt($validated['password']);
      $user = User::where('id','=',$id)->update($validated);

    }

    public function userDelete($id){
        $user = User::where('id','=',$id)->delete();
    }

    public function userPag(){
      $user = User::paginate(2);

      return response()->json([
        'status' => 1,
        'data' => $user
      ]);
    }

}
