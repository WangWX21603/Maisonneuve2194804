<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorys';

    static public function selectCategory(){
        $lang = null;
        if(session()->has('locale') && session()->get('locale') == 'fr'):
            $lang = '_fr';
        endif;
        
        $query = Category::select('id', 
        DB::raw("(case when category$lang is null then category else category$lang end) as category")
        )
        ->orderby('category')
        ->get();
        return $query;
    }

}
