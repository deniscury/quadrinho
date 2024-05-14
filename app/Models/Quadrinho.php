<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quadrinho extends Model
{
    use HasFactory;

    protected $fillable = array('ano', 'nome', 'autor', 'editora_id');

    public function editora(){
        return $this->belongsTo(Editora::class);
    }

    public function capitulos(){
        return $this->hasMany(Capitulo::class);
    }
}
