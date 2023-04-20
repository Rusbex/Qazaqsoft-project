@extends('layout')

@section('content')
    <div>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
    </div>

    <div>
        <h2>Add a Comment</h2>
        <form method="POST" action="{{ route('comments.store', $post) }}">
            @csrf
            <div>
                <label for="body">Comment:</label>
                <textarea name="body" id="body"></textarea>
            </div>
            <div>
                <button type="submit">Add comment</button>
            </div>
        </form>
    </div>
@endsection
