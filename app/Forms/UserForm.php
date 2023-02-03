<?php

namespace App\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        if ($this->model != null) {
            $data = Carbon::parse($this->model->valid)->format('Y-m-d');
        }
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => ['required'],
                'attr' => ['placeholder' => 'Informe seu nome']
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => ['required', 'email'],
                'attr' => ['placeholder' => 'Informe um email válido']
            ])
            ->add('smartphone', 'text', [
                'label' => 'Celular',
                'rules' => ['required', 'numeric'],
                'attr' => ['placeholder' => 'Digite apenas numeros com o ddd']
            ])
            ->add('role', 'choice', [
                'label' => 'Tipo de Usuário',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['2' => 'Cliente', '1' => 'Administrador', '3' => 'Assinante'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? [$this->model->role] : [2],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('valid', 'date', [
                'label' => 'Validade da Assinatura',
                'value' => $this->model ? $data : '',
                'attr' => ['class' => 'campo-data'],
            ]);
    }
}
