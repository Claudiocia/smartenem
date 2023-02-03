<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin[] = array(
            array(
                'name' => 'Claudio Souza',
                'email' => 'claudiosouza.cia@gmail.com',
                'email_verified_at' => now(),
                'smartphone' => '71999094687',
                'regid' => null,
                'role' => User::ROLE_ADMIN,
                'password' => bcrypt('91316445'),
            )
        );

        foreach ($userAdmin as $user) {
            DB::table('users')->insert($user);
        }

        $areas[] = array(
            array(
                'name' => 'Ciências Humanas e suas Tecnologias',
                'enunciado' => 'A área de Ciências Humanas apresenta um conteúdo que busca testar se o estudante está
                                atualizado sobre o que acontece no mundo atual e entende as relações desses eventos com
                                o passado. Mais do que decorar datas e fatos históricos o conteúdo costuma relacionar a
                                vida atual com temas ligados à diversidade cultural, conflitos políticos, desafios
                                econômicos, movimentos sociais, o papel das instituições, entre outros.'
            ),
            array(
                'name' => 'Ciências da Natureza e suas Tecnologias',
                'enunciado' => 'A área Ciências da Natureza e suas tecnologias tem como objetivo demonstrar como se
                                aplicam os conhecimentos das matérias em diferentes contextos. Nesse sentido é fundamental
                                ler com bastante atenção os enunciados das questões onde o conhecimento é problematizado.
                                O mais importante é entender como essas ciências se relacionam com os maiores desafios
                                do nosso tempo, e o seu impacto na vida cotidiana. '
            ),
            array(
                'name' => 'Linguagens, Códigos e suas Tecnologias',
                'enunciado' => 'Esta área é composta de várias matérias e todas elas têm em comum: conhecimentos que ajudam
                a gente a se comunicar. O conteúdo além de temas relacionadas às normas da língua, gêneros textuais e
                interpretação de texto, também abordam os movimentos artísticos, saberes culturais, linguagem corporal,
                entre outros. Nessa área também está inserida um segundo idioma que é outro ponto importante. O estudante
                pode escolher entre inglês e espanhol.'
            ),
            array(
                'name' => 'Matemática e suas Tecnologias',
                'enunciado' => 'A matemática tem uma área exclusiva para os seus assuntos. E eles abordam geometria,
                estatística, regra de três, álgebra, probabilidade e todo conteúdo da matéria. Apesar de ser uma área de
                ciências exatas o foco é testar o raciocínio lógico do estudante aplicando os ensinamentos em problemas
                do dia a dia. Portanto você verá como a matemática se aplica na sua vida diária e lhe ajuda a entender
                melhor as tarefas.'
            )
        );

        foreach ($areas as $area) {
            DB::table('areas')->insert($area);
        }
    }
}
