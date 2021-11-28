<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pet;
use App\Models\Statu;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowPets extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $pet, $image, $user_id, $identificador;
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
        $this->identificador = rand();
        $this->pet = new Pet();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'pet.nombre' => 'required|max:50',
        'pet.edad' => 'required|numeric',
        'pet.sexo' => 'required|max:50',
        'pet.peso' => 'required|numeric',
        'pet.color' => 'required|max:50',
        'pet.raza' => 'required|max:50',
        'pet.especie' => 'required|max:50',
        'pet.descripcion' => 'required|max:150',
        'pet.type_id' => 'required|numeric',
        'pet.statu_id' => 'required|numeric',
    ];

    public function render()
    {
        $this->titulo = "Ver Mascotas";
        if($this->readyToLoad == true){
            $pets = Pet::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        }else{
            $pets = [];
        }
        $types = Type::all();
        $status = Statu::all();
        return view('livewire.show-pets', compact(['pets', 'types', 'status']));
    }

    public function loadPets(){
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

    public function edit(Pet $pet){
        $this->pet = $pet;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();
        if(is_null($this->user_id)){
            $this->user_id = Auth::user()->id;
        }
        if($this->image){
            Storage::delete([$this->pet->image]);
            $images = $this->image->store('public/pets');
            $url = Storage::url($images);
            $this->pet->image = $url; 
        }
        $this->pet->save();
        $this->reset(['open_edit', 'image']);
        $this->identificador = rand();
        //$this->emitTo('show-pets','render');
        $this->emit('alert', 'La mascota se actualizo satisfactoriamente');
    }

    public function delete(Pet $pet){
        $pet->delete();
    }
}
