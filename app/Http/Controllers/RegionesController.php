<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('search'); 
        $region = DB::table('regions')
                ->join('pais','regions.pais_id', '=','pais.id')
                ->select('regions.*','pais.nombre')
                ->where('regions.nombre_region','LIKE','%'.$nombre.'%')
                ->get();
        return view('admin.region.index', compact('region','nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = DB::table('pais')
                    ->select('pais.id','pais.nombre')
                    ->get();
        return view('admin.region.create',compact('pais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_region'                         => ['required', 'string', 'max:255'],
            'altitud'                               => ['required', 'integer'],
            'superficie'                            => ['required', 'integer'],
            'fundacion'                             => ['required', 'string', 'max:255'],
            'poblacion_region'                      => ['required', 'integer'],
            // 'bandera'                               => ['image', 'mimes:jpg,jpeg,png', 'max:5000' ]
        ]);

        if($request->hasFile('bandera')){
            $filename = $request->bandera->getClientOriginalName();
            $region = new Region([
                'nombre_region'                         => $request->nombre_region,
                'altitud'                               => $request->altitud,
                'superficie'                            => $request->superficie,
                'fundacion'                             => $request->fundacion,
                'poblacion_region'                      => $request->poblacion_region,
                'bandera'                               => $request->bandera->storeAs('banderas_region',$filename,'public'),
                'pais_id'                               => $request->pais_id,
            ]);
            $region->save();
        }
        return redirect()->route('regiones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        $pais = Region::find($id)->pais;
        $galeria = DB::table('galerias_regiones')
                    ->select('galerias_regiones.*')
                    ->where('regions_id', '=', $id )
                    ->get();
        return view('admin.region.show',compact('pais','region','galeria'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::find($id);
        $pais = DB::table('pais')
                    ->select('pais.id','pais.nombre')
                    ->get();
        return view('admin.region.edit',compact('region','pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $region = Region::find($id);
        $request->validate([
            'nombre_region'                         => ['required', 'string', 'max:255'],
            'altitud'                               => ['required', 'integer'],
            'superficie'                            => ['required', 'integer'],
            'fundacion'                             => ['required', 'string', 'max:255'],
            'poblacion_region'                      => ['required', 'integer'],
            'bandera'                               => ['image', 'mimes:jpg,jpeg,png', 'max:5000' ]
        ]);
        if($request->hasFile('bandera')){
            $filename = $request->bandera->getClientOriginalName();
            $region->update([
                'nombre_region'                         => $request->nombre_region,
                'altitud'                               => $request->altitud,
                'superficie'                            => $request->superficie,
                'fundacion'                             => $request->fundacion,
                'poblacion_region'                      => $request->poblacion_region,
                'bandera'                               => $request->bandera->storeAs('banderas_region',$filename,'public'),
                'pais_id'                               => $request->pais_id,
            ]);
        }
        else{
                $region->update([
                    'nombre_region'                         => $request->nombre_region,
                    'altitud'                               => $request->altitud,
                    'superficie'                            => $request->superficie,
                    'fundacion'                             => $request->fundacion,
                    'poblacion_region'                      => $request->poblacion_region,
                    // 'bandera'                               => $request->bandera->storeAs('banderas_region',$filename,'public'),
                    'pais_id'                               => $request->pais_id,
            ]);
        }
        $region->save();
        return redirect()->route('regiones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();
        return redirect()->route('paises.index');
    }
}
