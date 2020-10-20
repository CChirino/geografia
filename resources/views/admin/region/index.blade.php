@extends('layouts.index-admin')

@section('titulo', 'Lista de Paises')

@section('content')
<div>
  <form role="search">
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="search"  name="search" type="text" value="{{$nombre}}" placeholder="Buscar por region y presionar enter,si no quieres buscar nada dejas el espacio en blanco y presionas enter">
  </form>
</div>
@if ($nombre)
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
Los resultados para la busqueda '{{$nombre}}' son:
</div>
@endif
<table class="table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">Bandera</th>
        <th class="px-4 py-2">Nombre</th>
        <th class="px-4 py-2">Fundacion</th>
        <th class="px-4 py-2">Pais</th>
        <th class="px-4 py-2" colspan="3">Transacciones</th>

      </tr>
    </thead>
    <tbody>
        @foreach($region as $r)
      <tr>
        <td class="border px-8 py-2">
          <img src="{{asset('storage/'.$r->bandera) }}" width="200">
        </td>
        <td class="border px-8 py-2">{{$r->nombre_region}}</td>
        <td class="border px-8 py-2">{{$r->fundacion}}</td>
        <td class="border px-8 py-2">{{$r->nombre}}</td>
        <td class="border px-8 py-2">
          <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="far fa-eye"></i> 
            <span><a href="{{ route('regiones.show',$r->id) }}"> Ver</a></span>
          </button>
        </td>
        <td class="border px-8 py-2"><a href="">
          </a><button class="bg-yellow-300 hover:bg-yellow-400 text-yellow-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="far fa-edit"></i> 
            <span><a href="{{ route('regiones.edit',$r->id) }}"> Editar</a></span>
          </button>
        </td>
        <td class="border px-8 py-2">
          <form action="{{ route('regiones.destroy',$r->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center" onclick="return confirm('Desea Borrar?');">
              <i class="fas fa-trash"></i>
              <span><a href=""> Eliminar</a></span>
            </button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

