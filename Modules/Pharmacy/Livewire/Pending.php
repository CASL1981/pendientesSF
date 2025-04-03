<?php

namespace Modules\Pharmacy\Livewire;

use App\Models\Classification;
use App\Models\Destination;
use App\Models\User;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Pharmacy\App\Models\Pending as ModelsPending;
use Livewire\Attributes\On;
use Modules\Shopping\App\Models\Product;

class Pending extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $type, $category, $destination, $reason, $duration, $EPS, $contracting_modality;
    public $user_id, $invoicing_method, $manager, $observations, $status;


    public $destinations, $categories, $products, $users;

    public function hydrate(): void
    {
        $this->permissionModel = 'pending';

        $this->messageModel = 'Pendiente creado';

        $this->exportable ='App\Exports\PendingsExport';
        $this->model = 'Modules\Pharmacy\App\Models\Pending';

        $this->destinations = Destination::pluck('name', 'costcenter')->toArray();
        $this->categories = Classification::pluck('name', 'name')->toArray();
        $this->products = Product::pluck('description', 'id')->toArray();
        $this->users = User::pluck('name', 'id')->toArray();
    }

    /**
     * Display a listing of the resource.
     */
    public function render(): View
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $pendings = new ModelsPending();

        $pendings = $pendings->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
                    ->with('user')->paginate(20);

        return view('pharmacy::livewire.pending.view', compact('pendings'));
    }

    protected function rules(): array
    {
        return [
            'type' => Rule::in(['Pedido', 'Requisición', 'Mensaje Interno']),
            'category' => 'required',
            'destination' => 'required',
            'reason' => 'nullable',
            'duration' => 'nullable|min:3',
            'EPS' => 'nullable|min:3',
            'contracting_modality' => 'nullable|min:3',
            'invoicing_method' => 'nullable|min:3',
            'manager' => 'nullable | min:3',
            'observations' => 'nullable | min:3 | max:255',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('pending update');

        $status = ModelsPending::withTrashed()->where('id', $this->selected_id)->get('status')->toArray();

        if($status[0]['status'] !== 'Activo')
        {
            $this->selectedModel = []; //limpiamos todos los item seleccionados
            $this->selectAll = false;
            return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Solicitud no se encuentra activa']);
        }

        $record = ModelsPending::findOrFail($this->selected_id);

        $this->type = $record->type;
        $this->category = $record->category;
        $this->destination = $record->destination;
        $this->reason = $record->reason;
        $this->duration = $record->duration;
        $this->EPS = $record->EPS;
        $this->contracting_modality = $record->contracting_modality;
        $this->invoicing_method = $record->invoicing_method;
        $this->manager = $record->manager;
        $this->observations = $record->observations;

        $this->show = true;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(): void
    {
        can('pending create');

        $validate = $this->validate();
        //Adicionamos el usuario que crea el registro
        $validate = array_merge($validate, [
            'user_id' => auth()->user()->id,
        ]);

        ModelsPending::create($validate);

        $this->resetInput();
    	$this->dispatch('alert', ['type' => 'success', 'message' => $this->messageModel . ' creada']);

    }

    public function detailPending(): mixed
    {
        can('pending create');

        $status = ModelsPending::withTrashed()->where('id', $this->selected_id)->get('status')->toArray();

        if($status[0]['status'] === 'Activo')
        {
            session()->put('pendingId', $this->selected_id);

            return redirect()->route('pharmacy.detail.pending');
        }

        $this->selectedModel = []; //limpiamos todos los item seleccionados
        $this->selectAll = false;
        return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Solicitud no se encuentra activa']);
    }

    #[On('toggleItem')] //escuchamos el evento emitido desde la tabla pendings
    public function toggleItem():void
    {
        // can($this->permissionModel . ' toggle');

        if (count($this->selectedModel)) {
            //consultamos todos los status y consultamos los modelos de los item seleccionadoa
            $status = $this->model::whereIn('id', $this->selectedModel)->get('status')->toArray();
            $record = $this->model::whereIn('id', $this->selectedModel);

            if($status[0]['status'] === 'Activo') {

                $record->update([ 'status' => 'Terminado' ]); //actualizamos los modelos

                $this->selectedModel = []; //limpiamos todos los item seleccionados
                $this->selectAll = false;
            } else {

                $record->update([ 'status' => 'Activo' ]);
                $this->selectedModel = [];
                $this->selectAll = false;
            }
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Itema actualizado']);
        } else {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Selecciona un Item']);
        }
    }
}
