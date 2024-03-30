<?php

namespace App\Http\Controllers;

use App\Models\LensType;
use Illuminate\Http\Request;

class LensTypeController extends Controller
{
    public function homeLensType()
    {
            $lensType = LensType::all();
            return response()->json($lensType);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('public/lensTypes');

        $lensType = LensType::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        return response()->json(['message' => 'Lens type created successfully', 'data' => $lensType]);
    }

    public function destroy(LensType $lensType)
    {
        $lensType->delete();

        return response()->json(['message' => 'Lens type deleted successfully']);
    }
}
