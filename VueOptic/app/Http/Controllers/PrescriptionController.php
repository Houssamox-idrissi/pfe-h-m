<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
  
    public function index(){
        $pres = Prescription::all();
        return response()->json($pres);

    }


    public function store(Request $request)
    {
 
         $request->validate([
            'image' => 'required|image', 
            'phone' => 'nullable|numeric',
        ]);
       
        $img = $request->file('image')->store('public/prescription');

        $prescription=Prescription::create([
          'image' => $img,
          'phone' => $request->phone
        ]);

        return response()->json(['message' => 'Prescription created successfully', 'data' => $prescription], 201);
    }

    public function destroy(Prescription $prescription)

    {
      $prescription->delete();

        return response()->json(['message' => 'Prescription deleted successfully']);
    }
}
