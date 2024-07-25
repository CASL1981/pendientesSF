<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;
    use TableLivewire;
    USE CRUDLivewireTrait;

    #[Validate('required|min:3|max:100')]
    public $name;

    public $role;

    protected $listeners = ['deleteRole'];


    public function render()
    {
        $this->bulkDisabled = $this->selectedModelRadio < 1;

        $roles = Role::search('name', $this->keyWord)
        ->orderBy($this->sortField, $this->sortDirection)
        ->get();

        $roles = $roles->each(function($role){

            $role->count_user = User::role($role->name)->count();
        });

        return view('livewire.role.view', compact('roles'));
    }

    public function store()
    {
        can('role create');

        $this->show = true;

        $validate = $this->validate();
        // adicionamos el valor web al campo guard_name
        $fillable = [
            'guard_name' => 'web',
        ];

        $validate = array_merge($validate, $fillable);

        Role::create($validate);

        $this->resetInput();
    	$this->dispatch('alert', ['type' => 'success', 'message' => 'Role creado']);
        $this->dispatch('role_id', 0);
    }

    public function edit()
    {
        $record = Role::findOrFail($this->selected_id);

    	$this->name = $record->name;

        $this->show = true;
    }

    public function update()
    {
        $validate = $this->validate();

        if ($this->selected_id) {
    		$record = Role::find($this->selected_id);
            $record->update($validate);

            $this->resetInput();
    		$this->dispatch('alert', ['type' => 'success', 'message' => 'Role actualizado']);
        }
    }

    public function deleteRole()
    {
        can('role delete');

        if ($this->selected_id ) {
            $role = Role::find($this->selected_id);
            //validamos la cantidad de usuarios asignados al Role
            $roles = User::role($role->name)->get();
            if(!$roles->count())
            {
                $role->delete();
                $this->dispatch('alert', ['type' => 'success', 'message' => 'Role Eliminado']);
                $this->resetInput();
            }else{
                $this->dispatch('alert', ['type' => 'warning', 'message' => 'Role no Eliminado asignado a varios usuarios']);
            }
        }
    }
}
