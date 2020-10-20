<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GaleriasPai;
use App\Models\Pais;


class GaleriasPaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('search'); 
        $pais = DB::table('galerias_pais')
                ->join('pais','galerias_pais.pais_id', '=','pais.id')
                ->select('galerias_pais.*','pais.nombre')
                ->where('pais.nombre','LIKE','%'.$nombre.'%')
                ->get();
        return view('admin.galerias_pais.index', compact('pais','nombre'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = DB::table('pais')
            ->select('pais.id','pais.nombre','pais.bandera')
            ->get();
        return view('admin.galerias_pais.create',compact('pais'));
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
            $galerias_pais = new GaleriasPai([
                'imagenes'                                      => $request->imagenes->storeAs('galerias_pais',$filename,'public'),
                'pais_id'                                       => $request->pais_id,
            ]);
            $galerias_pais->save();
        }
        return redirect()->route('galerias-paises.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Pais::get();
        $galerias_pais = GaleriasPai::find($id);
        return view('admin.region.show',compact('pais','galerias_pais'));

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
        $galerias_pais = GaleriasPai::find($id);
        $galerias_pais->delete();
        return redirect()->route('galerias-paises.index');
    }
}
