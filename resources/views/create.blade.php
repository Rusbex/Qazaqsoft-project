@extends('layout')

@section('content')
    <div class="container">
        <h1>Создать пост</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="body">Содержание</label>
                <textarea class="form-control" id="body" name="body" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Фото</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
