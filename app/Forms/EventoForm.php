<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class EventoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text')
            ->add('resumo', 'text')
            ->add('texto', 'text')
            ->add('data_ini', 'text')
            ->add('data_fim', 'text')
            ->add('hora_ini', 'text')
            ->add('hora_fim', 'text')
            ->add('status', 'text');
    }
}
