<?php

namespace App\Forms;

use App\Models\Area;
use Kris\LaravelFormBuilder\Form;

class DisciplinaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('enunciado', 'textarea', [
                'attr' => ['class' => 'ckeditor'],
            ])
            ->add('area_id', 'choice', [
                'label' => 'Area de Conhecimento',
                'choices' => Area::get()->pluck('name', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'selected' => $this->model ? $this->model->area->id : '',
                'multiple' => false,
                'expanded' => false,
            ]);
    }
}
