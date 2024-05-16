<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdiomaResource;
use App\Http\Resources\IdiomasCollection;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new IdiomasCollection(Idioma::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Idioma::create($request->all())){
            return response()->json(array(
                'message' => 'Idioma cadastrado com sucesso'
            ), 201);
        }

        return response()->json(array(
            'message' => 'Erro ao cadastrar o idioma.'
        ), 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show($idioma)
    {
        $idioma = Idioma::with('traducoes')->find($idioma);

        if ($idioma){
            return new IdiomaResource($idioma);
        }

        return response()->json(array(
            'message' => 'Idioma não encontrado.'
        ), 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idioma)
    {
        $idioma = Idioma::find($idioma);
        if ($idioma){
            $idioma->update($request->all());

            return $idioma;
        }

        return response()->json(array(
            'message' => 'Idioma não encontrado.'
        ), 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($idioma)
    {
        $idioma = Idioma::find($idioma);

        if ($idioma){
            Idioma::destroy($idioma);

            return response()->json(array(
                'message' => 'Idioma excluído com sucesso.'
            ), 404);
        }

        return response()->json(array(
            'message' => 'Idioma não encontrado.'
        ), 404);
    }
}
