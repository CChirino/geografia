@extends('layouts.index-admin')

@section('titulo', 'Ver Pais')

@section('content')

<form >
  <div class="container mx-auto">
    <div class="flex flex-wrap mx-auto -mx-3 mb-6">
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            bandera
        </label>
        <img src="{{asset('storage/'.$galerias_pais->imagenes) }}" width="200">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            Pais
          </label>
          <div class="relative">
            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" id="pais_id" name="pais_id" disabled>
                <option value="{{ $pais->pais_id }}" >
                    {{ $pais->nombre}}</option>
            </select>

          </div>
        </div>
        <div>
          <button class="btn btn-blue">
            <a href="{{route('regiones.index')}}">Atras</a>
          </button>
        </div>
    </div>
</div>
</form>

@endsection