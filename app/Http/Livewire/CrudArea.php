<?php

namespace App\Http\Livewire;

use App\Models\Area;
use Livewire\Component;

class CrudArea extends Component
{
    public $areas, $name, $enunciado, $area_id;
    public $isModalOpen = 0;
    public function render()
    {
        $this->areas = Area::all();
        return view('livewire.areas.crud-area');
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->name = '';
        $this->enunciado = '';
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Area::updateOrCreate(['id' => $this->area_id], [
            'name' => $this->name,
            'enunciado' => $this->enunciado
        ]);
        session()->flash('msg', $this->area_id ? 'Area de Conhecimento atualizada.' : 'Area de Conhecimento criada');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $this->area_id = $id;
        $this->name = $area->name;
        $this->enunciado = $area->enunciado;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Area::find($id)->delete();
        session()->flash('msg', 'Area deletada');
    }
}
