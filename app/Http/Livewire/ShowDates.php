<?php

namespace App\Http\Livewire;

use App\Models\Date;
use App\Models\Statu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDates extends Component
{
    use WithPagination;
    public $date, $user_id;
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
        $this->date = new Date();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'date.fecha' => 'required',
        'date.tiempo' => 'required',
        'date.descripcion' => 'required|max:150',
        'date.statu_id' => 'required|numeric',
    ];

    public function render()
    {
        $this->titulo = "Ver Citas";
 
        if($this->readyToLoad == true){
            $dates = Date::where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        }else{
            $dates = [];
        }
        $status = Statu::all();
        return view('livewire.show-dates', compact(['dates', 'status']));
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

    public function edit(Date $date){
        $this->date = $date;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();
        if(is_null($this->user_id)){
            $this->user_id = Auth::user()->id;
        }
        $this->date->save();
        $this->reset(['open_edit']);
        $this->emit('alert', 'La cita se actualizo satisfactoriamente');
    }

    public function delete(Date $date){
        $date->delete();
    }
}
