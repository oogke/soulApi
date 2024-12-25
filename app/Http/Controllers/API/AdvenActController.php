<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AdvenAct;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;


class AdvenActController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $advenActs= AdvenAct::all();
       return $this->sendResponse($advenActs,"All adventure");
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
    public function show(string $advenact)
    {
        $advenact=AdvenAct::all()->where('name',$advenact);
        return $this->sendResponse($advenact,"Requested data");
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
