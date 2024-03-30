<?php

namespace App\Http\Controllers;

use App\Models\LensThickness;
use Illuminate\Http\Request;

class LensThicknessController extends Controller
{
    public function homeLensThikness()
    {
            $lensThickness = LensThickness::all();
            return response()->json($lensThickness);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('public/lensThickness');

        $lensThickness = LensThickness::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        return response()->json(['message' => 'Lens thickness created successfully', 'data' => $lensThickness]);
    }

    public function destroy(LensThickness $lensThickness)
    {
        $lensThickness->delete();

        return response()->json(['message' => 'Lens thickness deleted successfully']);
    }
}
