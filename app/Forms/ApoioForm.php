<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ApoioForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text')
            ->add('subtitulo', 'text')
            ->add('texto', 'text')
            ->add('assinatura', 'text')
            ->add('fonte', 'text')
            ->add('referencia', 'text');
    }
}
