<?php

namespace Modules\SGC\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SGC\App\Models\Checklist;
use Modules\SGC\App\Models\Criterion;

class Criteria extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $evaluated, $description, $findings, $observations, $evidence;

    public $checklist_id, $checklist;

    public function mount(Request $request): void
    {
        $this->checklist_id = $request->session()->get('ChecklistId');
    }

    public function hydrate()
    {
        $this->permissionModel = 'criterion';

        $this->messageModel = 'Criterio adicionado a las lista de chequeo';

        // $this->exportable ='App\Exports\sExport';
        $this->model = 'Modules\SGC\App\Models\Criterion';
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $this->checklist = Checklist::where('id', $this->checklist_id)->with('destination')->get();

        $criteria = new Criterion();

        $criteria = $criteria->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
                    ->where('checklist_id', $this->checklist_id)
                    ->orderBy('id', 'DESC')->get();

        return view('sgc::livewire.criteria.view', compact('criteria'));
    }

    protected function rules(): array
    {
        return [
            'evaluated' => 'required | min:10',
            'description' => 'required | Min:10',
            'findings' => 'nullable | max:3',
            'observations' => 'nullable | min:20',
            'evidence' => 'nullable | min:20',
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addCriteria(): void
    {
        // can('criterion create');
        can('criterion create');

        $validate = $this->validate();
        //Adicionamos la lista de chequeo a la que pertenece el criterio
        $validate = array_merge($validate, [
            'checklist_id' => $this->checklist_id,
        ]);

        Criterion::create($validate);

        $this->close('Creada');

    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit($id): void
    {
        can('criterion update');

        $record = Criterion::findOrFail($id);

        $this->evaluated = $record->evaluated;
        $this->description = $record->description;
        $this->findings = $record->findings;
        $this->observations = $record->observations;
        $this->evidence = $record->evidence;
        $this->selected_id = $record->id;

        $this->show = true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(): void
    {
        can('criterion update');

        $validate = $this->validate();

        if ($this->checklist_id) {
    		$record = $this->model::find($this->selected_id);
            $record->update($validate);

            $this->close('Actualizada');
        }
    }

    public function close($mensage = null): void
    {
        $this->reset('evaluated', 'description', 'findings', 'observations', 'evidence');
    	$this->dispatch('alert', ['type' => 'success', 'message' => $this->messageModel . ' ' . $mensage]);
        $this->show = false;
    }

    public function regresar(): mixed
    {
        return redirect()->route('sgc.checklists');
    }

    // redirecionamos al modelo de hallazgos para adicionar uno nuevo o modificar el existente
    public function addFinding($id): mixed
    {
        can('find create');

        $status = $this->model::where('id', $id)->get('status')->toArray();

        if($status[0]['status'])
        {
            return redirect()->route('sgc.checklist.criterion.finding')
                            ->with('CriterionId', $id)
                            ->with('ChecklistId', $this->checklist_id);
        }

        $this->selectedModel = [];
        $this->selectAll = false;
        return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Lista de chequeo no se encuentra abierta']);
    }
}
