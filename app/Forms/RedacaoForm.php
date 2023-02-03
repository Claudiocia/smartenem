<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RedacaoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('tema', 'text')
            ->add('ano', 'text')
            ->add('titulo', 'text')
            ->add('apresent', 'text');
    }
}
