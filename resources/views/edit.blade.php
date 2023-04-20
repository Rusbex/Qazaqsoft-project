@extends('layout')

@section('content')
    <div class="container">
        <h1>Редактировать комментарий</h1>
        <form method="POST" action="{{ route('comments.update', [$post->id, $comment->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="body">Текст комментария</label>
                <textarea id="body" name="body" class="form-control">{{ $comment->body }}</textarea>
                @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
