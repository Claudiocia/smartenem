<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DicaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text')
            ->add('categoria', 'text')
            ->add('texto', 'text');
    }
}
