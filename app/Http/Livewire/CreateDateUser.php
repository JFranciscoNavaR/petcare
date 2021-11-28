<?php

namespace App\Http\Livewire;

use App\Models\Date;
use App\Models\Statu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateDateUser extends Component
{
    public $open = false;

    public $fecha, $tiempo, $descripcion, $statu_id, $user_id;

    protected $rules = [
        'fecha' => 'required|date',
        'tiempo' => 'required',
        'descripcion' => 'required|max:150',
        'statu_id' => 'required|numeric',
    ];

    public function render()
    {
        $status = Statu::all();
        return view('livewire.create-date-user', compact(['status']));
    }

    public function save(){
        $this->validate();
        if(is_null($this->user_id)){
            $this->user_id = Auth::user()->id;
        }

        Date::create([
            'fecha' => $this->fecha,
            'tiempo' => $this->tiempo,
            'descripcion' => $this->descripcion,
            'statu_id' => $this->statu_id,
            'user_id' => $this->user_id,
        ]);
        $this->reset(['open', 'fecha', 'tiempo', 'descripcion', 'statu_id']);
        $this->emitTo('show-dates-user','render');
        $this->emit('alert', 'La cita se creo satisfactoriamente');
    }
}
