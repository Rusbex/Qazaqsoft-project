@extends('layout')

@section('content')
    <h1>Список постов</h1>

    <ul>  @if(count($posts) > 0)
        @foreach ($posts as $post)
            <li class="embed-responsive-4by3">
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a> <span>{{ $post->created_at }}</span>
                <p>{{ $post->content }}</p>
            </li>
        @endforeach
            @else
                <p>Постов пока нет.</p>
            @endif
    </ul>
@endsection
