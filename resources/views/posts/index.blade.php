@extends('layout')

@section('content')
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $post->title }}</h3>
                            <div class="mb-1 text-muted">{{ $post->created_at }}</div>
                            <p class="card-text mb-auto">{{ $post->content }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="stretched-link">Подробнее</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text></svg>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>Постов пока нет.</p>
    @endif

@endsection
