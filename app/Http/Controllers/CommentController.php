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
            'content' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
//            'file' => 'file|mimes:png,jpg,jpeg'
        ]);

        $comment = new Comment([
            'content' => $request->get('content'),
            'post_id' => $request->get('post_id'),
//            'author_id' => auth()->id(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $comment->image = $filename;
        }

        $comment->save();

        return redirect()->back()->with('success', 'Комментарий успешно создан!');
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
            'content' => 'required',
        ]);

        $comment->content = $request->get('content');
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
