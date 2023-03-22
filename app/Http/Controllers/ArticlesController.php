<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;

class ArticlesController extends Controller
{
    public function index() 
    {
        $articles = Article::with('user')->orderBy('created_at', 'desc')->get();

        return view('articles.articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with(['comments' => function ($query) {
            $query->with('user');
        }])->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $user = User::find(1);
        $request['user_id'] = $user->id;

        $this->validate($request,[
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
        ]);
        $art = Article::create($request->all());
        return redirect('/articles')->with(['success_message' => 'Larticle a été crée !']);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article) 
    {
    $article->update($request->all());
   
    }

    public function delete ( Article $article)
    {
        $article->delete();
    }
}
