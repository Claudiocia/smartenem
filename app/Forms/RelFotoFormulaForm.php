<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RelFotoFormulaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('foto_id', 'text')
            ->add('formula_id', 'text');
    }
}
