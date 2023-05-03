@extends('layout')

@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold text-body-emphasis">{{ $post->title }}</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">{{ $post->content }}</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary btn-lg px-4 me-sm-3">Редактировать</a>
                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-secondary btn-lg px-4" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    </div>
    <section class="py-5">
    <h3 class="mb-5 font-weight-bold">Коментарии</h3>
    @foreach($post->comments as $comment)
        <div class="pt-5 mt-5">
            <ul class="comment-list">
                <li class="comment">
                    {{--                    <div class="vcard bio">--}}
                    {{--                        <img src="images/person_1.jpg" alt="Image placeholder">--}}
                    {{--                    </div>--}}
                    <div class="comment-body">
                        <h3>{{ $comment->content }}</h3>
                        <div class="meta">{{ $comment->created_at }}</div>
                        @if($comment->image)
                            <img src="{{ asset('storage/images/' . $comment->image) }}" alt="Comment image"
                                 style="width: 300px">
                        @endif
                        <p>
                            <a href="{{ route('comments.edit', ['post' => $post->id, 'comment' => $comment->id]) }}">Редактировать</a>
                        </p>
                    </div>
                </li>
            </ul>
            @endforeach
        </div>
    </section>

        <section class="py-5 bg-light px-4 py-5 my-5">
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form method="POST" enctype="multipart/form-data" action="{{ route('comments.store', $post->id) }}" class="p-3 p-md-5 bg-light">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="image">Выберете изображение</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                    <div class="form-group">
                        <label for="content">Коментарий*</label>
                        <textarea name="content" id="content" class="form-control" placeholder="Ведите коментарий"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-primary">Создать</button>
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
        </section>

        <!-- END comment-list -->
        @endsection
