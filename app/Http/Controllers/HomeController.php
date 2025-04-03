<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Pharmacy\App\Models\Pending;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {
        $assets = ['chart', 'animation'];

        return view('dashboards.dashboard', compact('assets',));
    }

     /*
     * uisheet Page Routs
     */
    public function uisheet(Request $request)
    {
        return view('welcome');
    }
}
