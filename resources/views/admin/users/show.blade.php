<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="panel-heading-admin">
                    <div class="form-search">
                        <h5>Dados do usuário: <span class="aviso">{{$user->name}}</span></h5>
                        @if (session()->has('msg'))
                            <div class="alert alert-success campo-data" role="alert">
                                <div class="flex">
                                    <div>
                                        <p class="text-sm">{{ session('msg') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="panel-admin">
                    <div class="row btn-new-reset" id="user">
                        <div class="btn-hero">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-assinar" style="height: 38px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Deletar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><span class="aviso">Confirme sua ação</span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <span class="aviso">Você tem certeza que deseja deletar o registro?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('form-delete').submit();">Deletar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><a href="{{route('admin.users.index')}}" class="btn btn-success btn-assinar">Voltar</a></p>
                            <?php $formDelete = FormBuilder::plain([
                                'id' => 'form-delete',
                                'route' => ['admin.users.destroy', 'user' => $user->id],
                                'method' => 'DELETE',
                                'style' => 'display:none',
                            ]); ?>
                            {!! form($formDelete) !!}
                        </div>
                    </div>
                    <hr/>
                    <div class="row" style="margin-left: 10px; margin-right: 10px;">
                        <div class="row show">
                            <span class="aviso">Nome:</span> {{$user->name}}
                        </div>
                        <div class="row show">
                            <span class="aviso">Email:</span> {{$user->email}}
                        </div>
                        <div class="row show">
                            <span class="aviso">Celular:</span> {{$user->smartphone}}
                        </div>
                        <div class="row show">
                            @if($user->role == 1)
                            <span class="aviso">Tipo do usuario:</span> Administrador - Validade: infinita
                            @elseif($user->role == 2)
                                <span class="aviso">Tipo do usuario:</span> Cliente gratuito - Validade: infinita
                            @else
                                <span class="aviso">Tipo do usuario:</span> Assinante - Validade: {{\Carbon\Carbon::parse($user->valid)->format('d/m/Y | H:m')}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
