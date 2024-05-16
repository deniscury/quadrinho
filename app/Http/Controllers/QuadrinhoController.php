<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuadrinhoResource;
use App\Http\Resources\QuadrinhosCollection;
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
        return new QuadrinhosCollection(Quadrinho::all());
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
        $quadrinho = Quadrinho::with('editora', 'traducao')->find($quadrinho);

        if ($quadrinho){
            return new QuadrinhoResource($quadrinho);
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
            $path = is_null($request->capa)?'':$request->capa->store('capa', 'public');

            $quadrinho->ano = isset($request->ano)?$request->ano:$quadrinho->ano;
            $quadrinho->nome =  isset($request->nome)?$request->nome:$quadrinho->nome;
            $quadrinho->autor = isset($request->autor)?$request->autor:$quadrinho->autor;
            $quadrinho->capa = $path==''?$quadrinho->capa:$path;
            $quadrinho->editora_id = isset($request->editora_id)?$request->editora_id:$quadrinho->editora_id;
            $quadrinho->traducao_id = isset($request->traducao_id)?$request->traducao_id:$quadrinho->traducao_id;

            if($quadrinho->save()){
                return $quadrinho;
            }
            else{
                return response()->json(array(
                    'message' => 'Erro ao atualizar quadrinho.'
                ), 404);
            }
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
