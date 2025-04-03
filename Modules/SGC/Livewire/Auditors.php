<?php

namespace Modules\SGC\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SGC\App\Models\Auditor;
use Modules\SGC\App\Models\Cycle;

class Auditors extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $cycle_id, $identification, $first_name, $last_name, $position, $rol_auditor, $status;

    public $cycles;

    public function hydrate()
    {
        $this->permissionModel = 'auditor';

        $this->messageModel = 'Auditor adicionado al ciclo de auditoria';

        $this->exportable ='App\Exports\AuditorsExport';
        $this->model = 'Modules\SGC\App\Models\Auditor';

        $this->cycles = Cycle::pluck('year', 'id')->toArray();
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $auditors = new Auditor();

        $auditors = $auditors->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);
        return view('sgc::livewire.auditor.view', compact('auditors'));
    }

    protected function rules(): array
    {
        return [
            'cycle_id' => 'required | numeric',
            'identification' => 'required | numeric',
            'first_name' => 'required | min:3',
            'last_name' => 'required | min:3',
            'position' => 'required | min:3',
            'rol_auditor' => 'required | min:3',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit(): void
    {
        can('cycle update');

        $record = Auditor::findOrFail($this->selected_id);

        $this->identification = $record->identification;
        $this->first_name = $record->first_name;
        $this->last_name = $record->last_name;
        $this->position = $record->position;
        $this->rol_auditor = $record->rol_auditor;
        $this->cycle_id = $record->cycle_id;

        $this->show = true;
    }
}
