@extends('layout')

@section('title', $post->title)

@section('content')
        <div class="post-item">
            <div class="post-content">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <a href="{{route('posts.edit',['post'=>$post->id])}}">Edit post</a>
                <form method="POST" action="{{route('posts.destroy',[$post])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete">Delete post</button>
                </form>
            </div>
        </div>
@endsection
