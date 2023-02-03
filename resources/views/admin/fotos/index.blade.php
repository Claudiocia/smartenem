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
                        <h5>Lista de Fotos</h5>
                        <form action="{{ route('admin.fotos.index') }}" method="get">
                            <label class="label-search">Pesquisar</label>
                            <x-jet-input id="search" class="mt-1 w-full" type="search" name="search"/>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="editoria" style="margin-right: 20px; height: 45px;">Aplicação</label>
                                </div>
                                <select class="custom-select form-foto" id="aplic" name="aplic" style="width: 180px;">
                                    <option selected value="">Escolher...</option>
                                    <option value="Apoio">Apoio</option>
                                    <option value="Evento">Evento</option>
                                    <option value="Fórmula">Fórmula</option>
                                    <option value="Notícia">Notícia</option>
                                    <option value="Redação">Redação</option>
                                </select>
                            </div>
                            <div class="buton-search">
                                <x-jet-button class="ml-4 mt-4 buton-sch">
                                    {{ __('Pesquisar') }}
                                </x-jet-button>
                            </div>
                        </form>
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
                            <p><a href="{{route('admin.fotos.create')}}" class="btn btn-primary btn-assinar">Nova Foto</a></p>
                            <p><a href="{{route('admin.fotos.index')}}" class="btn btn-success btn-assinar">Limpar</a></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px; margin-right: 10px;">
                        <table class="table table-striped border-none">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-90">Nome</th>
                                <th class="px-4 py-2 w-10">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fotos as $foto)
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <tr>
                                            <td class="border px-4 py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{asset($foto->path)}}" alt="{{$foto->name_orig}}" width="80" height="80">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div><strong>{{$foto->name_orig}}</strong></div>
                                                        <div>Legenda: {{$foto->legenda}} <br/>Créditos: {{$foto->credito}} <br/>Aplicação: <strong>{{$foto->aplic}}</strong></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border px-4 py-2 alinha-dir">
                                                <div class="d-flex align-items-center" style="margin-top: 25%; margin-bottom: 15%;">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{route('admin.fotos.edit', [ 'foto' => $foto->id ])}}" class="btn btn-primary" style="margin-right: 10px;" role="button">Editar</a>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <a href="{{route('admin.fotos.show', [ 'foto' => $foto->id ])}}" class="btn btn-primary" role="button">Show</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </li>
                                </ul>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
