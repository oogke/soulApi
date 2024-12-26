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
            'image'=> 'array'
            ,'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validatePlace->fails())
        {
           
            return $this->sendError("Validation Error",$validatePlace->errors()->all(),);
        }
        if ($request->hasFile('images')) {
            $images = $request->file('images'); 
            $path=public_path('uploads');
            $newname=[];
            foreach($images as $image)
            {
              $ext=  $image->getClientOriginalExtension();
              $newname[]=uniqid(time(), true).'.'.$ext;
              $image->move($path, $newname[count($newname)-1]); 
            }
          
        }
      $encodedImages=json_encode($newname);
$places= Place::create([
'name' => $request->name,
'description'=> $request->description,
'location' => $request->location,
'category'=> json_encode($request->category),
'district'=> $request->district,
'img'=>$encodedImages
]);

return $this->sendResponse($places,"Your logic work");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $place)
    {
        $place= Place::all()->where('name',$place);
        return $this->sendResponse($place,"Requested Place");
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
