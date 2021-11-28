<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPet extends Component
{ 
    use WithFileUploads;
    public $open = false;
    public $pet, $image, $identificador;

    protected $rules = [
        'pet.nombre' => 'required|max:50',
        'pet.edad' => 'required|numeric',
        'pet.peso' => 'required|numeric',
        'pet.color' => 'required|max:50',
        'pet.raza' => 'required|max:50',
        'pet.especie' => 'required|max:50',
        'pet.descripcion' => 'required|max:150',
    ];

    public function mount(Pet $pet){
        $this->pet = $pet;
        $this->identificador = rand();
    }
    public function save(){
        $this->validate();
        if($this->image){
            Storage::delete($this->pet->image);
            $images = $this->image->store('public/pets');
            $url = Storage::url($images);
            $this->pet->image = $url; 
        }
        $this->pet->save();

        $this->reset(['open', 'image']);
        $this->identificador = rand();
        $this->emitTo('show-pets','render');
        $this->emit('alert', 'La mascota se actualizo satisfactoriamente');
    }
    public function render()
    {
        return view('livewire.edit-pet');
    }
}
