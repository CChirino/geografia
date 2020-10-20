<?php

namespace Database\Seeders;

use App\Models\Continente;
use Illuminate\Database\Seeder;

class ContinenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Continente::create([
            'nombre_continente' => 'Asia',
            'tamaño'            => 43810000,
            'poblacion'         => 3879000000		
        ]);
        Continente::create([
            'nombre_continente' => 'América',
            'tamaño'            => 42330000,
            'poblacion'         => 910000000			
        ]);
        Continente::create([
            'nombre_continente' => 'África',
            'tamaño'            => 30370000,
            'poblacion'         => 922011000			
        ]);
        Continente::create([
            'nombre_continente' => 'Antártida',
            'tamaño'            => 13720000,
            'poblacion'         => 1000		
        ]);
        Continente::create([
            'nombre_continente' => 'Europa',
            'tamaño'            => 10180000,
            'poblacion'         => 731000000		
        ]);
        Continente::create([
            'nombre_continente' => 'Antártida',
            'tamaño'            => 8720710,
            'poblacion'         => 27000000			
        ]);
    }
}
