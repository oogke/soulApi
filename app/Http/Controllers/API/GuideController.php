<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


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
        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits:10', 
            'dob' => 'required|date',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:guides,email',
            'websites' => 'nullable|url',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|file|mimes:pdf,docx|max:2048',
            'citizenship_card_no' => 'required|string|max:20',
            'citizenship_card_front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'citizenship_card_back' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate' => 'nullable|file|mimes:pdf,docx|max:2048',
            'languages' => 'required|array',
            'languages.*' => 'string|max:255',
            'experiences' => 'required|array',
            'experiences.*' => 'string|max:255',
        ]);
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
