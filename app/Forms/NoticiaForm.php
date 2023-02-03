<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class NoticiaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text fonte')
            ->add('resumo', 'text')
            ->add('texto', 'text')
            ->add('foto_id', 'text');
    }
}
