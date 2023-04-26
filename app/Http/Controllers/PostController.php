<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Отображение списка всех постов
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Отображение формы для создания нового поста
    public function create()
    {
        return view('posts.create');
    }

    // Сохранение нового поста в базу данных
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => '',
            'author_id' => '',
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),

        ]);

        $post->author_id = $post->id;
        $post->save();

        return redirect('/posts')->with('success', 'Пост успешно создан!');
    }

    // Отображение информации об одном посте
    public function show(Post $post)
    {
        $post = Post::with('comments')->find($post->id);
        $comment = Comment::find(1); // замените 1 на id комментария

        return view('posts.show', compact('post', 'comment'));
    }

    // Отображение формы для редактирования поста
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Обновление информации о посте в базе данных
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->save();

        return redirect('/posts')->with('success', 'Пост успешно обновлен!');
    }

    // Удаление поста из базы данных
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Пост успешно удален!');
    }
}
