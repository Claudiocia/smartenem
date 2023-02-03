<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FotoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name_orig', 'text', [
                'label' => 'Nome Referencia',
                'label_attr' => ['class' => 'text-show-700']
            ])
            ->add('name', 'text', [
                'label' => 'Nome',
                'label_attr' => ['class' => 'text-show-700'],
                'attr' => ['disabled' => 'disabled']
            ])
            ->add('path', 'text', [
                'label' => 'Caminho',
                'label_attr' => ['class' => 'text-show-700'],
                'attr' => ['disabled' => 'disabled']
            ])
            ->add('credito', 'text', [
                'label' => 'Crédito',
                'label_attr' => ['class' => 'text-show-700']
            ])
            ->add('legenda', 'text', [
                'label' => 'Legenda',
                'label_attr' => ['class' => 'text-show-700']
            ])
            ->add('aplic', 'choice', [
                'label' => 'Aplicação',
                'label_attr' => ['class' => 'text-show-700 control-label'],
                'choices' => ['Apoio' => 'Apoio',
                              'Evento' => 'Evento', 'Fórmula' => 'Fórmula',
                              'Notícia' => 'Notícia', 'Redação' => 'Redação' ],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->ativo : 'Selecione...',
                'multiple' => false,
                'expanded' => true,
            ]);
    }
}
