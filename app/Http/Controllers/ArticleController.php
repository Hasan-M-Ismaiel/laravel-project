<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //make it paginated
        $articles = Article::all();

        return view('user.articles.index', [
            'articles' => $articles
        ]);
    }
   
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('user.articles.show', [
            'article' => $article
        ]);
    }

}
