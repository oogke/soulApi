<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;


class GuideController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides= Guide::all();
        return $this->sendResponse($guides,"All the guides datas");
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
    public function show(string $guide)
    {
        $guide= Guide::all()->where('firstname',$guide);
        return $this->sendResponse($guide,"Requested Guide");
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
