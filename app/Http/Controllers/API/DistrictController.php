<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;



class DistrictController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= District::all();
        return $this->sendResponse($data,"all Districts");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'description' => 'required|string|max:500',  // Adjust max length as needed
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
        $district=District::create([
            'name'=>$request->name,
            'province'=>$request->province,
            'description'=>$request->description
        ]);
        return $this->sendResponse($district,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
   $districtname=$request->query('name');
   $province=$request->query('province');
   $id=$request->query('id');
   $query=District::query();
   if($districtname)
   {
    $query->where('name','LIKE',"%{$districtname}%");
   }
if($province)
{
    $query->where('province','LIKE',"%{$province}%");

}
if($id)
{
    $query->where('id','LIKE',"%{$id}%");

}


 $districts=$query->get(); 

 if($districts->isEmpty())
 {
    return $this->sendResponse([],"No result found");
 }
return $this->sendResponse($districts,"Your Result");
   }
        
      
 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'description' => 'required|string|max:500',  // Adjust max length as needed
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district=District::where('id',$id)->first();
        if(!$district)
        {
            return $this->sendError("district not found", [], 404);
        }
     $query=  $district->delete();
     if($query)
     {
               return $this->sendResponse([],"successfully deleted");

     }
    }
}
