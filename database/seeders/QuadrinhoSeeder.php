<?php

namespace Database\Seeders;

use App\Models\Quadrinho;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuadrinhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'ano' => 2024,
                'nome' => 'Odisseia (Graphic Disney)',
                'autor' => 'Donald Soffritti, Roberto Gagnor',
                'editora_id' => 1,
                'traducao_id' => 2
            ),
            array(
                'ano' => 1938,
                'nome' => 'Superman',
                'autor' => 'Jerry Siegel, Joe Shuster ',
                'editora_id' => 2,
                'traducao_id' => 3
            ),
            array(
                'ano' => 2009,
                'nome' => 'Blue Exorcist',
                'autor' => 'Katou Kazue',
                'editora_id' => 4,
                'traducao_id' => 4
            ),
            array(
                'ano' => 2024,
                'nome' => 'The Beginning After the End',
                'autor' => 'TurtleMe',
                'editora_id' => 5,
                'traducao_id' => 5
            )
        );

        Quadrinho::insert($data);
    }
}
