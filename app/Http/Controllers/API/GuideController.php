<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


class GuideController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides= Guide::all();
        return $this->sendResponse($guides,"All the guides datas");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits:10', 
            'dob' => 'required|date',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:guides,email',
            'websites' => 'nullable|url',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|file|mimes:pdf,docx|max:2048',
            'citizenship_card_no' => 'required|string|max:20',
            'citizenship_card_front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'citizenship_card_back' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate' => 'nullable|file|mimes:pdf,docx|max:2048',
            'languages' => 'required|array',
            'languages.*' => 'string|max:255',
            'experiences' => 'required|array',
            'experiences.*' => 'string|max:255',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
        //image
$GOVcertificate=$request->certificate;
$CV=$request->cv;
$profile=$request->profile;
$CcardFront=$request->citizenship_card_front;
$Ccardback=$request->citizenship_card_back;
$ext1=$GOVcertificate->getClientOriginalExtension();
$ext2=$CV->getClientOriginalExtension();
$ext3=$profile->getClientOriginalExtension();
$ext4=$CcardFront->getClientOriginalExtension();
$ext5=$Ccardback->getClientOriginalExtension();
$img1=time().".".$ext1;
$img2=time().".".$ext2;
$img3=time().".".$ext3;
$img4=time().".".$ext4;
$img5=time().".".$ext5;
$GOVcertificate->move(public_path('uploads/guide'),$img1);
$CV->move(public_path('uploads/guide'),$img2);
$profile->move(public_path('uploads/guide'),$img3);
$CcardFront->move(public_path('uploads/guide'),$img4);
$Ccardback->move(public_path('uploads/guide'),$img5);
//
$guide=Guide::create([
    'firstname'=>$request->first_name,
    'lastname'=>$request->last_name,
    'address'=>$request->address,
    'phone'=>$request->phone,
    'dob'=>$request->dob,
    'country'=>$request->country,
    'email'=>$request->email,
    'website'=>$request->websites,
    'profile'=>$img3,
    'CV'=>$img2,
    'citizenshipNo'=>$request->citizenship_card_no,
    'citizenshipCardFront'=>$img4,
    'citizenshipCardBack'=>$img5,
    'GOVcertificate'=>$img1,
    'languages'=>json_encode($request->languages),
    'experience'=>json_encode($request->experiences)
  
]);
return $this->sendResponse($guide,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $guide)
    {
        $guide= Guide::all()->where('firstname',$guide);
        return $this->sendResponse($guide,"Requested Guide");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
