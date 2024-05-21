<?php

namespace Database\Seeders;

use App\Models\Idioma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Idioma::create(
            array(
                'nome' => 'Inglês'
            )
        );

        Idioma::create(
            array(
                'nome' => 'Espanhol'
            )
        );

        Idioma::create(
            array(
                'nome' => 'Japonês'
            )
        );

        Idioma::create(
            array(
                'nome' => 'Frances'
            )
        );
    }
}
