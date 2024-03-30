<?php

namespace App\Http\Controllers;

use App\Models\Eyeexam;
use Illuminate\Http\Request;

class EyeexamController extends Controller
{

    public function HomeExam(){
        $eyeExam = Eyeexam::all();
        return response()->json($eyeExam);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'appointment_datetime' => 'required|date',
            'message' => 'nullable|string',
        ]);

        Eyeexam::create($request->all());

        return response()->json(['message' => 'Appointment created successfully'], 201);
    }

    public function destroy( Eyeexam $appointmentId){
        $appointmentId->delete();
        return response()->json(null, 204);
    }
}
