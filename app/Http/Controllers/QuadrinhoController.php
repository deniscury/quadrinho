<?php

namespace App\Http\Controllers;

use App\Models\Quadrinho;
use Illuminate\Http\Request;

class QuadrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quadrinho::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Quadrinho::create($request->all())){
            return response()->json(array(
                'message' => 'Quadrinho cadastrado com sucesso'
            ), 201);
        }

        return response()->json(array(
            'message' => 'Erro ao cadastrar o quadrinho.'
        ), 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quadrinho  $quadrinho
     * @return \Illuminate\Http\Response
     */
    public function show($quadrinho)
    {
        $quadrinho = Quadrinho::find($quadrinho);

        if ($quadrinho){
            $quadrinho->editora;
            $quadrinho->capitulos;

            return $quadrinho;
        }

        return response()->json(array(
            'message' => 'Quadrinho não encontrado.'
        ), 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quadrinho  $quadrinho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quadrinho)
    {
        $quadrinho = Quadrinho::find($quadrinho);
        if ($quadrinho){
            $quadrinho->update($request->all());

            return $quadrinho;
        }

        return response()->json(array(
            'message' => 'Quadrinho não encontrado.'
        ), 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quadrinho  $quadrinho
     * @return \Illuminate\Http\Response
     */
    public function destroy($quadrinho)
    {
        $quadrinho = Quadrinho::find($quadrinho);

        if ($quadrinho){
            Quadrinho::destroy($quadrinho);

            return response()->json(array(
                'message' => 'Quadrinho excluído com sucesso.'
            ), 404);
        }

        return response()->json(array(
            'message' => 'Quadrinho não encontrado.'
        ), 404);
    }
}
