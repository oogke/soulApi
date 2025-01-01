<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AdvenAct;
use App\Models\Cafe;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


class AdvenActController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $advenActs= AdvenAct::all();
       return $this->sendResponse($advenActs,"All adventure");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'district' => 'required',
            'description' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'is_seasonal' => 'required', 
            'email' => 'required|email',
            'website' => 'required|url',
            'best_season' => 'required|array',
            'requirements' => 'required|array',
            'requirements.*' => 'required|string', 
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'image5' => 'nullable|image',
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
$img1=time().'_' . uniqid() . ".".$ext1;
$img2=time().'_' . uniqid() . ".".$ext2;
$img3=time().'_' . uniqid() . ".".$ext3;
$img4=time().'_' . uniqid() . ".".$ext4;
$img5=time().'_' . uniqid() . ".".$ext5;
$image1->move(public_path('uploads/advenact'),$img1);
$image2->move(public_path('uploads/advenact'),$img2);
$image3->move(public_path('uploads/advenact'),$img3);
$image4->move(public_path('uploads/advenact'),$img4);
$image5->move(public_path('uploads/advenact'),$img5);

//image
$advenAct=AdvenAct::create([
    'name'=>$request->name,
    'district'=>$request->district,
    'description'=>$request->description,
    'price'=>$request->price,
    'duration'=>$request->duration,
    'requirements'=>json_encode($request->requirements),
    'image1'=>$img1,
    'image2'=>$img2,
    'image3'=>$img3,
    'image4'=>$img4,
    'image5'=>$img5,
    'is_seasonal'=>$request->is_seasonal,
    'best_season'=>json_encode($request->bestSeason),
    'location'=>$request->location,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'website'=>$request->website
]);
return $this->sendResponse($advenAct,"Data inserted Successfully");


    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=AdvenAct::query();
       $advenactname=$request->query("name");
       $district=$request->query("district");
       $location=$request->query("location");
       $id=$request->query("id");
       if($advenactname)
       {
$query->where('name','LIKE',"%{$advenactname}%");
       }
       if($district)
       {
$query->where('district','LIKE',"%{$district}%");
       }
       if($location)
       {
$query->where('location','LIKE',"%{$location}%");
       }
       if($id)
       {
           $query->where('id','LIKE',"%{$id}%");
       
       }
       $advenacts=$query->get();
       if($advenacts->isEmpty())
       {
        return $this->sendResponse([],"Your result");

       }
      
      return $this->sendResponse($advenacts,"Your result");

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'district' => 'required',
            'description' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'is_seasonal' => 'required', 
            'email' => 'required|email',
            'website' => 'required|url',
            'best_season' => 'required|array',
            'requirements' => 'required|array',
            'requirements.*' => 'required|string', 
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'image5' => 'nullable|image',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
        //image
$advenact= AdvenAct::select('id','image1','image2','image3','image4','image5')->where('id',$id)->first();
$images=[];
foreach(['image1','image2','image3','image4','image5'] as $imgkey)
{
    if($request->hasFile($imgkey))
    {
$path=public_path('uploads');
if($advenact->$imgkey!='' && $advenact->$imgkey!=null)
{
    $oldfile=$path.'/'.$advenact->$imgkey;
    if(file_exists($oldfile))
    {
        unlink($oldfile);
    }
}
$img=$request->$imgkey;
$ext=$img->getClientOriginalExtension();
$imagename=time().'_'.uniqid().'.'.$ext;
$img->move(public_path('uploads/advenact/'), $imagename);
$images[$imgkey]=$imagename;
    }
    else{
        $imagename=$advenact->$imgkey;
        $images[$imgkey]=$imagename;
    }
}  
 //image
$advenactUpdate=AdvenAct::where('id',$id)->update([
    'name' => $request->name,
    'district' => $request->district,
    'description' => $request->description,
    'price' => $request->price,
    'duration' => $request->duration,
    'requirements' => json_encode($request->requirements),
    'image1' => $images['image1'] ,
    'image2' => $images['image2'] ,
    'image3' => $images['image3'] ,
    'image4' => $images['image4'],
    'image5' => $images['image5'] ,
    'is_seasonal' => $request->is_seasonal,
    'best_season' => json_encode($request->best_season),
    'location' => $request->location,
    'email' => $request->email,
    'phone' => $request->phone,
    'website' => $request->website
]);
$newadvenact=AdvenAct::where('id',$id)->first();
if ($advenactUpdate > 0) {
   return $this->sendResponse($newadvenact,"Data is updated");
} else {
    return $this->sendError( "No changes were made",[],402);
}
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advenact=AdvenAct::where('id',$id)->first();
        if(!$advenact)
        {
            return $this->sendError("advenact not found", [], 404);
        }
        $images=['image1','image2','image3','image4','image5'];
        foreach($images as $img)
        {
            $filepath=public_path('uploads/advenact/').$advenact->$img;
            if(file_exists($filepath))
            {
              unlink($filepath);  
            }  
        }
     $query=  $advenact->delete();
     if($query)
     {
               return $this->sendResponse([],"successfully deleted");

     }
    }
}
