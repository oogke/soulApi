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
    public function show(string $district)
    {
        $district =District::all()->where('name',$district);
        return $this->sendResponse($district,'Single District');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
