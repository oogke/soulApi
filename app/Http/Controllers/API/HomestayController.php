<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;


class HomestayController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homestays= Homestay::all();
        return $this->sendResponse($homestays,"All the homestays");
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
    public function show(string $homestay)
    {
        $homestay= Homestay::all()->where('name',$homestay);
        return $this->sendResponse($homestay,"Requested homestay");
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
