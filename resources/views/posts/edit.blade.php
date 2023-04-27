@extends('layout')

@section('content')
    <h1>Редактирование поста</h1>

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="content">Содержание</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
