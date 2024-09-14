<?php

namespace Modules\Pharmacy\App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PharmacyLayout extends Component
{
    public $layout;

    public  $dir;

    public  $assets;

    /**
     * Create a new component instance.
     */
    public function __construct($layout = '', $dir=false, $assets = [])
    {
        $this->layout = $layout;
        $this->dir = $dir;
        $this->assets = $assets;
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('pharmacy::layouts.pharmacy');
    }
}
