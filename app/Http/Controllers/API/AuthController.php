<?php

namespace App\Http\Controllers\API;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
class AuthController extends BaseController
{

    public function emailVerify(Request $request)
    {
$toEmail=$request->email;
$fname=$request->firstname;
$msg= "Thanks for signing up to The SoulAPI. Before we can continue, we need to validate your email address.";
$verifcode=rand(100000,999999);
$footer="Please Do not share this email";
Mail::to($toEmail)->send(new EmailVerification($fname,$msg,$verifcode,$footer));
return $this->sendResponse($verifcode,"The email hasbeen sent");
    }


    
    public function signup(Request $request)
    {
        $validateData = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|alpha',
                'lastname' => 'required|alpha',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6'

            ]
        );
        if ($validateData->fails()) {
            return $this->sendError("Validation Error", $validateData->errors()->all(), 307);
        }
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
           
        ]);

        return $this->sendResponse($user, 'user registered successfully');
    }


    public function login(Request $request)
    {

        $validateData = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
        );
        if ($validateData->fails()) {
            return $this->sendError('Validation Error', $validateData->errors()->all(), 307);
        }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authuser = Auth::user();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Login successful',
                    'token' => $authuser->createToken("api_token")->plainTextToken,
                    'token_type' => 'bearer'
                ],
                200
            );
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Email or Password wrong',

            ], 404);
        }

    }



    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successful',
            'user' => $user
        ], 200);



    }
}
