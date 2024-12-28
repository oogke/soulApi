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
