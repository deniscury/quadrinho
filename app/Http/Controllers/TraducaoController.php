<?php

namespace App\Http\Controllers;

use App\Http\Resources\TraducaoResource;
use App\Http\Resources\TraducoesCollection;
use App\Models\Traducao;
use Illuminate\Http\Request;

class TraducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TraducoesCollection(Traducao::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Traducao::create($request->all())){
            return response()->json(array(
                'message' => 'Tradução cadastrado com sucesso'
            ), 201);
        }

        return response()->json(array(
            'message' => 'Erro ao cadastrar o tradução.'
        ), 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traducao  $traducao
     * @return \Illuminate\Http\Response
     */
    public function show($traducao)
    {
        $traducao = Traducao::with('idioma', 'quadrinhos')->find($traducao);

        if ($traducao){
            return new TraducaoResource($traducao);
        }

        return response()->json(array(
            'message' => 'Tradução não encontrado.'
        ), 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traducao  $traducao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $traducao)
    {
        $traducao = Traducao::find($traducao);
        if ($traducao){
            $traducao->update($request->all());

            return $traducao;
        }

        return response()->json(array(
            'message' => 'Tradução não encontrado.'
        ), 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traducao  $traducao
     * @return \Illuminate\Http\Response
     */
    public function destroy($traducao)
    {
        $traducao = Traducao::find($traducao);

        if ($traducao){
            Traducao::destroy($traducao);

            return response()->json(array(
                'message' => 'Tradução excluído com sucesso.'
            ), 404);
        }

        return response()->json(array(
            'message' => 'Tradução não encontrado.'
        ), 404);
    }
}
