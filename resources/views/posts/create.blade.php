@extends('layout')

@section('title', 'Create Post')

@section('content')
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="@error('title') error-border @enderror" value="{{ old('title') }}">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="@error('description') error-border @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Create Post</button>
    </form>
@endsection

