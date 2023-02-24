<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_fr',
        'contenu',
        'contenu_fr',
        'user_id',
    ];

    public function articleHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function selectArticle(){
        $lang = session()->get('localeDB');
        $query = Article::select(
        'id', 
        'user_id', 
        DB::raw("(case when titre$lang is null then titre else titre$lang end) as titre"), 
        DB::raw("(case when contenu$lang is null then contenu else contenu$lang end) as contenu"), 
        'created_at' 
        )
        ->orderby('created_at', 'desc')
        ->simplePaginate(12);

        return $query;
    }

}
