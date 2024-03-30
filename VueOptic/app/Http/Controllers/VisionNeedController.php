<?php

namespace App\Http\Controllers;

use App\Models\VisionNeed;
use Illuminate\Http\Request;

class VisionNeedController extends Controller
{
    public function homeVisionNeeds()
    {
            $visionNeeds = VisionNeed::all();
            return response()->json($visionNeeds);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);
        $img = $request->file('image')->store('public/visionNeed');

        $visionNeed = VisionNeed::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$img,
        ]);

        return response()->json(['message' => 'Vision need created successfully', 'data' => $visionNeed]);
    }

    
    public function destroy(VisionNeed $visionNeed)
    {
        $visionNeed->delete();

        return response()->json(['message' => 'Vision need deleted successfully']);
    }
}
