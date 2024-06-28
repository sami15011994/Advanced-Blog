<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
public function search(Request $request)
{
$query = $request->input('q');
$results = Post::search($query)->get();
// ... display search results
}
}
    