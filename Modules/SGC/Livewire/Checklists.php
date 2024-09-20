<?php

namespace Modules\SGC\Livewire;

use App\Models\Destination;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SGC\App\Models\Checklist;
use Modules\SGC\App\Models\Cycle;

class Checklists extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $cycle_id, $type, $destination_id, $process, $date_activity, $responsible, $audited, $documents, $observations, $prepared_by, $accepted_by;

    public $destinations, $cycles;

    public function hydrate()
    {
        $this->permissionModel = 'checklist';

        $this->messageModel = 'Lista de chequeo creada';

        $this->exportable ='App\Exports\ChecklistsExport';
        $this->model = 'Modules\SGC\App\Models\Checklist';

        $this->destinations = Destination::pluck('name', 'id')->toArray();
        $this->cycles = Cycle::pluck('year', 'id')->toArray();
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $checklists = new Checklist();

        $checklists = $checklists->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
        ->with(['destination', 'cycle'])->paginate(10);

        return view('sgc::livewire.checklist.view', compact('checklists'));
    }

    protected function rules(): array
    {
        return [
            'cycle_id' => 'required | exists:sgc_cycles,id',
            'type' => 'required | min:3',
            'destination_id' => 'required | exists:destinations,id',
            'process' => 'required | min:3',
            'date_activity' => 'nullable | date',
            'responsible' => 'required | min:3',
            'audited' => 'required | min:3',
            'documents' => 'required|min:3',
            'observations' => 'nullable | min:3',
            'prepared_by' => 'nullable | min:3',
            'accepted_by' => 'nullable   | min:3',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('checklist update');

        $record = Checklist::findOrFail($this->selected_id);

        $this->cycle_id = $record->cycle_id;
        $this->type = $record->type;
        $this->destination_id = $record->destination_id;
        $this->process = $record->process;
        $this->date_activity = $record->date_activity->format('Y-m-d');
        $this->responsible = $record->responsible;
        $this->audited = $record->audited;
        $this->documents = $record->documents;
        $this->observations = $record->observations;
        $this->prepared_by = $record->prepared_by;
        $this->accepted_by = $record->accepted_by;

        $this->show = true;
    }

    //Eventos disparados desde la vista Checklist
    #[On('toggleItem')] //escuchamos el evento emitido desde el componente button-toggle
    public function toggleItem()
    {
        can($this->permissionModel . ' toggle');

        if (count($this->selectedModel)) {
            //consultamos todos los status y consultamos los modelos de los item seleccionadoa
            $status = $this->model::whereIn('id', $this->selectedModel)->get('status')->toArray();
            $record = $this->model::whereIn('id', $this->selectedModel);

            if($status[0]['status']) {

                $record->update([ 'status' => false ]); //actualizamos los modelos

                $this->selectedModel = []; //limpiamos todos los item seleccionados
                $this->selectAll = false;
            } else {

                $record->update([ 'status' => true ]);
                $this->selectedModel = [];
                $this->selectAll = false;
            }
        } else {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Selecciona un Item']);
        }
    }

    #[On('criteria')] //escuchamos el evento emitido desde la vista checklist
    public function detailCheckList(): mixed
    {
        can($this->permissionModel . ' delete');

        $status = $this->model::where('id', $this->selected_id)->get('status')->toArray();

        if($status[0]['status'])
        {
            return redirect()->route('sgc.checklist.detail.criteria')->with('ChecklistId', $this->selected_id);
        }

        $this->selectedModel = [];
        $this->selectAll = false;
        return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Lista de chequeo no se encuentra abierta']);
    }
}
