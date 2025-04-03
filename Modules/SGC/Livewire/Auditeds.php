<?php

namespace Modules\SGC\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SGC\App\Models\Audited;
use Modules\SGC\App\Models\Cycle;

class Auditeds extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $cycle_id, $identification, $first_name, $last_name, $position, $status;

    public $cycles;

    public function hydrate()
    {
        $this->permissionModel = 'audited';

        $this->messageModel = 'Auditado adicionado al ciclo de auditoria';

        $this->exportable ='App\Exports\AuditedsExport';
        $this->model = 'Modules\SGC\App\Models\Audited';

        $this->cycles = Cycle::pluck('year', 'id')->toArray();
    }

    protected function rules(): array
    {
        return [
            'cycle_id' => 'required | numeric',
            'identification' => 'required | numeric',
            'first_name' => 'required | min:3',
            'last_name' => 'required | min:3',
            'position' => 'required | min:3',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $auditeds = new Audited();

        $auditeds = $auditeds->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);
        return view('sgc::livewire.audited.view', compact('auditeds'));
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('audited update');

        $record = Audited::findOrFail($this->selected_id);

        $this->cycle_id = $record->cycle_id;
        $this->identification = $record->identification;
        $this->first_name = $record->first_name;
        $this->last_name = $record->last_name;
        $this->position = $record->position;
        $this->status = $record->status;

        $this->show = true;
    }
}
