<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowTypes extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $type;
    public $titulo;
    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';
    public $cantidad = '5';
    public $readyToLoad = false;

    public $open_edit = false;

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cantidad' => ['except' => '5'],
        'sort' => ['except' => 'id'], 
        'direction' => ['except' => 'asc'],
        'search' => ['except' => ''],
    ];

    public function mount(){
        $this->type = new Type();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'type.nombre' => 'required|max:50',
        'type.descripcion' => 'required|max:150',
    ];

    public function render()
    {
        $this->titulo = "Ver Tipos";
        if($this->readyToLoad == true){
            $types = Type::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        }else{
            $types = [];
        }
        return view('livewire.show-types', compact(['types']));
    }

    public function loadTypes(){
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'asc') {
                $this->direction = 'desc';
            } else {
                $this->direction = 'asc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Type $type){
        $this->type = $type;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();
        $this->type->save();
        $this->reset(['open_edit']);
        $this->emit('alert', 'El tipo se actualizo satisfactoriamente');
    }

    public function delete(Type $type){
        $type->delete();
    }
}
