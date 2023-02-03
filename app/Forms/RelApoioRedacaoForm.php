<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RelApoioRedacaoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('redacao_id', 'text')
            ->add('apoio_id', 'text');
    }
}
