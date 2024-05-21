<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;

    protected $fillable = array('nome', 'resumo', 'quadrinho_id');

    public function scopeFilters($query, array $filters){
        if($filters['capitulo']){
            $query->find($filters['capitulo']);
        }

        return $query;
    }

    public function quadrinho(){
        return $this->belongsTo(Quadrinho::class);
    }
}
