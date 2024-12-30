<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class CafeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $cafes= Cafe::all();
    return $this->sendResponse($cafes,"All the cafes");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'district' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string', 
            'email' => 'required|email',
            'website' => 'required|url',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
  //image
$image1=$request->image1;
$image2=$request->image2;
$image3=$request->image3;
$image4=$request->image4;
$image5=$request->image5;
$ext1=$image1->getClientOriginalExtension();
$ext2=$image2->getClientOriginalExtension();
$ext3=$image3->getClientOriginalExtension();
$ext4=$image4->getClientOriginalExtension();
$ext5=$image5->getClientOriginalExtension();
$img1=time().".".$ext1;
$img2=time().".".$ext2;
$img3=time().".".$ext3;
$img4=time().".".$ext4;
$img5=time().".".$ext5;
$image1->move(public_path('uploads/cafe'),$img1);
$image2->move(public_path('uploads/cafe'),$img2);
$image3->move(public_path('uploads/cafe'),$img3);
$image4->move(public_path('uploads/cafe'),$img4);
$image5->move(public_path('uploads/cafe'),$img5);
//images
$cafe=Cafe::create([
    'name'=>$request->name,
    'description'=>$request->description,
    'location'=>$request->location,
    'district'=>$request->district,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'website'=>$request->website,
    'image1'=>$img1,
    'image2'=>$img2,
    'image3'=>$img3,
    'image4'=>$img4,
    'image5'=>$img5,
]);
return $this->sendResponse($cafe,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=Cafe::query();
       $cafename=$request->query("name");
       $district=$request->query("district");
       $location=$request->query("location");
       $rating=$request->query("rating");
       $id=$request->query("id");
       if($cafename)
       {
$query->where('name','LIKE',"%{$cafename}%");
       }
       if($district)
       {
$query->where('district','LIKE',"%{$district}%");
       }
       if($location)
       {
$query->where('location','LIKE',"%{$location}%");
       }
       if($rating)
       {
$query->where('rating','LIKE',"%{$rating}%");
       }
       if($id)
{
    $query->where('id','LIKE',"%{$id}%");

}


$cafes=$query->get();
if($cafes->isEmpty())
{
    return $this->sendResponse([],"No data found");

}
      return $this->sendResponse($cafes,"Your result");

    }

    
   public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'district' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string', 
            'email' => 'required|email',
            'website' => 'required|url',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
        //image
$cafeImage= Cafe::select('id','image1','image2','image3','image4','image5')->where('id',$id)->first();
$images=[];
foreach(['image1','image2','image3','image4','image5'] as $imgkey)
{
    if($request->hasFile($imgkey))
    {
        $path=public_path('uploads');
        if($cafeImage->$imgkey!='' && $cafeImage->$imgkey!=null)
        {
            $oldfile=$cafeImage->$imgkey;
            if(file_exists($oldfile))
            {
unlink($oldfile);
            }
            $img=$request->$imgkey;
            $ext=$img->getClientOriginalExtension();
            $imagename=time().'_'.uniqid().'.'.$ext;
            $img->move(public_path('uploads/cafe/').$imagename);
$images[$imgkey]=$imagename;
        }
    }
    else{
       $imagename= $cafeImage->$imgkey;
       $images[$imgkey]=$imagename;
    }
}
//image

$cafeUpdate= Cafe::where("id",$id)->update([
    'name'=>$request->name,
    'description'=>$request->description,
    'location'=>$request->location,
    'district'=>$request->district,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'website'=>$request->website,
    'image1'=>$images['image1'],
    'image2'=>$images['image2'],
    'image3'=>$images['image3'],
    'image4'=>$images['image4'],
    'image5'=>$images['image5']
]);
$cafe=Cafe::where('id',$id)->first();
if($cafeUpdate>0)
{
return $this->sendResponse($cafe,"Data is updated");
}
else{
    return $this->sendError("Data is not updated try again",[],402);
}

    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cafe=Cafe::where('id',$id)->first();
        if(!$cafe)
        {
            return $this->sendError("cafe not found", [], 404);
        }
        $images=['image1','image2','image3','image4','image5'];
        foreach($images as $img)
        {
            $filepath=public_path('uploads/restaurant/').$cafe->$img;
            if(file_exists($filepath))
            {
              unlink($filepath);  
            }  
        }
     $query=  $cafe->delete();
     if($query)
     {
               return $this->sendResponse([],"successfully deleted");

     }
    }
}
