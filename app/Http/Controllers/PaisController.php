<?php

namespace App\Http\Controllers;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('search'); 
        $pais = DB::table('pais')
            ->join('continentes','pais.continente_id', '=','continentes.id')
            ->select('pais.*','continentes.nombre_continente')
            ->where('pais.nombre','LIKE','%'.$nombre.'%')
            ->get();
        return view('admin.pais.index', compact('pais','nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continente = DB::table('continentes')
                    ->select('continentes.id','continentes.nombre_continente')
                    ->get();
        return view('admin.pais.create',compact('continente'));
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
            'nombre'                        => ['required', 'string', 'max:255'],
            'capital'                       => ['required', 'string', 'max:255'],
            'idioma'                        => ['required', 'string', 'max:255'],
            'gentilicio'                    => ['required', 'string', 'max:255'],
            'forma_de_gobierno'             => ['required', 'string', 'max:255'],
            'superficie'                    => ['required', 'integer'],
            'fronteras'                     => ['required', 'integer'],
            'linea_de_costa'                => ['required', 'integer'],
            'poblacion_pais'                => ['required', 'integer'],
            'bandera'                       => ['image', 'mimes:jpg,jpeg,png', 'max:5000' ]
        ]);

        if($request->hasFile('bandera')){
            $filename = $request->bandera->getClientOriginalName();
            $pais = new Pais([
                'nombre'                        => $request->nombre,
                'capital'                       => $request->capital,
                'idioma'                        => $request->idioma,
                'gentilicio'                    => $request->gentilicio,
                'forma_de_gobierno'             => $request->forma_de_gobierno,
                'superficie'                    => $request->superficie,
                'fronteras'                     => $request->fronteras,
                'linea_de_costa'                => $request->linea_de_costa,
                'poblacion_pais'                => $request->poblacion_pais,
                'bandera'                       => $request->bandera->storeAs('banderas_pais',$filename,'public'),
                'continente_id'                 => $request->continente_id,
            ]);
            $pais->save();

        }
        return redirect()->route('paises.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $pais = Pais::find($id);
        $continente = Pais::find($id)->continente;
        $galeria = DB::table('galerias_pais')
                    ->select('galerias_pais.*')
                    ->where('pais_id', '=', $id )
                    ->get();
        return view('admin.pais.show',compact('pais','continente','galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::find($id);
        $continente = DB::table('continentes')
                        ->select('continentes.id','continentes.nombre_continente')
                        ->get();
        return view('admin.pais.edit',compact('continente','pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pais = Pais::find($id);
        $request->validate([
            'nombre'                        => ['required', 'string', 'max:255'],
            'capital'                       => ['required', 'string', 'max:255'],
            'idioma'                        => ['required', 'string', 'max:255'],
            'gentilicio'                    => ['required', 'string', 'max:255'],
            'forma_de_gobierno'             => ['required', 'string', 'max:255'],
            'superficie'                    => ['required', 'integer'],
            'fronteras'                     => ['required', 'integer'],
            'linea_de_costa'                => ['required', 'integer'],
            'poblacion_pais'                => ['required', 'integer'],
            'bandera'                       => ['image', 'mimes:jpg,jpeg,png', 'max:5000' ]
        ]);

        if($request->hasFile('bandera')){
            $filename = $request->bandera->getClientOriginalName();
            $pais->update([
                'nombre'                        => $request->nombre,
                'capital'                       => $request->capital,
                'idioma'                        => $request->idioma,
                'gentilicio'                    => $request->gentilicio,
                'forma_de_gobierno'             => $request->forma_de_gobierno,
                'superficie'                    => $request->superficie,
                'fronteras'                     => $request->fronteras,
                'linea_de_costa'                => $request->linea_de_costa,
                'poblacion_pais'                => $request->poblacion_pais,
                'bandera'                       => $request->bandera->storeAs('banderas_pais',$filename,'public'),
                'continente_id'                 => $request->continente_id,
            ]);
        }
        else{
                $pais->update([
                'nombre'                        => $request->nombre,
                'capital'                       => $request->capital,
                'idioma'                        => $request->idioma,
                'gentilicio'                    => $request->gentilicio,
                'forma_de_gobierno'             => $request->forma_de_gobierno,
                'superficie'                    => $request->superficie,
                'fronteras'                     => $request->fronteras,
                'linea_de_costa'                => $request->linea_de_costa,
                'poblacion_pais'                => $request->poblacion_pais,
                // 'bandera'                       => $request->bandera->storeAs('banderas_pais',$filename,'public'),
                'continente_id'                 => $request->continente_id,
            ]);
        }
        $pais->save();
        return redirect()->route('paises.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = Pais::find($id);
        $pais->delete();
        return redirect()->route('paises.index');
    }
}
