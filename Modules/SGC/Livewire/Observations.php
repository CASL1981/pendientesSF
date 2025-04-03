<?php

namespace Modules\SGC\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Modules\SGC\App\Models\Observation;

class Observations extends Component
{

    public $checklist_id, $criterion_id, $evidence, $consequence, $requirement, $status;

    public $description = '
    Descripción de la situación

    Evidencia

    Posible incumplimiento

    Posible consecuencia
    ';

    public $find;

    public function mount(Request $request): void
    {
        $this->criterion_id = $request->session()->get('CriterionId');
        $this->checklist_id = $request->session()->get('ChecklistId');
    }

    /**
     * Display a listing of the resource.
     */
    public function render()
    {
        $record = Observation::where('criterion_id', $this->criterion_id)->first();

        if ($record)
        {
            $this->edit();
        }

        return view('sgc::livewire.observation.view');
    }

    protected function rules(): array
    {
        return [
            'description' => 'required | min:10',
            // 'evidence' => 'nullable | min:10',
            // 'consequence' => 'nullable | min:10',
            // 'requirement' => 'nullable | min:10',
        ];
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('observation update');

        $record = Observation::where('criterion_id', $this->criterion_id)->first();

        $this->description = $record->description;
        // $this->evidence = $record->evidence;
        // $this->consequence = $record->consequence;
        // $this->requirement = $record->requirement;
        $this->status = $record->status;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): void
    {
        can('find create');

        $validate = $this->validate();

        Observation::updateOrCreate(
            [
            'checklist_id' => $this->checklist_id,
            'criterion_id' => $this->criterion_id,],
            [
            'description' => $this->description,
            ]);

        $this->reset('description');
        $this->regresar();
    }

    public function regresar(): mixed
    {
        $this->reset('description');

        return redirect()->route('sgc.checklist.detail.criteria')->with('ChecklistId', $this->checklist_id);
    }
}
