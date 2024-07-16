<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\CRUDLivewireTrait;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use CRUDLivewireTrait;

    public $identification, $name, $lastname, $area, $email, $status, $role_id, $destination_id, $identificador;
    public $show = false;

    public $roles;

    public function mount()
    {
        // $this->model = 'Modules\Basics\Entities\Employee';
        // $this->exportable ='App\Exports\EmployeesExport';

        $this->roles = Role::pluck('name', 'name')->toArray();
    }

    protected function rules()
    {
        return [
            'identification'      => 'required|min:7|max:12',
            'name'      => 'required|min:3|max:100',
            'lastname'       => 'required|min:3|max:100',
            'email'          => ['required', 'max:100', Rule::unique('users')->ignore($this->identification)],
            'area'           => 'required|in:Administrativa,Comercial,Farmacia',
            // 'status'         => 'nullable',
            // 'role_id'        => 'nullable',
            // 'destination_id' => 'nullable',
        ];
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.users.view', compact('users'));
    }

    public function showModal(bool $show = true)
    {
        $this->show = $show;
    }

    public function store()
    {
        can('user create');
        $validate = $this->validate();

        $fillable = [
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => false, // se crea inactivo
        ];

        $validate = array_merge($validate, $fillable);
        $user = User::create($validate);
        //Asignamos el role seleccinado
        $user->assignRole($this->role_id);

        // $this->cancel();
    	// $this->emit('alert', ['type' => 'success', 'message' => 'Usuario creado']);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->emit('CloseModal', ['modalName' => '#ModalUser']); // Close model to using to jquery
    }
}