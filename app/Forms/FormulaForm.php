<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FormulaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('aplic', 'text')
            ->add('descri', 'text')
            ->add('disciplina_id', 'text')
            ->add('foto_id', 'text');
    }
}
