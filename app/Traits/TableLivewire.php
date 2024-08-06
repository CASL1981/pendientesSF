<?php

namespace App\Traits;

use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;
trait TableLivewire
{

    public $sortField = 'id', $sortDirection = 'desc'; //variables de ordenamiento
    public $selectedModel = [];
    public $selectedModelRadio = 0;
    public $selectAll = false;
    public $bulkDisabled = true;
    public $keyWord;
    public $show = false; //varible que controla el modal
    public $showauditor = false; //varible que controla el modal de auditoria
    public $model; //modelo de la tabla
    public $exportable; //clase exportable de laravel excel
    public $audit = []; //variable de auditoria
    
    protected $paginationTheme = 'bootstrap';
    
    public function sortBy($field)
    {        
        $this->sortDirection = $this->sortField === $field
        ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
        : 'asc';
        
        $this->sortField = $field;
    }
    
    
    public function updatingKeyWord()
    {
        $this->resetPage();
    }
    
    public function cancel()
    {
        $this->resetInput();
    }

    public function closed()
    {
        $this->cancel();
        $this->show = false;
    }
    
    private function resetInput()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetExcept(['model', 'exportable', 'keyWord']);
    }

    public function updatedSelectAll($value)
    {
        $value ? $this->selectedModel = $this->model::pluck('id') : $this->selectedModel = [];
    }
    
    public function export($ext)
    {
        abort_if(!in_array($ext, ['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);
        
        $query = new $this->model;
        
        $query = $query->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->get();

        return Excel::download(new $this->exportable($query), 'filename.' . $ext);
    }

    /**
     * devolvemos el modal de auditoria con los datos del registro seleccionado
     * @return void
     */
    public function auditoria()
    {
        //validamos que el registro este seleccionado
        if ($this->selected_id) {
            //consultamos el registro seleccionado y cargamos los datos de la auditoria
            $this->audit = $this->model::with(['creator', 'editor'])->find($this->selected_id)->toArray();
            $this->showauditor = true;
        } else {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Selecciona un registros']);
        }
    }

    /**
     * cerramos el modal de auditoria
     * @return void
     */
    public function showaudit()
    {
        $this->showauditor = false;
    }
}