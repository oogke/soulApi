<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VehicleHub;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class VehicleHubController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiclehubs= VehicleHub::all();
        return $this->sendResponse($vehiclehubs,"All the vehiclehubs");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'phone' => 'required|string', // phone validation (example format)
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'vehicles' => 'required|array|min:1', // Ensure at least one vehicle
            'vehicles.*' => 'required|string|max:255', // Each vehicle should be a string and not empty
        ]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $vehiclehub)
    {
        $vehiclehub= VehicleHub::all()->where('name',$vehiclehub);
        return $this->sendResponse($vehiclehub,"Requested vehicleHub");
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
