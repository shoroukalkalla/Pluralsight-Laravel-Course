@extends('layout')

@section('title', $post->title)

@section('content')
        <div class="post-item">
            <div class="post-content">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                @can('update', $post)
                <a href="{{route('posts.edit',['post'=>$post->id])}}">Edit post</a>
                @endcan
                @can('delete', $post)
                <form method="POST" action="{{route('posts.destroy',[$post])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete">Delete post</button>
                </form>
                @endcan
                <small>Posted by <b>{{$post->user->name}}</b></small>
            </div>
        </div>
@endsection
