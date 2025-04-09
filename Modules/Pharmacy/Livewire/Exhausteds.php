<?php

namespace Modules\Pharmacy\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Pharmacy\App\Models\Exhausted;
use Modules\Shopping\App\Models\Product;

class Exhausteds extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $generic_code, $generic_name, $product_name, $manufacturer, $classification, $circular_date, $circular, $status;

    public $products;

    public $manufacturers = [];

    public $product_names = [];

    public function hydrate()
    {
        $this->permissionModel = 'exhausted';

        $this->messageModel = 'Producto agotado creado';

        $this->exportable ='App\Exports\ExhaustedsExport';
        $this->model = 'Modules\Pharmacy\App\Models\Exhausted';

        $this->products = Product::pluck('generic_name', 'generic_code')->toArray();
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $exhausteds = new Exhausted();

        $exhausteds = $exhausteds->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);
        return view('pharmacy::livewire.exhausted.view', compact('exhausteds'));
    }

    protected function rules(): array
    {
        return [
            'generic_code' => 'required',
            'generic_name' => 'required|max:192',
            'product_name' => 'required|max:192',
            'manufacturer' => 'nullable|max:50',
            'classification' => 'nullable|min:3|max:100',
            'circular_date' => 'nullable|date',
            'circular' => 'nullable|min:3|max:30',
        ];
    }

    // Método que se dispara al cambiar el generic_code
    public function onGenericCodeChanged()
    {
        // Buscamos el producto por el generic_code seleccionado
        $record = Product::where('generic_code', $this->generic_code)->get();

        //asignamos el valor del generic_code consultado a los atributos
        $this->generic_name = $record->first()->generic_name;

        $this->product_names = $record->pluck('description', 'description')->toArray();
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can($this->permissionModel . ' update');

        $record = Exhausted::findOrFail($this->selected_id);

        // Buscamos el producto por el generic_code seleccionado
        $products = Product::where('generic_code', $record->generic_code)->get();

        //asignamos el valor del generic_code consultado a los atributos
        $this->product_names = $products->pluck('description', 'description')->toArray();

        // Si el product_name del registro no se encuentra en las opciones,
        // lo agregamos para que el select muestre la opción seleccionada.
        if (!isset($this->product_names[$record->product_name])) {
            $this->product_names[$record->product_name] = $record->product_name;
        }

        $this->generic_code = $record->generic_code;
        $this->generic_name = $record->generic_name;
        $this->product_name = $record->product_name;
        $this->manufacturer = $record->manufacturer;
        $this->classification = $record->classification;
        $this->circular_date = $record->circular_date;
        $this->circular = $record->circular;

        $this->show = true;
    }

    public function store()
    {
        can('exhausted create');

        $validate = $this->validate();

        $record = Product::where('generic_code', $this->generic_code)->first();
        $validate = array_merge($validate, [
            'generic_name' => $record->generic_name,
        ]);

        Exhausted::create($validate);

        $this->resetInput();
    	$this->dispatch('alert', ['type' => 'success', 'message' => $this->messageModel . ' creada']);
    }

    public function update()
    {
        can($this->permissionModel . ' update');

        $validate = $this->validate();

        if ($this->selected_id) {
    		$record = Product::where('generic_code', $this->generic_code)->first();

            $validate = array_merge($validate, [
                'generic_name' => $record->generic_name,
            ]);

            $exhausted = Exhausted::where('id', $this->selected_id)->first();
            $exhausted->update($validate);

            $this->closed();
    		$this->dispatch('alert', ['type' => 'success', 'message' => $this->messageModel . ' actualizada']);
        }
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

                $record->update([ 'status' => 'Inactivo' ]); //actualizamos los modelos

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
