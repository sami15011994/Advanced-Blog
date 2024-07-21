<?php

namespace App\Http\Controllers;


use view;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index()
    { 
        $categories = category::all();
        return view ('posts.categories', compact('categories'));
    }
    public function show(Request $request)
{
    $categoryId = $request->input('category');
    $category = Category::findOrFail($categoryId);
    $posts = $category->posts()->paginate(10);

    return response()->json($posts);
}

}
