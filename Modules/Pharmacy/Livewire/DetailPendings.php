<?php

namespace Modules\Pharmacy\Livewire;

use App\Models\Destination;
use App\Traits\TableLivewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Pharmacy\App\Models\DetailPending;
use Modules\Pharmacy\App\Models\Pending;
use Modules\Shopping\App\Models\Product;

class DetailPendings extends Component
{
    use TableLivewire;
    use WithPagination;

    //propiedades del modelo
    public $product_id, $pending_id, $product_name, $brand, $destination, $quantity, $send_quantity, $order, $circular, $status;

    // variables de control - selectores
    public $selected_id, $products, $destinations;

    //variable de sessión y de la solicitud de pendiente
    public $pendingId, $pending;

    //variables de edición
    public $quantityE, $brandE, $destinationE;

    public function mount(): void
    {
        $this->pendingId = session()->get('pendingId');
        $this->products = Product::pluck('description', 'id')->toArray();
        $this->destinations = Destination::pluck('costcenter', 'costcenter');
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $pendingProducts = DetailPending::where("pending_id", $this->pendingId)
                ->orderBy('created_at', 'desc')->paginate(10);

        $this->pending = Pending::find($this->pendingId);

        $this->selected_id = $this->pendingId;

        return view('pharmacy::livewire.detailpending.view', compact('pendingProducts'));
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can(' update');

        // $record = ::findOrFail($this->selected_id);



        // $this->show = true;
    }

    public function addProduct()
    {
        if($this->product_id == '' || $this->quantity == '' || $this->destination == '')
        {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Ingrese todos los campos para agregar un producto a la lista']);
        }else{
            $this->product_name = Product::find($this->product_id)->description;

            DetailPending::create([
                'product_id' => $this->product_id,
                'pending_id' => $this->pendingId,
                'product_name' => $this->product_name,
                'brand' => $this->brand,
                'destination' => $this->destination,
                'quantity' => $this->quantity,
            ]);

            $this->resetInput();
        }

        // Emitir el evento y enviar la nueva data
        $this->dispatch('resetOptions', $this->products);
    }

    public function resetInput():void
    {
        $this->product_id = "";
        $this->quantity = null;
        $this->brand = null;
        $this->destination = null;
    }

    public function removeItem($key): void
    {
        $item = DetailPending::find($key);

        if($item->status <> 'Sin Revisión')
        {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Item gestionado desde oficina principal, no se puede editar']);
        }else{
            $item->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Item eliminado con éxito']);
        }

    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function editingItem($key): void
    {
        $item = DetailPending::find($key);

        if($item->status <> 'Sin Revisión')
        {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Item gestionado desde oficina principal, no se puede editar']);
        }else{
            $this->quantityE = $item->quantity;
            $this->brandE = $item->brand;
            $this->destinationE = $item->destination;

            $item->update(['status' => 'Editing']);
        }
    }

    public function updateEditingItem($key):void
    {
        $item = DetailPending::find($key);

        $item->update([
            'quantity' => $this->quantityE,
            'brand' => $this->brandE,
            'destination' => $this->destinationE,
            'status' => 'Sin Revisión'
        ]);

        $this->resetInput();
    }

    public function cancelEditingItem($key): void
    {
        DetailPending::find($key)->update(['status' => 'Sin Revisión']);

        $this->resetInput();
    }
}
