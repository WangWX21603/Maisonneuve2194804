<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Article::selectArticle();
        return view('article.index', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('article.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'titre' => 'required|min:2|max:200',
            'titre_fr'=> 'required|min:2|max:200',
            'contenu' => 'required',
            'contenu_fr' => 'required',
        ]);


        $newArticle = Article::create([
            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,            
            'contenu_fr' => $request->contenu_fr,
            'user_id' =>  Auth::user()->id         
        ]);

        return redirect()->back()->withSuccess(trans('lang.msg_success_article'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $user = Auth::user();
        return View('article.show', ['article' => $article,'user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return View('article.edit', ['article' => $article]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'titre' => 'required|min:2|max:200',
            'titre_fr'=> 'required|min:2|max:200',
            'contenu' => 'required',
            'contenu_fr' => 'required',
        ]);

        
        $article->update([
            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,            
            'contenu_fr' => $request->contenu_fr,
        ]);

        return redirect()->back()->withSuccess(trans('lang.msg_success_article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return  redirect(route('article.index'));
    }
}
