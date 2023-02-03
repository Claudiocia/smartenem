<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RelFotoQuestaoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('foto_id', 'text')
            ->add('questao_id', 'text');
    }
}
