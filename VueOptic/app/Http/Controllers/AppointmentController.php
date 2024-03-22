<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'appointment_datetime' => 'required|date',
            'message' => 'nullable|string',
        ]);

        Appointment::create($request->all());

        return response()->json(['message' => 'Appointment created successfully'], 201);
    }
}
