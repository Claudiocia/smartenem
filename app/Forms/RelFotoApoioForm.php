<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RelFotoApoioForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('foto_id', 'text')
            ->add('apoio_id', 'text');
    }
}
