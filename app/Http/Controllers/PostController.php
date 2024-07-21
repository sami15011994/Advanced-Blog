<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Post;
use App\Models\category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $lastestPostId = Post::latest()->first()->id ;
        $posts = Post::with('image')->where('id', '!=',$lastestPostId)->paginate(10);
        $latestPost = Post::with('image')->latest()->first();
        return view('posts.home', [ 'posts'=>$posts ,'latestPost' => $latestPost]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Créer et sauvegarder le nouveau post
        $post = Post::create(['title' => $request->input('title'),
        'content' => $request->input('content'),
        'category_id' => $request->input('category_id'),
        //'user_id' => auth()->id(), // Ajouter l'ID de l'utilisateur authentifié);
        'user_id' => 10,
    ]);
        return redirect()->route('posts.home')->with('success', 'Post created successfully!');
    }
    public function show(string $id)
    {
     //$post = Post::findOrFail($id);
    // Exemple de données de test pour simuler un post
    $post = new \stdClass();
    $post->id = $id;
    $post->title = 'Titre du Post';
    $post->content = 'Contenu du Post...';

    $category = new \stdClass();
    $category->name = 'Catégorie du Post';

    $user = new \stdClass();
    $user->name = 'Auteur du Post';

    $post->category = $category;
    $post->user = $user;
    $post->created_at = now();
     return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $post = Post::findOrFail($id);
        $categories = category::all();
         // Exemple de titre et de contenu pour le test
    //$post->title = 'Titre de test';
    //$post->content = 'Contenu de test';
        return view('posts.create',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'required|array|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->route('posts.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        // Rediriger avec un message de succès
        return redirect()->route('posts.home')->with('success', 'Le post a été supprimé avec succès.');
    }


/*
   

    public function about()
    {
        return view('posts.create');
    }

    public function contact(Request $request)
    {
        return view('posts.create');
    }

    public function articles()
    {
        return view('posts.create');
    }
*/    
}
