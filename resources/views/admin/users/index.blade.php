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
                        <h5>Lista de usuários</h5>
                        <form action="{{ route('admin.users.index') }}" method="get">
                            <label class="label-search">Pesquisar</label>
                            <x-jet-input id="search" class="mt-1 w-full" type="search" name="search"/>
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
                            <p><a href="{{route('admin.users.create')}}" class="btn btn-primary btn-assinar">Novo</a></p>
                            <p><a href="{{route('admin.users.index')}}" class="btn btn-success btn-assinar">Limpar</a></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px; margin-right: 10px;">
                        <table class="table table-striped">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-10">No.</th>
                                <th class="px-4 py-2 w-80">Nome</th>
                                <th class="px-4 py-2 w-10">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2 alinha-dir">
                                        <a href="{{route('admin.users.edit', [ 'user' => $user->id ])}}" class="btn btn-primary" style="margin-right: 10px;" role="button">Editar</a>
                                        <a href="{{route('admin.users.show', [ 'user' => $user->id ])}}" class="btn btn-primary" role="button">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
