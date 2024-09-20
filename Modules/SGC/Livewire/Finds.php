<?php

namespace Modules\SGC\Livewire;

use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SGC\App\Models\Criterion;
use Modules\SGC\App\Models\Find;

class Finds extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $checklist_id, $criterion_id, $description, $evidence, $consequence, $requirement, $status;

    public $find;

    public function mount(Request $request): void
    {
        $this->criterion_id = $request->session()->get('CriterionId');
        $this->checklist_id = $request->session()->get('ChecklistId');
    }

    public function hydrate()
    {
        $this->permissionModel = 'find';

        $this->messageModel = 'No Conformidad creada';

        // $this->exportable ='App\Exports\sExport';
        $this->model = 'Modules\SGC\App\Models\Find';
    }

    /**
     * Display a view of the resource.
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        

        // if (count($find))
        // {
        //     $find = Criterion::where('id', $this->criterion_id)->get();
        // }

        $this->edit();

        return view('sgc::livewire.find.view');
    }

    protected function rules(): array
    {
        return [
            'description' => 'required | min:10',
            'evidence' => 'required | min:10',
            'consequence' => 'required | min:10',
            'requirement' => 'required | min:10',
        ];
    }

    public function edit(): void
    {
        $record = Find::where('criterion_id', $this->criterion_id)->first();

        $this->description = $record->description;
        $this->evidence = $record->evidence;
        $this->consequence = $record->consequence;
        $this->requirement = $record->requirement;
        $this->status = $record->status;
    }

    public function store(): void
    {
        can('find create');

        $validate = $this->validate();

        Find::updateOrCreate(
            [
            'checklist_id' => $this->checklist_id,
            'criterion_id' => $this->criterion_id,
            'status' => 1],
            [
            'description' => $this->description,
            'evidence' => $this->evidence,
            'consequence' => $this->consequence,
            'requirement' => $this->requirement,
            ]);

        $this->regresar();
    }

    function method(): void
    {
        $this->find ? $this->update() : $this->store();
    }

    public function regresar(): mixed
    {
        return redirect()->route('sgc.checklist.detail.criteria')->with('ChecklistId', $this->checklist_id);
    }
}
