<?php

namespace App\Http\Controllers;

use App\Models\LensPerformance;
use Illuminate\Http\Request;

class LensPerformanceController extends Controller
{
    public function homeLensPerformance()
    {
            $lensPerformance = LensPerformance::all();
            return response()->json($lensPerformance);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('public/lensPerformances');

        $lensPerformance = LensPerformance::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        return response()->json(['message' => 'Lens performance created successfully', 'data' => $lensPerformance]);
    }

    public function destroy(LensPerformance $lensPerformance)
    {
        $lensPerformance->delete();

        return response()->json(['message' => 'Lens performance deleted successfully']);
    }
}
