@extends('layouts.index-admin')

@section('titulo', 'Crear de Pais')

@section('content')
    <form method="POST" action="{{ route('galerias-paises.store') }}" enctype="multipart/form-data" >
        @csrf
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-3 mb-2">
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
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                      imagenes
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('imagenes') is-invalid @enderror" id="imagenes"  name="imagenes" type="file" value="{{ old('imagenes') }}" required autocomplete="poblacion_pais" autofocus>
                    @error('imagenes')
                    <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                    @enderror
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
