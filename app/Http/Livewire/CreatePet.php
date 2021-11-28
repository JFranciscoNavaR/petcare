<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\Statu;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreatePet extends Component
{
    use WithFileUploads;
    public $open = false;

    public $nombre, $edad, $sexo, $peso, $color, $raza, $especie, $descripcion, $image, $type_id, $statu_id, $user_id, $identificador;

    public function mount(){
        $this->identificador = rand();
    }

    protected $rules = [
        'nombre' => 'required|max:50',
        'edad' => 'required|numeric',
        'sexo' => 'required|max:50',
        'peso' => 'required|numeric',
        'color' => 'required|max:50',
        'raza' => 'required|max:50',
        'especie' => 'required|max:50',
        'descripcion' => 'required|max:150',
        'image' => 'required|image|max:2048',
        'type_id' => 'required|numeric',
        'statu_id' => 'required|numeric',
    ];

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();
        if(is_null($this->user_id)){
            $this->user_id = Auth::user()->id;
        }

        $images = $this->image->store('public/pets');
        $url = Storage::url($images);

        Pet::create([
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'peso' => $this->peso,
            'color' => $this->color,
            'raza' => $this->raza,
            'especie' => $this->especie,
            'descripcion' => $this->descripcion,
            'image' => $url,
            'type_id' => $this->type_id,
            'statu_id' => $this->statu_id,
            'user_id' => $this->user_id,
        ]);
        $this->reset(['open', 'nombre', 'edad', 'sexo', 'peso', 'color', 'raza', 'especie', 'descripcion', 'image', 'type_id', 'statu_id']);
        $this->identificador = rand();
        $this->emitTo('show-pets','render');
        $this->emit('alert', 'La mascota se creo satisfactoriamente');
    }

    public function render()
    {
        $types = Type::all();
        $status = Statu::all();
        return view('livewire.create-pet', compact(['types','status']));
    }
}
