<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traducao extends Model
{
    use HasFactory;

    protected $table = 'traducoes';
    protected $fillable = array('nome', 'abreviatura', 'idioma_id');

    public function idioma(){
        return $this->belongsTo(Idioma::class);
    }

    public function quadrinhos(){
        return $this->hasMany(Quadrinho::class);
    }
}
