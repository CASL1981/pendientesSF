<?php

namespace Modules\SGC\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SGC\App\Models\Cycle;

class Cycles extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $year, $description;

    public function hydrate()
    {
        $this->permissionModel = 'cycle';

        $this->messageModel = 'Auditoria creada';

        $this->exportable ='App\Exports\CyclesExport';
        $this->model = 'Modules\SGC\App\Models\Cycle';
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $cycles = new Cycle();

        $cycles = $cycles->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);

        return view('sgc::livewire.cycle.view', compact('cycles'));
    }

    protected function rules(): array
    {
        return [
            'year' => 'required | numeric',
            'description' => 'required | min:3',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('cycle update');

        $record = Cycle::findOrFail($this->selected_id);

        $this->year = $record->year;
        $this->description = $record->description;

        $this->show = true;
    }
}
