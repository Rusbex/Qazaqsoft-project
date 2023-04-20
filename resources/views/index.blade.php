@extends('layout')

@section('content')
    <div class="container">
        <h1>Список постов</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Создать пост</a>
        @if(count($posts) > 0)
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->body }}</p>
                                <small>Автор: {{ $post->user->name }}</small>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Редактировать</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Постов пока нет.</p>
        @endif
    </div>
@endsection
