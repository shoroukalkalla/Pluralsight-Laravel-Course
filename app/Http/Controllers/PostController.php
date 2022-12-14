<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();

        $request->user()->posts()->create($validated);

        //$post = new Post();
        //$post->title = $request->input('title');
        //$post->description = $request->input('description');
        //$post->save();

        return redirect()
            ->route('posts.create')
            ->with('success', 'Post created successfully!!');
        //Title: ' .
        //$post->input('title') . 'Description: ' .
        //$post->input('description'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Post::findOrFail($id));
        return view('posts.edit', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        $this->authorize('update', Post::findOrFail($id));

        $validated = $request->validated();

        $post = Post::findOrFail($id);

        $post->update($validated);

        //$post->title = $request->input('title');
        //$post->description = $request->input('description');
        //$post->save();

        return redirect()
            ->route('posts.show', ['post'=>$post->id])
            ->with('success', 'Post updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Post deleted successfully!!');
    }
}
