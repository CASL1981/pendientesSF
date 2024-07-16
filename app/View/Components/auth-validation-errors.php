<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class authvalidationerrors extends Component
{
    public $errors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($errors='')
    {
       $this -> errors = $errors; //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.auth-validation-errors');
    }
}
