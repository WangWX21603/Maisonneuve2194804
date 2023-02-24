<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nom',
        'adresse',
        'phone',
        'email',
        'dateNaissance',
        'villeId',
    ];
    
    public function etudiantHasVille(){
        return $this->hasOne('App\Models\Ville', 'id', 'villeId');
    }


}
