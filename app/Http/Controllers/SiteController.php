<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function lerQuadrinho($traducao, $quadrinho = null, $capitulo = null){
        $capitulos = Capitulo::whereHas('quadrinho', function($query) use ($traducao, $quadrinho) {
            $query->whereHas('traducao', function($query) use ($traducao){
                $query->where('abreviatura', $traducao);
            });

            $query->when($quadrinho, function($query) use ($quadrinho){
                $query->where('id', $quadrinho);
            });

        })->filters(array(
            'capitulo' => $capitulo
        ))->get();

        return response($capitulos, 200);
    }
}
