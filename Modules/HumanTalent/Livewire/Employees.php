<?php

namespace Modules\HumanTalent\Livewire;

use App\Models\Destination;
use App\Traits\CRUDLivewireTrait;
use App\Traits\TableLivewire;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\HumanTalent\App\Models\Employee;

class Employees extends Component
{
    use WithPagination;
    use TableLivewire;
    use CRUDLivewireTrait;

    public $destinations;

    public function hydrate()
    {
        $this->permissionModel = 'employee';

        $this->messageModel = 'Empleado Creado';

        $this->exportable ='App\Exports\EmployeesExport';
        $this->model = 'Modules\HumanTalent\App\Models\Employee';

        $this->destinations = Destination::pluck('name', 'id')->toArray();
    }

    /**
     * Display a listing of the resource.
     */
    public function render(): View
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $employees = new Employee();

        $employees = $employees->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
                    ->with('destination')->paginate(10);

        return view('humantalent::livewire.employee.view', compact('employees'));
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('employee update');

        $record = Employee::findOrFail($this->selected_id);



        $this->show = true;
    }
}
