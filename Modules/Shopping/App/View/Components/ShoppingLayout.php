<?php

namespace Modules\Shopping\App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ShoppingLayout extends Component
{
    public $layout, $dir, $assets;

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
        return view('shopping::components.shoppinglayout');
    }
}
