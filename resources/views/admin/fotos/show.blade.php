<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fotos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="panel-heading-admin">
                    <div class="form-search">
                        <h5><span>Detalhes da Foto</span></h5>
                    </div>
                </div>
                <div class="panel-admin">
                    <div class="row btn-new-reset" id="user">
                        <div class="btn-hero">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><span class="aviso">Confirme sua ação</span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <span class="aviso">Você tem certeza que deseja deletar esta foto?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('form-delete').submit();">Deletar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $formDelete = FormBuilder::plain([
                                'id' => 'form-delete',
                                'route' => ['admin.fotos.destroy', 'foto' => $foto->id],
                                'method' => 'DELETE',
                                'style' => 'display:none',
                            ]); ?>
                            {!!form($formDelete)!!}

                        </div>
                    </div>

                    <div class="row" style="margin-left: 10px; margin-right: 10px;">
                        <!-- AQUI começa colagem -->
                        <div id="register-show">
                            <div class="row image-show">
                                <div class="col-4">
                                    <img src="{{asset($foto->path)}}" >
                                </div>
                                <div class="col-8">
                                    <div class="nome-foto">
                                        <h6 class="block font-medium text-sm text-show-700 label-show">Nome</h6>
                                        <div class="texto-show">
                                            {{ $foto->name_orig }}
                                        </div>
                                    </div>
                                    <div class="nome-foto">
                                        <h6 class="block font-medium text-sm text-show-700 label-show">Legenda</h6>
                                        <div class="texto-show">
                                            {{ $foto->legenda }}
                                        </div>
                                    </div>
                                    <div class="nome-foto">
                                        <h6 class="block font-medium text-sm text-show-700 label-show">Crédito</h6>
                                        <div class="texto-show">
                                            {{$foto->credito}}
                                        </div>
                                    </div>
                                    <div class="nome-foto">
                                        <h6 class="block font-medium text-sm text-show-700 label-show">Aplicação</h6>
                                        <div class="texto-show">
                                            {{$foto->aplic}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row button-show">
                                <div class="col-4">
                                    <p><a href="{{route('admin.fotos.index')}}" class="btn btn-success btn-show" style="margin-top: 18px;">Voltar</a></p>
                                </div>
                                <div class="col-4">
                                    <p><a href="{{route('admin.fotos.edit', [ 'foto' => $foto->id ])}}" class="btn btn-primary btn-show" style="margin-top: 18px;">Editar</a></p>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-danger btn-show" style="height: 36px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Deletar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Aqui termina a colagem -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
