<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class QuestaoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('enunciado', 'text')
            ->add('apoio', 'text')
            ->add('option_a', 'text')
            ->add('option_b', 'text')
            ->add('option_c', 'text')
            ->add('option_d', 'text')
            ->add('option_e', 'text')
            ->add('resp', 'text')
            ->add('coment', 'text')
            ->add('ano_aplic', 'text')
            ->add('valor', 'text')
            ->add('quest_ouro', 'text')
            ->add('disciplina_id', 'text');
    }
}
