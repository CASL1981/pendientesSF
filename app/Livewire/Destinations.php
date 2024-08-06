<?php

namespace App\Livewire;

use App\Models\Destination;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Livewire\Component;
use Livewire\WithPagination;

class Destinations extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $costcenter, $name, $address, $phone, $location, $minimun, $maximun;


    // protected $listeners = 'showaudit';

    public function hydrate()
    {
        $this->permissionModel = 'destination';

        $this->messageModel = 'Centro de Costo';

        $this->exportable ='App\Exports\DestinationsExport';
        $this->model = 'App\Models\Destination';
    }

    protected function rules()
    {
        return [
            'costcenter' => 'required',
            'name' => 'required|min:3|max:100',
            'address' => 'nullable',
            'phone' => 'nullable',
            'location' => 'nullable',
            'minimun' => 'nullable|numeric',
            'maximun' => 'nullable|numeric'
        ];
    }
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $destinations = new Destination();

        $destinations = $destinations->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);

        return view('livewire.destination.view', compact('destinations'));
    }

    /**
     * returns the values ​​of the destinations to edit
     * @return void
     */
    public function edit()
    {
        can('destination update');

        $record = Destination::findOrFail($this->selected_id);

        $this->costcenter = $record->costcenter;
        $this->name = $record->name;
        $this->address = $record->address;
        $this->phone = $record->phone;
        $this->location = $record->location;
        $this->minimun = $record->minimun;
        $this->maximun = $record->maximun;

        $this->show = true;
    }
}
