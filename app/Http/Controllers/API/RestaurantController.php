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
       $cafename=$request->query("name");
       $district=$request->query("district");
       $location=$request->query("location");
       $rating=$request->query("rating");
       if($cafename)
       {
$query->where('name','LIKE',"%{$cafename}%");
       }
       if($district)
       {
$query->where('name','LIKE',"%{$district}%");
       }
       if($location)
       {
$query->where('name','LIKE',"%{$location}%");
       }
       if($rating)
       {
$query->where('name','LIKE',"%{$rating}%");
       }
      $cafes=$query->get();
      return $this->sendResponse($cafes,"Your result");

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
