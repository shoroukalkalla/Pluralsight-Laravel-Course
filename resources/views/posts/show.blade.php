@extends('layout')

@section('title', $post->title)

@section('content')
        <div class="post-item">
            <div class="post-content">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <a href="{{route('posts.edit',['post'=>$post->id])}}">Edit post</a>
            </div>
        </div>
@endsection
