@extends('layouts.index-admin')

@section('titulo', 'Editar de Pais')

@section('content')
<form method="POST" action="{{ route('regiones.update',$region->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
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
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre_region') is-invalid @enderror" id="nombre_region" name="nombre_region" type="text" value="{{ $region->nombre_region }}" required autocomplete="nombre_region" autofocus>
              @error('nombre_region')
              <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
              @enderror
            </div>
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
              altitud
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('altitud') is-invalid @enderror" id="altitud"  name="altitud" type="number" value="{{ $region->altitud }}" required autocomplete="altitud" autofocus>
            @error('altitud')
            <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
              superficie
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('superficie') is-invalid @enderror" id="superficie"  name="superficie" type="number" value="{{ $region->superficie }}" required autocomplete="superficie" autofocus>
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
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fundacion') is-invalid @enderror" id="fundacion" name="fundacion" type="text" value="{{ $region->fundacion }}" required autocomplete="fundacion" autofocus>
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
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('poblacion_region') is-invalid @enderror" id="poblacion_region"  name="poblacion_region" type="number" value="{{ $region->poblacion_region }}" required autocomplete="poblacion_region" autofocus>
            @error('poblacion_region')
            <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                  bandera
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('bandera') is-invalid @enderror" id="bandera"  name="bandera" type="file" value="{{ $region->bandera }}" required autocomplete="bandera" autofocus>
              @error('bandera')
              <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
              @enderror
          </div>
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
              Pais
            </label>
            <div class="relative">
              <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" id="pais_id" name="pais_id">
                  @foreach ($pais as $p)

                  <option value="{{ $p->id }}">
                      {{ $p->nombre}}</option>
                  
                  @endforeach    

              </select>

            </div>
          </div>
          <div>
              <button class="btn btn-blue">
              Guardar
            </button>
          </div>
      </div>
  </div>
</form>
@endsection

