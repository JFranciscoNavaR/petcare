<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\Statu;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $titulo;
    public $search = '';
    public $cantidad = '4';
    public $readyToLoad = false;
    public $pet, $image, $user_id, $identificador;
    public $open_show = false;

    protected $queryString = [
        'cantidad' => ['except' => '4'],
        'search' => ['except' => ''],
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $this->titulo = "Ver Mascotas";
        if($this->readyToLoad == true){
            $pets = Pet::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orderby('id', 'ASC')
            ->paginate($this->cantidad);

        }else{
            $pets = [];
        }
        $types = Type::all();
        $status = Statu::all();
        return view('livewire.index', compact(['pets', 'types', 'status']));
    }

    public function loadPets(){
        $this->readyToLoad = true;
    }

    public function mount(){
        $this->identificador = rand();
        $this->pet = new Pet();
    }
    
    public function show(Pet $pet){
        $this->pet = $pet;
        $this->open_show = true;
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
}
