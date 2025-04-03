<?php

namespace App\Livewire;

use App\Models\Classification;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Classifications extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $code, $level, $parent, $name, $impute;

    protected $listeners = ['showaudit','deleteItem'];

    public function hydrate()
    {
        $this->permissionModel = 'classification';

        $this->messageModel = 'Clasificación';

        $this->model = 'App\Models\Classification';
        $this->exportable ='App\Exports\ClassificationsExport';
    }

    protected function rules(): array
    {
        return [
            'code' => ['required', 'max:10', Rule::unique('classifications')->ignore($this->selected_id)],
            'level' => 'nullable|numeric',
            'parent' => 'nullable|min:1|max:10',
            'name' => 'required|min:3|max:100',
            'impute' => ['required', Rule::in(['0', '1'])],
        ];
    }

    public function render(): View
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $classifications = new Classification();

        $classifications = $classifications->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(20);

        return view('livewire.classification.view', compact('classifications'));

    }

    public function edit()
    {
        can('classification update');

        $record = Classification::findOrFail($this->selected_id);

        $this->code = $record->code;
        $this->level = $record->level;
        $this->parent = $record->parent;
        $this->name = $record->name;
        $this->impute = $record->impute;

        $this->show = true;
    }

    public function deleteItem()
    {
        can('classification delete');

        if ($this->selected_id ) {
            $classification = Classification::find($this->selected_id);

            $classification->delete();
            $this->emit('alert', ['type' => 'success', 'message' => 'classification Eliminado']);
        }
    }
}
