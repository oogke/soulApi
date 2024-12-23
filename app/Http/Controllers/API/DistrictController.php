<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;


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
