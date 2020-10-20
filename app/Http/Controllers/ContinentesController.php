<?php

namespace App\Http\Controllers;

use App\Models\Continente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContinentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('search'); 
        $pais = DB::table('continentes')
            ->select('continentes.*','')
            ->where('continentes.nombre_continente','LIKE','%'.$nombre.'%')
            ->get();
        return view('admin.continentes.index', compact('pais','nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function show(Continente $continente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function edit(Continente $continente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Continente $continente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continente $continente)
    {
        //
    }
}
