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
            'category'=>'required|array'
        ]);
        if($validatePlace->fails())
        {
           
            return $this->sendError("Validation Error",$validatePlace->errors()->all(),);
        }

$places= Place::create([
'name' => $request->name,
'description'=> $request->description,
'location' => $request->location,
'category'=> json_encode($request->category)
]);

return $this->sendResponse($places,"Your logic work");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
