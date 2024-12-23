<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
$validateData=Validator::make(
    $request->all(),[
        'firstname' => 'required|alpha',
        'lastname' => 'required|alpha',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'

    ]);
    if($validateData->fails())
    {
        return response()->json([
   'status' => false,
   'message' => 'Validation Error',
   'errors' => $validateData->errors()->all()
        ],405);
    }
$user =User::create([
'firstname'=>$request->firstname,
'lastname'=>$request->lastname,
'email'=>$request->email,
'password'=>$request->password
]);

return response()->json([
'status'=> true,
'message'=>'user registered successfully',
'user' => $user
],200);

    }


    // public function login(Request $request)
    // {




    // }



    // public function logout(Request $request)
    // {




    // }
}
