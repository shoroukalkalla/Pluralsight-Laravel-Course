@extends('layout')

@section('title', 'Home')

@section('content')
    @forelse($posts as $post)
        <div class="post-item">
            <div class="post-content">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
            </div>
        </div>
        @empty
            <h1 style="text-align: center">No posts found</h1>
    @endforelse
@endsection
