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
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required', 
            'dob' => 'required',
            'country' => 'required',
            'email' => 'required|email|unique:guides,email',
            'websites' => 'nullable',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'CV' => 'nullable|image',
            'citizenshipNo' => 'required',
            'citizenCardFront' => 'required|image|mimes:jpeg,png,jpg,gif',
            'citizenCardBack' => 'required|image|mimes:jpeg,png,jpg,gif',
            'GOVcertificate' => 'nullable',
            'languages' => 'required|array',
            'languages.*' => 'string',
            'experience' => 'required|array',
            'experience.*' => 'string',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
        //image
$GOVcertificate=$request->file('GOVcertificate');
$CV=$request->file('CV');
$profile=$request->file('profile');
$CcardFront=$request->file('citizenCardFront');
$Ccardback=$request->file('citizenCardBack');
$ext1=$GOVcertificate->getClientOriginalExtension();
$ext2=$CV->getClientOriginalExtension();
$ext3=$profile->getClientOriginalExtension();
$ext4=$CcardFront->getClientOriginalExtension();
$ext5=$Ccardback->getClientOriginalExtension();
$img1=time().'_' . uniqid() . ".".$ext1;
$img2=time().'_' . uniqid() . ".".$ext2;
$img3=time().'_' . uniqid() . ".".$ext3;
$img4=time().'_' . uniqid() . ".".$ext4;
$img5=time().'_' . uniqid() . ".".$ext5;
$GOVcertificate->move(public_path('uploads/guide'),$img1);
$CV->move(public_path('uploads/guide'),$img2);
$profile->move(public_path('uploads/guide'),$img3);
$CcardFront->move(public_path('uploads/guide'),$img4);
$Ccardback->move(public_path('uploads/guide'),$img5);
//
$guide=Guide::create([
    'firstname'=>$request->firstname,
    'lastname'=>$request->lastname,
    'address'=>$request->address,
    'phone'=>$request->phone,
    'dob'=>$request->dob,
    'country'=>$request->country,
    'email'=>$request->email,
    'website'=>$request->website,
    'profile'=>$img3,
    'CV'=>$img2,
    'citizenshipNo'=>$request->citizenshipNo,
    'citizenCardFront'=>$img4,
    'citizenCardBack'=>$img5,
    'GOVcertificate'=>$img1,
    'languages'=>json_encode($request->languages),
    'experience'=>json_encode($request->experience)
  
]);
return $this->sendResponse($guide,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=Guide::query();
       $firstname=$request->query("name");
      $language=$request->query("language");
       if($firstname)
       {
    $query->where('name','LIKE',"%{$firstname}%");
       }
       if($language)
       {
        $query->whereJsonContains('languages',$language);
       }
      
      $guides=$query->get();
      if($guides->isEmpty())
      {
        return $this->sendResponse([],"No data found");

      }
      return $this->sendResponse($guides,"Your result");

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
