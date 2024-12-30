<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::all();
        return $this->sendResponse($categories,"all Categories");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
        $category=Category::create([
            'category'=>$request->category,
        ]);
        return $this->sendResponse($category,"Data inserted Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        $category= Category::all()->where('category',$category);
        return $this->sendResponse($category,"Requested category");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
        ]);
        if($validate->fails())
        {
            return $this->sendError("Validation Error" ,$validate->errors()->all(),402);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=category::where('id',$id)->first();
        if(!$category)
        {
            return $this->sendError("category not found", [], 404);
        }
     $query=  $category->delete();
     if($query)
     {
               return $this->sendResponse([],"successfully deleted");

     }
    }
}
