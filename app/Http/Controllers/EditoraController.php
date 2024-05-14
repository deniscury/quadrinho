<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Editora::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Editora::create($request->all())){
            return response()->json(array(
                'message' => 'Editora cadastrada com sucesso'
            ), 201);
        }

        return response()->json(array(
            'message' => 'Erro ao cadastrar o editora.'
        ), 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function show($editora)
    {
        $editora = Editora::find($editora);

        if ($editora){
            $editora->quadrinhos;

            return $editora;
        }

        return response()->json(array(
            'message' => 'Editora não encontrada.'
        ), 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $editora)
    {
        $editora = Editora::find($editora);

        if ($editora){
            $editora->update($request->all());

            return $editora;
        }

        return response()->json(array(
            'message' => 'Editora não encontrada.'
        ), 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function destroy($editora)
    {
        $editora = Editora::find($editora);

        if ($editora){
            Editora::destroy($editora);

            return response()->json(array(
                'message' => 'Editora excluída com sucesso.'
            ), 404);
        }

        return response()->json(array(
            'message' => 'Editora não encontrada.'
        ), 404);
    }
}
