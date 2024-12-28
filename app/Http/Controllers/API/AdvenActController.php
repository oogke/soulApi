<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AdvenAct;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


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
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'district' => 'required',
            'description' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'is_seasonal' => 'required', 
            'email' => 'required|email',
            'website' => 'required|url',
            'bestSeason' => 'required|array',
            'bestSeason.*' => 'required|string', 
            'requirements' => 'required|array',
            'requirements.*' => 'required|string', 
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'image5' => 'nullable|image',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }

//image
$image1=$request->image1;
$image2=$request->image2;
$image3=$request->image3;
$image4=$request->image4;
$image5=$request->image5;
$ext1=$image1->getClientOriginalExtension();
$ext2=$image2->getClientOriginalExtension();
$ext3=$image3->getClientOriginalExtension();
$ext4=$image4->getClientOriginalExtension();
$ext5=$image5->getClientOriginalExtension();
$img1=time().".".$ext1;
$img2=time().".".$ext2;
$img3=time().".".$ext3;
$img4=time().".".$ext4;
$img5=time().".".$ext5;




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
