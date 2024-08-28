<?php

namespace Modules\Shopping\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Shopping\App\Models\Product;

class Products extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $item, $description, $brand, $ATC, $invima, $measure_unit, $presentation, $concentration, $pharmaceutical_form, $generic_name, $generic_code, $tax_percentage;

    public function hydrate()
    {
        $this->permissionModel = 'product';

        $this->messageModel = 'Producto creado';

        $this->exportable ='App\Exports\ProductsExport';
        $this->model = 'Modules\Shopping\App\Models\Product';
    }

    protected function rules()
    {
        return [
            'item' => ['required', 'max:100', Rule::unique('shopping_products')->ignore($this->selected_id)],
            'description' => 'required|max:192',
            'brand' => 'nullable|min:2|max:100',
            'ATC' => 'nullable|min:2|max:50',
            'invima' => 'nullable|min:2|max:50',
            'measure_unit' => 'nullable|min:2|max:50',
            'presentation' => 'nullable|min:2|max:100',
            'concentration' => 'nullable|min:2|max:50',
            'pharmaceutical_form' => 'nullable|min:2|max:50',
            'generic_name' => 'required|min:2|max:192',
            'generic_code' => 'required|numeric',
            'tax_percentage' => 'required|numeric',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $products = new Product();

        $products = $products->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);

        return view('shopping::livewire.product.view', compact('products'));
    }

    /**
     * returns the values ​​of the products to edit
     * @return void
     */
    public function edit()
    {
        can('product update');

        $record = Product::findOrFail($this->selected_id);

        $this->item = $record->item;
        $this->description = $record->description;
        $this->brand = $record->brand;
        $this->ATC = $record->ATC;
        $this->invima = $record->invima;
        $this->measure_unit = $record->measure_unit;
        $this->presentation = $record->presentation;
        $this->concentration = $record->concentration;
        $this->pharmaceutical_form = $record->pharmaceutical_form;
        $this->generic_name = $record->generic_name;
        $this->generic_code = $record->generic_code;
        $this->tax_percentage = $record->tax_percentage;

        $this->show = true;
    }
}
