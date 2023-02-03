<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RelFotoNoticiaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('foto_id', 'text')
            ->add('noticia_id', 'text');
    }
}
