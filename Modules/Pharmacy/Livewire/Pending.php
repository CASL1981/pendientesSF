<?php

namespace Modules\Pharmacy\Livewire;

use App\Models\Destination;
use App\Models\User;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Pharmacy\App\Models\Pending as ModelsPending;
use Modules\Shopping\App\Models\Product;

class Pending extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $type, $destination_id, $product_id, $quantity, $send_quantity, $reason, $duration, $EPS, $contracting_modality;
    public $user_id, $invoicing_method, $manager, $order, $circular, $observations, $status;


    public $destinations, $products, $users;

    public function hydrate(): void
    {
        $this->permissionModel = 'pending';

        $this->messageModel = 'Pendiente creado';

        $this->exportable ='App\Exports\PendingExport';
        $this->model = 'Modules\Pharmacy\App\Models\Pending';

        $this->destinations = Destination::pluck('name', 'id')->toArray();
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
                    ->with(['destination', 'product', 'user'])->paginate(10);

        return view('pharmacy::livewire.pending.view', compact('pendings'));
    }

    protected function rules(): array
    {
        return [
            'type' => Rule::in(['Pedido', 'Requisición', 'Mensaje Interno']),
            'destination_id' => 'required | exists:destinations,id',
            'product_id' => 'required | exists:shopping_products,id',
            'quantity' => 'required | numeric',
            'send_quantity' => 'nullable | numeric',
            'reason' => 'nullable',
            'duration' => 'nullable|min:3',
            'EPS' => 'nullable|min:3',
            'contracting_modality' => 'nullable|min:3',
            'invoicing_method' => 'nullable|min:3',
            'manager' => 'nullable | min:3',
            'order' => 'nullable | numeric',
            'circular' => 'nullable | min:3',
            'observations' => 'nullable | min:3',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('pending update');

        $record = ModelsPending::findOrFail($this->selected_id);

        $this->type = $record->type;
        $this->destination_id = $record->destination_id;
        $this->product_id = $record->product_id;
        $this->quantity = $record->quantity;
        $this->send_quantity = $record->send_quantity;
        $this->reason = $record->reason;
        $this->duration = $record->duration;
        $this->EPS = $record->EPS;
        $this->contracting_modality = $record->contracting_modality;
        $this->invoicing_method = $record->invoicing_method;
        $this->manager = $record->manager;
        $this->order = $record->order;
        $this->circular = $record->circular;
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
}
