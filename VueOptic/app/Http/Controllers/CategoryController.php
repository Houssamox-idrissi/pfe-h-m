<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function homecategory()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function cateForm()
    {
        return response()->json([], 200);
    }

    public function storecat(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);

        $img = $request->file('image')->store('public/category');

        $category = Category::create([
            'name' => $request->name,
            'image' => $img,
        ]);

        return response()->json($category, 201);
    }

    public function editcat(Category $id)
    {
        return response()->json($id);
    }

    public function updateCategory(Request $request, Category $id)
    {
        $request->validate([
            'name' => 'required|max:15',
            'image' => 'required'
        ]);
        $image = $request->file('image')->store('public/category');
      
        $id->update([  
            'name' => $request->name,
            'image' => $image
        ]);

        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    public function deletecat(Category $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }
}

