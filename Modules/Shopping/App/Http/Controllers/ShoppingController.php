<?php

namespace Modules\Shopping\App\Http\Controllers;

use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = ['chart', 'animation'];

        return view('shopping::index', compact('assets'));
    }

}
