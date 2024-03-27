<?php

namespace App\Http\Controllers;
use App\Models\post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        $imageFiles = ['janeth-presenting.png', '5.png', 'janeth.png', 'filter.png'];

        // Pass posts and image files to the view
        return View::make('homepage')->with(['posts' => $posts, 'imageFiles' => $imageFiles]);
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create($request->all());


        return redirect()->route('create')->with('success', 'Content Uploaded Successifuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('auth.create', compact('post'));
    }
    
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
    
        return redirect()->route('dashboard')->with('success', 'Post updated successfully');
        
    }
    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully');
    }
    
}
