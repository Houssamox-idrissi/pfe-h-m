<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;    

class TypeController extends Controller
{
    public function homeType()
    {
        $types = Type::all();
        return response()->json($types);
    }

    public function typeForm()
    {
        return view('Admin.type.formtype');
    }

    public function storeType(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15',
            'image' => 'required',
        ]);
        
        $image = $request->file('image')->store('public/type');

        $type = Type::create([
            'name' => $request->name,
            'image' => $image,
        ]);

        return response()->json($type, 201);
    }

    public function editType(Type $id)
    {
        return response()->json($id);
    }

    public function updateType(Request $request, Type $id)
    {
        $request->validate([
            'name' => 'required|max:15',
            'image' => 'required'
        ]);
        
        $image = $request->file('image')->store('public/type');

        $id->update([
            'name' => $request->name,
            'image' => $image,
        ]);

    }

    public function deleteType(Type $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }
}
