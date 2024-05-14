<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;

    protected $fillable = array('nome', 'resumo', 'quadrinho_id');

    public function quadrinho(){
        return $this->belongsTo(Quadrinho::class);
    }
}
