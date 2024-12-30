<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


class PlaceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return $this->sendResponse($places,"All places");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatePlace=Validator::make($request->all(),[
           'name' =>'required',
            'description' =>'required',
            'location'=>'required',
            'category'=>'required|array',
            'district'=> 'required|required',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'image5' => 'nullable|image',
        ]);
        if($validatePlace->fails())
        {
           
            return $this->sendError("Validation Error",$validatePlace->errors()->all(),);
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
$image1->move(public_path('uploads/places'),$img1);
$image2->move(public_path('uploads/places'),$img2);
$image3->move(public_path('uploads/places'),$img3);
$image4->move(public_path('uploads/places'),$img4);
$image5->move(public_path('uploads/places'),$img5);

//image
    
$places= Place::create([
'name' => $request->name,
'description'=> $request->description,
'location' => $request->location,
'category'=> json_encode($request->category),
'district'=> $request->district,
'image1'=>$img1,
'image2'=>$img2,
'image3'=>$img3,
'image4'=>$img4,
'image5'=>$img5
]
);
    

return $this->sendResponse($places,"Your logic work");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=Place::query();
       $name=$request->query("name");
       $district=$request->query("district");
       $location=$request->query("location");
       $id=$request->query("id");
      $category=$request->query('category');
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
       if($id)
       {
$query->where('id','LIKE',"%{$id}%");
       }
       if($category)
       {
$query->whereJsonContains('category',$category);
       }
      
      $places=$query->get();
      if($places->isEmpty())
      {
        return $this->sendResponse([],"No places found");

      }
      return $this->sendResponse($places,"Your result");

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
