<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailverifyController extends Controller
{
    
public function EmailVerify()
{
  

$to="archanatimilsina88@gmail.com";
$message="this is msg";
    $subject= "Email verification code";

;
    $verifcode="2837365";

$request=Mail::to($to)->send(new EmailVerification($message,$subject,$verifcode));
dd($request);
}
}
