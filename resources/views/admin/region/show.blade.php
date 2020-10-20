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
        <img src="{{asset('storage/'.$region->bandera) }}" width="200">
      </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
              Nombre de la Region
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre_region') is-invalid @enderror" id="nombre_region" name="nombre_region" type="text" value="{{ $region->nombre_region }}" required autocomplete="nombre_region" autofocus disabled>
            @error('nombre_region')
            <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
            @enderror
          </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            altitud
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('altitud') is-invalid @enderror" id="altitud"  name="altitud" type="number" value="{{ $region->altitud }}" required autocomplete="altitud" autofocus disabled>
          @error('altitud')
          <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
          @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            superficie
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('superficie') is-invalid @enderror" id="superficie"  name="superficie" type="number" value="{{ $region->superficie }}" required autocomplete="superficie" autofocus disabled>
          @error('superficie')
          <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
          @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            fundacion
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fundacion') is-invalid @enderror" id="fundacion" name="fundacion" type="text" value="{{ $region->fundacion }}" required autocomplete="fundacion" autofocus disabled>
          @error('fundacion')
          <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
          @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            poblacion region
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('poblacion_region') is-invalid @enderror" id="poblacion_region"  name="poblacion_region" type="number" value="{{ $region->poblacion_region }}" required autocomplete="poblacion_region" autofocus disabled>
          @error('poblacion_region')
          <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
          @enderror
        </div>
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
        <h3>Imagenes</h3>
        <div class="flex mb-4 pt-5 pb-10 mb-5">
          @foreach ($galeria as $g)
          <div class="w-1/3 bg-gray-400 h-12 ml-5 mr-5">
            <img src="{{asset('storage/'.$g->imagenes) }}">                  
          </div>
          @endforeach
        </div>
        <div class="pb-8"></div>
        {{-- <div>
          <button class="btn btn-blue">
            <a href="{{route('regiones.index')}}">Atras</a>
          </button>
        </div> --}}
    </div>
</div>
</form>

@endsection