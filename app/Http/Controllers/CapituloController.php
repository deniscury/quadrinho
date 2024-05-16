<?php

namespace App\Http\Controllers;

use App\Http\Resources\CapituloResource;
use App\Http\Resources\CapitulosCollection;
use App\Models\Capitulo;
use Illuminate\Http\Request;

class CapituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CapitulosCollection(Capitulo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Capitulo::create($request->all())){
            return response()->json(array(
                'message' => 'Capitulo cadastrada com sucesso'
            ), 201);
        }

        return response()->json(array(
            'message' => 'Erro ao cadastrar o capitulo.'
        ), 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capitulo  $capitulo
     * @return \Illuminate\Http\Response
     */
    public function show($capitulo)
    {
        $capitulo = Capitulo::with('quadrinho')->find($capitulo);

        if ($capitulo){
            return new CapituloResource($capitulo);
        }

        return response()->json(array(
            'message' => 'Capitulo não encontrada.'
        ), 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Capitulo  $capitulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $capitulo)
    {
        $capitulo = Capitulo::find($capitulo);

        if ($capitulo){
            $capitulo->update($request->all());

            return $capitulo;
        }

        return response()->json(array(
            'message' => 'Capitulo não encontrada.'
        ), 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capitulo  $capitulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($capitulo)
    {
        $capitulo = Capitulo::find($capitulo);

        if ($capitulo){
            Capitulo::destroy($capitulo);

            return response()->json(array(
                'message' => 'Capitulo excluída com sucesso.'
            ), 404);
        }

        return response()->json(array(
            'message' => 'Capitulo não encontrada.'
        ), 404);
    }
}
