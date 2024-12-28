<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


class HotelController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return $this->sendResponse($hotels,"All the Hotels");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate =Validator::make($request->all(), [
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $hotel)
    {
        $hotel= Hotel::all()->where('name',$hotel);
        return $this->sendResponse($hotel,"Requested Hotel");
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
