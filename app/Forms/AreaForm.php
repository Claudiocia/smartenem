<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AreaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('enunciado', 'text');
    }
}
