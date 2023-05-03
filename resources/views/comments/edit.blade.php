@extends('layout')

@section('content')
    <h1>Редактирование поста</h1>

    <form method="POST" action="{{ route('comments.update', ['post' => $post->id, 'comment' => $comment->id]) }}">
    @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Содержание</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ $comment->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
