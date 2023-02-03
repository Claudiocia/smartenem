<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Disciplinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="panel-heading-admin">
                    <div class="form-search">
                        <h5>Cadastrar nova disciplina</h5>
                    </div>
                </div>
                <div class="panel-admin">
                    <div class="row btn-new-reset" id="user">
                        <div class="btn-hero">
                            <p><a href="{{route('admin.disciplinas.index')}}" class="btn btn-primary btn-assinar">Voltar</a></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px; margin-right: 10px;">
                        <?php $icon = '<i class="fas fa-save"></i>'; ?>
                        {!!
                                form($form->add('salvar', 'submit', [
                                    'attr' => ['class' => 'btn btn-primary btn-block estilo-btn', 'style' => 'width:120px'],
                                    'label' => $icon.' Salvar'
                                 ]))
                         !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

