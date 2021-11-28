<?php

namespace App\Http\Livewire;

use App\Models\Statu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowStatus extends Component
{
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
        $this->statu = new Statu();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'statu.nombre' => 'required|max:50',
        'statu.descripcion' => 'required|max:150',
    ];

    public function render()
    {
        $this->titulo = "Ver Estatus";
        if($this->readyToLoad == true){
            $status = Statu::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        }else{
            $status = [];
        }
        return view('livewire.show-status', compact('status'));
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

    public function edit(Statu $statu){
        $this->statu = $statu;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();
        $this->statu->save();
        $this->reset(['open_edit']);
        $this->emit('alert', 'El estatu se actualizo satisfactoriamente');
    }

    public function delete(Statu $statu){
        $statu->delete();
    }
}
