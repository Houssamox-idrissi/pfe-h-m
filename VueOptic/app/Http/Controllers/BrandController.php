<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function homeBrand()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

    public function brandForm()
    {
        return view('Admin.brand.formbrand');
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15',
            'image' => 'required',
        ]);
        
        $image = $request->file('image')->store('public/brand');

        $brand = Brand::create([
            'name' => $request->name,
            'image' => $image,
        ]);

        return response()->json($brand, 201);
    }

    public function editBrand(Brand $id)
    {
        return response()->json($id);
    }

    public function updateBrand(Request $request, Brand $id)
    {
        $request->validate([
            'name' => 'required|max:15',
            'image' => 'required'
        ]);

        $image = $request->file('image')->store('public/brand');

        $id->update([
            'name' => $request->name,
            'image' => $image,
        ]);

        return response()->json($id, 200);
    }

    public function deleteBrand(Brand $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }
}
