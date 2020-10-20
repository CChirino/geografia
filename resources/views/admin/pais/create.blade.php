@extends('layouts.index-admin')

@section('titulo', 'Crear de Pais')

@section('content')
    <form method="POST" action="{{ route('paises.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container mx-auto">
            <div class="flex flex-wrap mx-auto -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                      Nombre de Pais
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre') is-invalid @enderror" id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                    @error('nombre')
                    <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                    Capital
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('capital') is-invalid @enderror" id="capital" name="capital" type="text" value="{{ old('capital') }}" required autocomplete="capital" autofocus>
                  @error('capital')
                  <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                  @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Idioma
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('idioma') is-invalid @enderror" id="grid-last-name" type="text" id="idioma" name="idioma" type="text" value="{{ old('idioma') }}" required autocomplete="idioma" autofocus>
                  @error('idioma')
                  <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Gentilicio
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('gentilicio') is-invalid @enderror" id="gentilicio" name="gentilicio" type="text" value="{{ old('gentilicio') }}" required autocomplete="gentilicio" autofocus>
                  @error('gentilicio')
                  <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Forma de Gobierno
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('forma_de_gobierno') is-invalid @enderror" id="forma_de_gobierno"  name="forma_de_gobierno" type="text" value="{{ old('forma_de_gobierno') }}" required autocomplete="forma_de_gobierno" autofocus>
                  @error('forma_de_gobierno')
                  <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                  @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                      Superficie en km2
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('superficie') is-invalid @enderror" id="superficie"  name="superficie" type="number" value="{{ old('superficie') }}" required autocomplete="superficie" autofocus>
                    @error('superficie')
                    <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        fronteras en km
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fronteras') is-invalid @enderror" id="fronteras"  name="fronteras" type="number" value="{{ old('fronteras') }}" required autocomplete="fronteras" autofocus>
                    @error('fronteras')
                    <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        linea de costa en km 
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('linea_de_costa') is-invalid @enderror" id="linea_de_costa"  name="linea_de_costa" type="number" value="{{ old('linea_de_costa') }}" required autocomplete="linea_de_costa" autofocus>
                    @error('linea_de_costa')
                    <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        poblacion del pais
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('poblacion_pais') is-invalid @enderror" id="poblacion_pais"  name="poblacion_pais" type="number" value="{{ old('poblacion_pais') }}" required autocomplete="poblacion_pais" autofocus>
                    @error('poblacion_pais')
                    <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        bandera
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('bandera') is-invalid @enderror" id="bandera"  name="bandera" type="file" value="{{ old('bandera') }}" required autocomplete="poblacion_pais" autofocus>
                    @error('bandera')
                    <div class="border border'red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Continente
                  </label>
                  <div class="relative">
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" id="continente_id" name="continente_id">
                        @foreach ($continente as $cont)

                        <option value="{{ $cont->id }}">
                            {{ $cont->nombre_continente}}</option>
                        
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