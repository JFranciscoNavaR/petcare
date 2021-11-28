<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowUsers extends Component
{
    use WithPagination;
    public $user;
    public $role;
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
        $this->user = new User();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'user.name' => 'required|max:50',
        'user.email' => 'required|max:150',
        'role' => 'required',
    ];

    public function render()
    {
        $this->titulo = "Ver Usuarios";
        if($this->readyToLoad == true){
            $users = User::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        }else{
            $users = [];
        }
        $roles = Role::all();
        return view('livewire.show-users', compact(['users', 'roles']));
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

    public function edit(User $user){
        $this->user = $user;
        $this->open_edit = true;
    }

    public function update(Request $request, User $user){
        $user->roles()->sync($request->roles);
        $this->validate();
        $this->user->save();
        $this->reset(['open_edit']);
        $this->emit('alert', 'El usuario se actualizo satisfactoriamente');
    }

    public function delete(User $user){
        $user->delete();
    }
}
