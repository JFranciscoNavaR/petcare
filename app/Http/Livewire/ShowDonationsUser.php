<?php

namespace App\Http\Livewire;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDonationsUser extends Component
{
    use WithPagination;
    public $donation;
    public $titulo;
    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';
    public $cantidad = '8';
    public $readyToLoad = false;

    public $open_edit = false;

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cantidad' => ['except' => '8'],
        'sort' => ['except' => 'id'], 
        'direction' => ['except' => 'asc'],
        'search' => ['except' => ''],
    ];

    public function mount(){
        $this->donation = new Donation();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'donation.nombre' => 'required|max:50',
        'donation.monto' => 'required|numeric',
        'donation.descripcion' => 'required|max:150',
    ];

    public function render()
    {
        $this->titulo = "Ver Donaciones";
        if($this->readyToLoad == true){
            $donations = Donation::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        }else{
            $donations = [];
        }
        return view('livewire.show-donations-user', compact('donations'));
    }

    public function loadDonations(){
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

    public function pay(Donation $donation){
        return view('donations.pay', compact('donation'));
    }
}
