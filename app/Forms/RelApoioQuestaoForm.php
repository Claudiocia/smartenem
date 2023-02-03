<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RelApoioQuestaoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('questao_id', 'text')
            ->add('apoio_id', 'text');
    }
}
