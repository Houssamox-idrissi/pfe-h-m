<?php
namespace App\Http\Controllers;

use App\Models\Lense;
use App\Models\VisionNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LenseController extends Controller
{
    public function storeVisionNeed(Request $request)
    {
        $validatedData = $request->validate([
            'vision_need_id' => 'required|exists:vision_needs,id',
            'glasses_id' => 'required|exists:glasses,id', // Add validation for glasses_id
        ]);
    
        $visionNeed = VisionNeed::findOrFail($validatedData['vision_need_id']);
        $lens = new Lense();
        $lens->vision_need_id = $visionNeed->id;
        $lens->glasses_id = $validatedData['glasses_id']; // Set the glasses_id
        $lens->save();
    
        return response()->json(['message' => 'Vision need stored successfully']);
    }
    

    public function storePrescription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'glasses_id' => 'required|exists:glasses,id',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $imagePath = $request->file('image')->store('public/Prescription');

        Lense::create([
            'glasses_id' => $request->glasses_id,
            'image' => $imagePath,
        ]);

        return response()->json(['message' => 'Prescription stored successfully']);
    }

    public function storeLensType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'glasses_id' => 'required|exists:glasses,id',
            'lens_type_id' => 'required|exists:lens_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $lens = new Lense();
        $lens->lens_type_id = $request->lens_type_id;
        $lens->save();

        return response()->json(['message' => 'Lens type stored successfully']);
    }

    public function storeLensPerformance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'glasses_id' => 'required|exists:glasses,id',
            'lens_performance_id' => 'required|exists:lens_performances,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $lens = new Lense();
        $lens->lens_performance_id = $request->lens_performance_id;
        $lens->save();

        return response()->json(['message' => 'Lens performance stored successfully']);
    }

    public function storeLensThickness(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'glasses_id' => 'required|exists:glasses,id',
            'lens_thickness_id' => 'required|exists:lens_thicknesses,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $lens = new Lense();
        $lens->lens_thickness_id = $request->lens_thickness_id;
        $lens->save();

        return response()->json(['message' => 'Lens thickness stored successfully']);
    }

    public function storeLens(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'glasses_id' => 'required|exists:glasses,id',
            'vision_need_id' => 'required|exists:vision_needs,id',
            'image' => 'required|image',
            'lens_type_id' => 'required|exists:lens_types,id',
            'lens_performance_id' => 'required|exists:lens_performances,id',
            'lens_thickness_id' => 'required|exists:lens_thicknesses,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $imagePath = $request->file('image')->store('public/lense');

        $lens = new Lense();
        $lens->fill($request->all());
        $lens->image = $imagePath;
        $lens->save();

        return response()->json(['message' => 'Lens created successfully']);
    }
}
