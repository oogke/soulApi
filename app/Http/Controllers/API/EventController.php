<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;


class EventController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return $this->sendResponse($events,"All the events occuring now");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
$image1->move(public_path().'/uploads/event/'.$img1);
$image2->move(public_path().'/uploads/event/'.$img2);
$image3->move(public_path().'/uploads/event/'.$img3);
$image4->move(public_path().'/uploads/event/'.$img4);
$image5->move(public_path().'/uploads/event/'.$img5);
//images
$event=Event::create([
    'name'=>$request->name,
    'district'=>$request->district,
    'description'=>$request->description,
    'location'=>$request->location,
    'category'=>$request->category,
    'organizer'=>$request->organizer,
    'ticket_price'=>$request->ticket_price,
    'start_date'=>$request->start_date,
    'end_date'=>$request->end_date,
    'start_time'=>$request->start_time,
    'end_time'=>$request->end_time,
    'phone'=>$request->phone,
    'email'=>$request->email,
    'image1'=>$img1,
    'image2'=>$img2,
    'image3'=>$img3,
    'image4'=>$img4,
    'image5'=>$img5,
]);
return $this->sendResponse($event,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $event)
    {
        $event=Event::all()->where('name',$event);
        return $this->sendResponse($event,"Requested Event");
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
