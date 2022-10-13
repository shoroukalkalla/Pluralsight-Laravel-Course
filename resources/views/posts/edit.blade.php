@extends('layout')

@section('title', 'Update Post '. $post->title)

@section('content')
    <h1>Update Post</h1>
    <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="@error('title') error-border @enderror" value="{{ old('title', $post->title) }}">
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="@error('description') error-border @enderror">{{ old('description', $post->description) }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Update Post</button>
    </form>
@endsection

