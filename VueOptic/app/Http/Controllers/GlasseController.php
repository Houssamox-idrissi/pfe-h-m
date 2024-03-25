<?php

namespace App\Http\Controllers;

use App\Models\Glasse;
use Illuminate\Http\Request;

class GlasseController extends Controller
{
    public function homeglasses()
    {
        $glasses = Glasse::with('category', 'type', 'brand')->get();
        return response()->json($glasses);
    }

    public function storeglasses(Request $request)
    {
        $request->validate([
            'Model' => 'required|string',
            'Price' => 'required|numeric',
            'size' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
        ]);

        $image = $request->file('image')->store('public/Glasses');

        $glasses = Glasse::create([
            'Model' => $request->Model,
            'Price' => $request->Price,
            'size' => $request->size,
            'image' => $image,
            'brand_id' => $request->brand_id,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
        ]);

        return response()->json($glasses, 201);
    }

    public function editglasses(Glasse $id)
    {
        return response()->json($id);
    }

    public function updateglasses(Request $request, Glasse $id)
    {
        $request->validate([
            'Model' => 'required|string',
            'Price' => 'required|numeric',
            'size' => 'required|string',
            'image' => 'required',
            'brand_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
        ]);

        $image = $request->file('image')->store('public/category');
      
        $id->update([  
            'name' => $request->name,
            'image' => $image
        ]);


        return response()->json($id, 200);
    }

    public function deleteglasses(Glasse $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }
}
