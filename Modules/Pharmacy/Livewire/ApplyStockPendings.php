<?php

namespace Modules\Pharmacy\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Pharmacy\App\Models\DetailPending;
use Modules\Pharmacy\App\Models\Stock;
use Modules\Shopping\App\Models\Product;

class ApplyStockPendings extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $product_id, $pending_id, $product_name, $brand, $destination, $quantity, $send_quantity;
    public $order, $circular, $observations, $status;

    //variable para mostrar modal de stock y aplicar stock
    public $stocks = [], $apply_amount = [];

    //variable para mostrar modal de stock
    public $showStock = false;

    public function hydrate()
    {
        $this->permissionModel = 'applystockpending';

        $this->messageModel = 'Asignación de stock creado';

        $this->exportable ='App\Exports\ApplyStockPendingExport';
        $this->model = 'Modules\Pharmacy\App\Models\DetailPending';
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $pendings = new DetailPending();

        $pendings = $pendings->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
                    ->where('status', '<>', 'cumplido')->paginate(20);

        return view('pharmacy::livewire.applystockpending.view', compact('pendings'));
    }

    protected function rules(): array
    {
        return [
            'product_id' => 'required|numeric',
            'pending_id' => 'required|numeric',
            'product_name' => 'required|min:3',
            'brand' => 'nullable|min:3',
            'destination' => 'required|min:1',
            'quantity' => 'required|numeric',
            'send_quantity' => 'nullable|numeric',
            'order' => 'nullable|min:3',
            'circular' => 'nullable|min:3',
            'observations' => 'nullable|min:3',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can($this->permissionModel  . ' update');

        $record = DetailPending::findOrFail($this->selected_id);

        $this->product_id = $record->product_id;
        $this->pending_id = $record->pending_id;
        $this->brand = $record->brand;
        $this->destination = $record->destination;
        $this->quantity = $record->quantity;
        $this->send_quantity = $record->send_quantity;
        $this->order = $record->order;
        $this->circular = $record->circular;
        $this->observations = $record->observations;

        $this->show = true;
    }

    public function update()

    {
        can($this->permissionModel . ' update');

        $validate = $this->validate();

        if ($this->selected_id) {

    		$record = $this->model::find($this->selected_id);

            $validate['status'] = $this->status;

            $record->update($validate);

            $this->closed();

    		$this->dispatch('alert', ['type' => 'success', 'message' => $this->messageModel . ' actualizada']);

        }

    }

    public function stock(): void
    {
        can($this->permissionModel  . ' update');

        $record = DetailPending::findOrFail($this->selected_id);

        $this->product_id = $record->product_id;
        $this->pending_id = $record->pending_id;
        $this->product_name = $record->product_name;
        $this->brand = $record->brand;
        $this->destination = $record->destination;
        $this->quantity = $record->quantity;
        $this->send_quantity = $record->send_quantity;
        $this->order = $record->order;
        $this->circular = $record->circular;
        $this->observations = $record->observations;

        //Obtenemos el codigo generico del producto
        $product = Product::findOrFail($this->product_id)->generic_code;
        //Obtenemos el stock del producto con el codigo generico
        $this->stocks = Stock::where('generic_code', $product)->where('quantity', '>', 0)->get();

        $this->showStock = true;
    }

    /**
     * actualizamos la cantidad de stock del producto.
     * asignamos la cantidad de stock al pendiente
     */
    public function applyStock($id): void
    {
        // Verifica si el id existe en el array apply_amounts
        if (isset($this->apply_amount[$id])) {
            // $this->status = 'Enviado';
            // Lógica para aplicar el stock usando el $id y $amount
            $stock = Stock::findOrFail($id);
            $send_quantity = $this->apply_amount[$id];
            $this->send_quantity = $this->send_quantity + $send_quantity;

            $stock->quantity = $stock->quantity - $send_quantity;
            if ($stock->quantity <= 0) {
                $stock->available = false;
            }

            if($this->quantity < $this->send_quantity) {
                $this->dispatch('alert', ['type' => 'warning', 'message' => 'La cantidad a enviar es mayor a la cantidad solicitada']);
                $this->status = 'Cumplido';
            }

            if($this->quantity > $this->send_quantity) {
                $this->status = 'Parcial';
            }
            $stock->save();


            $this->dispatch('alert', ['type' => 'success', 'message' => 'Cantidada asignada al pendiente']);
        } else {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'No se ha especificado la cantidad']);
        }
    }
}
