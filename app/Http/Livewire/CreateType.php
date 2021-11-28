<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;

class CreateType extends Component
{
    public $open = false;

    public $nombre, $descripcion;

    protected $rules = [
        'nombre' => 'required|max:50',
        'descripcion' => 'required|max:150',
    ];

    public function save(){
        $this->validate();

        Type::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);
        $this->reset(['open', 'nombre', 'descripcion']);
        $this->emitTo('show-types','render');
        $this->emit('alert', 'El tipo se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-type');
    }
}
