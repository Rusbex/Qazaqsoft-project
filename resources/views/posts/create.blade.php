@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создать новый пост</h2>
            </div>
        </div>
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

    <div class="comment-form-wrap pt-5">
        <h3 class="mb-5">Leave a comment</h3>
        <form method="POST" enctype="multipart/form-data" action="{{ route('posts.store') }}" class="p-3 p-md-5 bg-light">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок*</label>
                <input type="text" name="title" class="form-control" placeholder="Введите заголовок">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="image">Выберете изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="content">Описание*</label>
                <textarea name="content" id="content" class="form-control" placeholder="Ведите коментарий"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>

        </form>
    </div>

@endsection

