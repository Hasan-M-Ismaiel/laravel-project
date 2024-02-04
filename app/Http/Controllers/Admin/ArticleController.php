<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //make it paginated
        $articles = Article::with('category','tags')->get();

        return view('admin.articles.index', [
            'articles' => $articles,
            'page' => 'Dashboard'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', [
            'page' => 'Creating Article',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleFormRequest $request)
    {
        $article = Article::create($request->validated());
        
        if ($request->hasFile('image')) {
            $article->addMediaFromRequest('image')->toMediaCollection('articles');
        } 

        $tagsString = $request->tags;
        $tagsCommaSeparatedString = preg_replace('#\s+#',',',trim($tagsString));  
        
        $tagsCommaSeparatedString = explode(",",$tagsCommaSeparatedString);
        foreach ($tagsCommaSeparatedString as $str) {
            $tage = Tag::firstOrCreate([
                'name' => $str
            ]);
            $article->tags()->attach($tage);
        }

        return redirect()->route('admin.articles.index')->with('message', 'the article has been created');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->with('category','tags');
        return view('admin.articles.show', [
            'article' => $article,
            'page' => 'Showing Article'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = $article->tags;
        $article->with('category','tags');
        $tagsString='';
        foreach ( $tags as $tag){
            $tagsString = $tagsString . ' ' .$tag->name;
        }
        return view('admin.articles.edit', [
            'page' => 'Edit Article',
            'article' => $article,
            'categories' => $categories,
            'tagsString' => $tagsString,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleFormRequest $request, Article $article)
    {
        $article->update($request->validated());

        // $media = $article->getFirstMedia('articles');
        //  dd($media->name);
        //delete the old image
        if ($request->hasFile('image')) {
                $article->clearMediaCollection('articles');
                $article->addMediaFromRequest('image')->toMediaCollection('articles');
        }


        $article->tags()->detach();

        $tagsString = $request->tags;
        $tagsCommaSeparatedString = preg_replace('#\s+#',',',trim($tagsString));  
        
        $tagsCommaSeparatedString = explode(",",$tagsCommaSeparatedString);
        foreach ($tagsCommaSeparatedString as $str) {
            $tage = Tag::firstOrCreate([
                'name' => $str
            ]);
            $article->tags()->attach($tage);
        }
        
        return redirect()->route('admin.articles.index')->with('message', 'the article has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('message','the articel has been deleted successfully');
    }
}
