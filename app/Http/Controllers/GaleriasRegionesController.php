<?php

namespace App\Http\Controllers;

use App\Models\GaleriasRegione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GaleriasRegionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('search'); 
        $region = DB::table('galerias_regiones')
                ->join('regions','galerias_regiones.regions_id', '=','regions.id')
                ->select('galerias_regiones.*','regions.nombre_region')
                ->where('regions.nombre_region','LIKE','%'.$nombre.'%')
                ->get();
        return view('admin.galerias_regiones.index', compact('region','nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region = DB::table('regions')
                ->select('regions.id','regions.nombre_region','regions.bandera')
                ->get();
        return view('admin.galerias_regiones.create',compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagenes')){
            $filename = $request->imagenes->getClientOriginalName();
            $galerias_regiones = new GaleriasRegione([
                'imagenes'                                          => $request->imagenes->storeAs('galerias_pais',$filename,'public'),
                'regions_id'                                        => $request->regions_id,
            ]);
            $galerias_regiones->save();
        }
        return redirect()->route('galerias-regiones.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galerias_pais = GaleriasRegione::find($id);
        $galerias_pais->delete();
        return redirect()->route('galerias-regiones.index');
    }
}
