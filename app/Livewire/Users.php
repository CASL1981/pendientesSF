<?php

namespace App\Livewire;

use App\Models\Destination;
use App\Models\User;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use CRUDLivewireTrait;
    use TableLivewire;
    use WithPagination;

    public $identification, $name, $lastname, $area, $email, $status, $role_id, $destination, $destinations;

    public $roles;

    public function mount()
    {
        $this->model = 'App\Models\User';
        // $this->exportable ='App\Exports\EmployeesExport';

        $this->roles = Role::pluck('name', 'id')->toArray();
        $this->destinations = Destination::pluck('name', 'costcenter')->toArray();
    }

    protected function rules()
    {
        return [
            'identification'      => 'required|min:7|max:12',
            'name'      => 'required|min:3|max:100',
            'lastname'       => 'required|min:3|max:100',
            'email'          => ['required', 'max:100', Rule::unique('users')->ignore($this->selected_id)],
            'area'           => 'required|in:Administrativa,Comercial,Farmacia,Financiero',
            'status'         => 'nullable',
            'role_id'        => 'nullable',
            'destination'    => 'nullable',
        ];
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $users = User::paginate(10);
        // dd($destinactions);
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
        $role = Role::find($this->role_id);
        $user->assignRole($role->name);

        //reinicamos los campos
        $this->cancel();
    	// $this->emit('alert', ['type' => 'success', 'message' => 'Usuario creado']);
    }

    public function edit()
    {
        can('user update');

        $record = User::findOrFail($this->selected_id);

        $this->identification = $record->identification;
        $this->name = $record->name;
        $this->lastname = $record->lastname;
        $this->area = $record->area;
        $this->email = $record->email;
        $this->status = $record->status;
        $this->role_id = $record->role_id;
        $this->destination = $record->destination;

        $this->show = true;
    }

    public function update()
    {
        can('user update');
        $validate = $this->validate();
        if ($this->selected_id) {

    		$record = User::find($this->selected_id);

            $record->update($validate);

            //Asignamos el rol seleccionado
            $role = Role::find($this->role_id);
            if ($role) {
                $record->syncRoles($role->name);
            }

            //reiniciamos los campos
            $this->cancel();

    		//Mensaje de actualización
             $this->dispatch('alert', ['type' => 'success', 'message' => 'Usuario actualizado']);
        }
    }

    public function cancel()
    {
        $this->reset(['identification', 'name', 'lastname', 'area', 'email', 'status', 'role_id', 
                        'destination', 'selected_id', 'selectedModel']);
        $this->show = false;
        // $this->emit('CloseModal', ['modalName' => '#ModalUser']); // Close model to using to jquery
    }
}