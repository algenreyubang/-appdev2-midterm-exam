<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
       
        public function uploadImageLocal(Request $request)
        {
            if ($request->hasFile('image')) {
                Storage::disk('local')->put('/', $request->file('image'));
                return "Image successfully stored in local disk driver.";
            }
            return "No image uploaded.";
        }
    
       
        public function uploadImagePublic(Request $request)
        {
            if ($request->hasFile('image')) {
                Storage::disk('public')->put('/', $request->file('image'));
                return "Image successfully stored in public disk driver.";
            }
            return "No image uploaded.";
        }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['message' => 'Display all products']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Product Creating Successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['message'=> 'Diplay Product :  '. $id ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(['message'=> 'Diplay Product :  '. $id .'Updated Successfully' ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['message' => 'Product with ID: ' . $id . ' deleted successfully']);
    }
}
