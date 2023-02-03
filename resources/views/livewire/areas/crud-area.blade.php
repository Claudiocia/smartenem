<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Areas de Conhecimento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if (session()->has('msg'))
                        <div class="alert alert-success campo-data" role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('msg') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div style="margin: 20px">
                        <button wire:click="create()"
                            class="button-person">
                            Nova Área
                        </button>
                        @if($isModalOpen)
                            @include('livewire.areas.create')
                       @endif
                    </div>
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-10">No.</th>
                            <th class="px-4 py-2 w-80">Nome</th>
                            <th class="px-4 py-2 w-10">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($areas as $area)
                            <tr>
                                <td class="border px-4 py-2">{{ $area->id }}</td>
                                <td class="border px-4 py-2">{{ $area->name }}</td>
                                <td class="border px-4 py-2 alinha-dir">
                                    <button wire:click="edit({{ $area->id }})"
                                            class="button-action-edt">Editar</button>
                                    <button wire:click="delete({{ $area->id }})"
                                            class="button-action-del">Delete</button>
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
