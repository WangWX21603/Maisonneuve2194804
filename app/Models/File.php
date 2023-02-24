<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_fr',
        'path',
        'user_id',
    ];


    public function fileHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function selectFile(){
        $lang = session()->get('localeDB');
        $query = File::select(
        'id', 
        'user_id', 
        DB::raw("(case when titre$lang is null then titre else titre$lang end) as titre"), 
        'created_at' 
        )
        ->orderby('created_at', 'desc')
        ->simplePaginate(10);
        return $query;
    }

}
