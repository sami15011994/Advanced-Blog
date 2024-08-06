<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $shouldShowLoginButton = true;
        $lastestPostId = Post::latest()->first()->id ;
        $posts = Post::with('image')->where('id', '!=',$lastestPostId)->paginate(10);
        $latestPost = Post::with('image')->latest()->first();
        return view('posts.home', [ 'posts'=>$posts ,'latestPost' => $latestPost ,'shouldShowLoginButton' =>$shouldShowLoginButton]);
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
        'user_id' => auth()->id(), // Ajouter l'ID de l'utilisateur authentifié);
        
    ]);
        return redirect()->route('posts.home')->with('success', 'Post created successfully!');
    }
    public function show(string $id)
    {
    $post = Post::findOrFail($id);
    $categories= $post->categories ;
    $comments = $post->comments;
     return view('posts.show', compact('post','categories','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.home')->with('error', 'Vous ne pouvez pas éditer ce post.');
        }
    $categories = category::all();
        
         // Exemple de titre et de contenu pour le test
    //$post->title = 'Titre de test';
    //$post->content = 'Contenu de test';
    
        return view('posts.edit',compact('post','categories'));
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
        $post->categories()->detach();
         dd('supprimer');
        $post->delete();
        
        // Rediriger avec un message de succès
        return redirect()->route('posts.home')->with('success', 'Le post a été supprimé avec succès.');
    }



   

   

    public function articles()
    {
        $user = auth()->User();
        $posts= $user->posts;
        return view('posts.articles',compact('posts','user'));
    }

   
}
