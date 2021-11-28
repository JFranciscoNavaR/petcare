<?php

namespace App\Http\Livewire;

use App\Models\Statu;
use Livewire\Component;

class CreateStatu extends Component
{
    public $open = false;

    public $nombre, $descripcion;

    protected $rules = [
        'nombre' => 'required|max:50',
        'descripcion' => 'required|max:150',
    ];

    public function save(){
        $this->validate();

        Statu::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);
        $this->reset(['open', 'nombre', 'descripcion']);
        $this->emitTo('show-status','render');
        $this->emit('alert', 'El estatu se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-statu');
    }
}
