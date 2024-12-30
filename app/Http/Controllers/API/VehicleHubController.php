<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VehicleHub;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class VehicleHubController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiclehubs= VehicleHub::all();
        return $this->sendResponse($vehiclehubs,"All the vehiclehubs");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'phone' => 'required|string', // phone validation (example format)
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'vehicles' => 'required|array|min:1', // Ensure at least one vehicle
            'vehicles.*' => 'required|string|max:255', // Each vehicle should be a string and not empty
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
$image1->move(public_path('uploads/vehiclehub'),$img1);
$image2->move(public_path('uploads/vehiclehub'),$img2);
$image3->move(public_path('uploads/vehiclehub'),$img3);
$image4->move(public_path('uploads/vehiclehub'),$img4);
$image5->move(public_path('uploads/vehiclehub'),$img5);
//images
$vehicleHub=VehicleHub::create([
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
    'vehicles'=>json_encode($request->vehicles)
]);
return $this->sendResponse($vehicleHub,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=VehicleHub::query();
       $name=$request->query("name");
       $id=$request->query("id");
       $district=$request->query("district");
       $location=$request->query("location");
       $rating=$request->query("rating");
       if($id)
       {
$query->where('id','LIKE',"%{$id}%");
       }
       if($name)
       {
$query->where('name','LIKE',"%{$name}%");
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
      $vehiclehub=$query->get();
      if($vehiclehub->isEmpty())
      {
        return $this->sendResponse([],"No result found");

      }
      return $this->sendResponse($vehiclehub,"Your result");

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'phone' => 'required|string', // phone validation (example format)
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'vehicles' => 'required|array|min:1', // Ensure at least one vehicle
            'vehicles.*' => 'required|string|max:255', // Each vehicle should be a string and not empty
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
            //image
$vehiclehubImage= VehicleHub::select('id','image1','image2','image3','image4','image5')->where('id',$id)->first();
$images=[];
foreach(['image1','image2','image3','image4','image5'] as $imgkey)
{
    if($request->hasFile($imgkey))
    {
        $path=public_path('uploads');
        if($vehiclehubImage->$imgkey!='' && $vehiclehubImage->$imgkey!=null)
        {
            $oldfile=$vehiclehubImage->$imgkey;
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
       $imagename= $vehiclehubImage->$imgkey;
       $images[$imgkey]=$imagename;
    }

$vehiclehubUpdate=VehicleHub::where('id',$id)->update([



]);
$vehiclehub=VehicleHub::where('id',$id)->first();
if($vehiclehubUpdate >0)
{
    return $this->sendResponse($vehiclehub,"Data is updated successfully");
}
else{
    return $this->sendError("Data is not submitted",[],);

}

}
//image
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiclehub=VehicleHub::where('id',$id)->first();
        if(!$vehiclehub)
        {
            return $this->sendError("vehiclehub not found", [], 404);
        }
        $images=['image1','image2','image3','image4','image5'];
        foreach($images as $img)
        {
            $filepath=public_path('uploads/vehiclehub/').$vehiclehub->$img;
            if(file_exists($filepath))
            {
              unlink($filepath);  
            }  
        }
     $query=  $vehiclehub->delete();
     if($query)
     {
               return $this->sendResponse([],"successfully deleted");

     }
    }
}
