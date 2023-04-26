<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
class CommentController extends Controller
{
    // Отображение формы для создания нового комментария
    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    // Сохранение нового комментария в базу данных
    public function store(Request $request, Post $post)
    {
        $request->validate([

        ]);

        $comment = new Comment([
            'content' => $request->get('content'),
            'post_id' => $request->get('post_id')
        ]);

        $comment->save();

        return back()->with('success', 'Комментарий успешно создан!');
    }

    // Отображение формы для редактирования комментария
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', compact('post', 'comment'));
    }

    // Обновление информации о комментарии в базе данных
    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        // Обновляем комментарий
        $comment->body = $request->get('body');
        $comment->save();

        return redirect('/posts/' . $post->id)->with('success', 'Комментарий успешно обновлен!');
    }

    // Удаление комментария из базы данных
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect('/posts/' . $post->id)->with('success', 'Комментарий успешно удален!');
    }
}
