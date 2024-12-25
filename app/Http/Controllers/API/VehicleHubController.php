<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VehicleHub;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

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
        //
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
