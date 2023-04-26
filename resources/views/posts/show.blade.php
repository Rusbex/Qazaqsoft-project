@extends('layout')

@section('content')
    <div class="">
        <h1>{{ $post->title }}</h1>
        <span>{{ $post->id }}</span>
        <span>{{ $post -> created_at }}</span>
    </div>
    <div>
        <h3>Описание:</h3>
        <p>{{ $post->content }}</p>
    </div>

    <h3>Комменты</h3>
    <p>{{ $comment->content }}</p>



    <div class="row">
        <p>Add a Comment</p>
        <form method="POST" action="{{ route('comments.store', $post->id) }}">
            @csrf
            <div>
                <label for="content">Comment:</label>
                <textarea name="content" id="content"></textarea>
            </div>
            <div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit">Add comment</button>
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Упс!</strong> Произошла ошибка при вводе данных.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
