<?php

namespace Database\Seeders;

use App\Models\Capitulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapituloSeeder extends Seeder
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
                'nome' => 'Odisseia',
                'resumo' => 'A paródia em quadrinhos do poema homérico que narra a conturbada volta para casa de Odisseu após a Guerra de Troia! Neste álbum divertidíssimo, Mickey é o herói, Pateta faz as vezes do poeta e Tio Patinhas interpreta Zeus, a mais poderosa divindade do Monte Olimpo. Minnie, no papel de Penélope, enrola como pode os pretendentes ao trono de Ítaca, enquanto Margarida, como Atena, protege os protagonistas. Vale destacar que o sempre distraído Peninha está hilário como Hermes, o atrapalhado mensageiro dos deuses! A edição traz ainda entrevistas com os autores e curiosidades de bastidores.',
                'quadrinho_id' => 4
            ),
            array(
                'nome' => 'Action Comics 1',
                'resumo' => 'Superman ou Super-Homem é um super-herói de histórias em quadrinhos publicadas pela DC Comics. O personagem, entretanto, desde os anos 1930, já foi adaptado para diversos outros meios, como cinema, rádio, televisão, literatura e videogame.',
                'quadrinho_id' => 5
            ),
            array(
                'nome' => 'Satã rindo',
                'resumo' => 'Rin Okumura sempre levou uma vida de adolescente normal até que ele descobriu que ele é o filho do rei demônio, Satã. Satã tentou arrastar Rin de volta para Gehenna ao possuir seu pai adotivo Shirō Fujimoto. Isto levou a Rin despertar seus poderes demoníacos e na morte do Padre Fujimoto. Rin decide que ele não é nem um demônio ou um ser humano, mas sim um Exorcista.',
                'quadrinho_id' => 6
            ),
            array(
                'nome' => 'Volume 02',
                'resumo' => 'O rei Gray é um governante notável com um reinado próspero, mas, no entanto... a opulência e o sucesso não podem enterrar o vazio e a solidão. Seu tempo como rei, contudo, chega a um fim abrupto e ele reencarna como Arthur Leywin – um bebê nascido em um mundo de magia e monstros. Equipado com memórias de sua vida anterior e o desejo de proteger o calor recém-descoberto que o cerca, Art começa sua jornada para se tornar um poderoso guerreiro mais uma vez. Treinamento de espada, formação de núcleo de mana, estudos de magia – Art faz tudo para ser o mais poderoso possível! Mas será o suficiente para repelir as forças perigosas que ameaçam sua segunda chance na vida…? A versão imprensa do famoso webtoon.',
                'quadrinho_id' => 7
            )
        );

        Capitulo::insert($data);
    }
}
