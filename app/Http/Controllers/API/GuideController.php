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
       $id=$request->query("id");
      $language=$request->query("language");
      if($id)
      {
   $query->where('id','LIKE',"%{$id}%");
      }
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
        $validate = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required', 
            'dob' => 'required',
            'country' => 'required',
            'email' => 'required|email',
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
        //images
$guideimages= Guide::select('id','GOVcertificate','profile','citizenCardFront','citizenCardBack','CV')->where('id',$id)->first();
$images=[];
foreach(['GOVcertificate','profile','citizenCardFront','citizenCardBack','CV'] as $imgkey)
{
    if($request->hasFile($imgkey))
    {
        if($guideimages->$imgkey!='' && $guideimages->$imgkey!=null)
        {
            $oldfile=$guideimages->$imgkey;
            if(file_exists($oldfile))
            {
                unlink($oldfile);
            }
            $img=$request->$imgkey;
            $ext=$img->getClientOriginalExtension();
            $imagename=time().'_'.uniqid().$ext;
            $img->move(public_path('uploads/guide/').$imagename);
            $images[$imgkey]=$imagename;
        }
    }
    else{
        $imagename=$guideimages->$imgkey;
        $images[$imgkey]=$imagename;
    }
} 
//images
$guideUpdate= Guide::where('id',$id)->update([

    'firstname'=>$request->firstname,
    'lastname'=>$request->lastname,
    'address'=>$request->address,
    'phone'=>$request->phone,
    'dob'=>$request->dob,
    'country'=>$request->country,
    'email'=>$request->email,
    'website'=>$request->website,
    'profile'=>$images['profile'],
    'CV'=>$images['CV'],
    'citizenshipNo'=>$request->citizenshipNo,
    'citizenCardFront'=>$images['citizenCardFront'],
    'citizenCardBack'=>$images['citizenCardBack'],
    'GOVcertificate'=>$images['GOVcertificate'],
    'languages'=>json_encode($request->languages),
    'experience'=>json_encode($request->experience)
  
]);
$guide= Guide::where('id',$id)->first();

if($guideUpdate >0)
{
    return $this->sendResponse($guide,"Data is updated Successfully");
}
else{
    return $this->sendError("Data is not updated",[],402);
}

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guide=Guide::where('id',$id)->first();
        if(!$guide)
        {
            return $this->sendError("guide not found", [], 404);
        }
        $images=['image1','image2','image3','image4','image5'];
        foreach($images as $img)
        {
            $filepath=public_path('uploads/guide/').$guide->$img;
            if(file_exists($filepath))
            {
              unlink($filepath);  
            }  
        }
     $query=  $guide->delete();
     if($query)
     {
               return $this->sendResponse([],"successfully deleted");

     }
    }
}
