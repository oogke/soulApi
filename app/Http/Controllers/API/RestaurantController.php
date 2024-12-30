<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


class RestaurantController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants=Restaurant::all();
        return $this->sendResponse($restaurants,"Atll the Restaurants");
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
            'phone' => 'required|string|max:15',  // Adjust max length if needed
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
$image1->move(public_path('uploads/restaurant'),$img1);
$image2->move(public_path('uploads/restaurant'),$img2);
$image3->move(public_path('uploads/restaurant'),$img3);
$image4->move(public_path('uploads/restaurant'),$img4);
$image5->move(public_path('uploads/restaurant'),$img5);
//images
$restaurant=Restaurant::create([
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
return $this->sendResponse($restaurant,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=Restaurant::query();
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
      $restaurant=$query->get();
      if($restaurant->isEmpty())
      {
        return $this->sendResponse([],"No result found");

      }
      return $this->sendResponse($restaurant,"Your result");

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
            'phone' => 'required|string|max:15',  // Adjust max length if needed
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
            //image
$cafeImage= Restaurant::select('id','image1','image2','image3','image4','image5')->where('id',$id)->first();
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

$restaurantUpdate=Restaurant::where('id',$id)->update([

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
$restaurant=Restaurant::where('id',$id)->first();
if($restaurantUpdate >0)
{
    return $this->sendResponse($restaurant,"Data is updated successfully");
}
else{
    return $this->sendError("Data is not submitted",[],);

}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant=Restaurant::where('id',$id)->first();
        if(!$restaurant)
        {
            return $this->sendError("Restaurant not found", [], 404);
        }
        $images=['image1','image2','image3','image4','image5'];
        foreach($images as $img)
        {
            $filepath=public_path('uploads/restaurant/').$restaurant->$img;
            if(file_exists($filepath))
            {
              unlink($filepath);  
            }  
        }
     $query=  $restaurant->delete();
     if($query)
     {
               return $this->sendResponse([],"successfully deleted");

     }
        
    }
}
