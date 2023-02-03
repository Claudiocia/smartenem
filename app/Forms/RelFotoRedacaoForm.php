<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RelFotoRedacaoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('foto_id', 'text')
            ->add('redacao_id', 'text');
    }
}
