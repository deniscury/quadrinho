<?php

namespace Database\Seeders;

use App\Models\Traducao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TraducaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Traducao::create(
            array(
                'nome' => 'Inglês - USA',
                'abreviatura' => 'en-US',
                'idioma_id' => 2
            )
        );

        Traducao::create(
            array(
                'nome' => 'Inglês - EN',
                'abreviatura' => 'en-EN',
                'idioma_id' => 2
            )
        );

        Traducao::create(
            array(
                'nome' => 'Espanhol - CO',
                'abreviatura' => 'es-CO',
                'idioma_id' => 3
            )
        );

        Traducao::create(
            array(
                'nome' => 'Espanhol - ES',
                'abreviatura' => 'es-ES',
                'idioma_id' => 3
            )
        );
    }
}
