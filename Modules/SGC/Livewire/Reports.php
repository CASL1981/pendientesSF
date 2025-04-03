<?php

namespace Modules\SGC\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SGC\App\Models\Cycle;
use Modules\SGC\App\Models\Report;

class Reports extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $cycle_id, $star_date, $end_date, $objective, $scope, $auditores, $auditados, $documents;

    public $observations, $diverging_opinions, $conclusions, $status;

    public $cycles;

    public function mount(): void
    {
        $this->cycles = Cycle::pluck('description', 'id');
    }

    public function hydrate()
    {
        $this->permissionModel = 'report';

        $this->messageModel = 'Reporte creado correctamente';

        $this->exportable ='App\Exports\ReportsExport';
        $this->model = 'Modules\SGC\App\Models\Report';
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $reports = new Report();

        $reports = $reports->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);
        return view('sgc::livewire.report.view', compact('reports'));
    }

    protected function rules(): array
    {
        return [
            'cycle_id' => 'required | exists:sgc_cycles,id',
            'star_date' => 'required | date',
            'end_date' => 'required | date',
            'objective' => 'required | min:3',
            'scope' => 'required | min:3',
            'auditores' => 'required | min:3',
            'auditados' => 'required | min:3',
            'documents' => 'required | min:3',
            'observations' => 'nullable | min:3',
            'diverging_opinions' => 'nullable | min:3',
            'conclusions' => 'nullable | min:3',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('report update');

        $record = Report::findOrFail($this->selected_id);

        $this->cycle_id = $record->cycle_id;
        $this->star_date = $record->star_date->format('Y-m-d');
        $this->end_date = $record->end_date->format('Y-m-d');
        $this->objective = $record->objective;
        $this->scope = $record->scope;
        $this->auditores = $record->auditores;
        $this->auditados = $record->auditados;
        $this->documents = $record->documents;
        $this->observations = $record->observations;
        $this->diverging_opinions = $record->diverging_opinions;
        $this->conclusions = $record->conclusions;
        $this->status = $record->status;

        $this->show = true;
    }
}
