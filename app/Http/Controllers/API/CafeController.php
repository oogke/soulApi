<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class CafeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $cafes= Cafe::all();
    return $this->sendResponse($cafes,"All the cafes");
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
