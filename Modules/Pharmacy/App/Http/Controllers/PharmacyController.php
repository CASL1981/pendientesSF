<?php

namespace Modules\Pharmacy\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pharmacy\App\Models\Pending;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = ['chart', 'animation'];
        // Definimos los meses y las categorías que usará el gráfico
        $meses = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]; // Correspondiente a Jan, Feb, Mar, Apr, Jun, Jul, Aug
        $categorias = ['Ene', 'Feb', 'Mar', 'Abr', 'May','Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'];

        $totalData = [];
        $pipelineData = [];

        // Recorremos cada mes para contar los registros
        foreach ($meses as $mes) {
            // Cuenta total de registros en el mes
            $totalData[] = Pending::whereMonth('created_at', $mes)->count();

            // Cuenta de registros que cumplen una condición, por ejemplo: status = 'pipeline'
            $pipelineData[] = Pending::whereMonth('created_at', $mes)
            ->where('status', 'Terminado')
            ->count();
        }

        // Convertir a arrays planos (reindexados)
        $totalData = array_values($totalData);

        $pipelineData = array_values($pipelineData);

        // generando datos de la grafica semanal
        $days = [];
        $successfulData = [];
        $failedData = [];

        // Se consideran los últimos 10 días; ajustar el rango según se requiera
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            // Obtenemos la abreviatura del día; por ejemplo, "Mon", "Tue", etc.
            $days[] = $date->format('D');

            // Cuenta de registros con estado "Terminado" en la fecha
            $successfulCount = Pending::whereDate('created_at', $date)
                                        ->where('status', 'Terminado')
                                        ->count();

            // Cuenta de registros con estado "Activo" en la fecha
            $failedCount = Pending::whereDate('created_at', $date)
                                ->where('status', 'Activo')
                                ->count();

            $successfulData[] = $successfulCount;
            $failedData[] = $failedCount;
        }

        // Se reindexan los arrays para asegurarnos que sean planos
        $successfulData = array_values($successfulData);
        $failedData = array_values($failedData);


        //generando datos del gracfico anual
        $currentYear = Carbon::now()->year;

        // Cuenta de solicitudes pendientes (estado "Activo")
        $pendingCount = Pending::whereYear('created_at', $currentYear)
                                ->where('status', 'Activo')
                                ->count();

        // Cuenta de solicitudes terminadas (estado "Terminado")
        $finishedCount = Pending::whereYear('created_at', $currentYear)
                                ->where('status', 'Terminado')
                                ->count();


        return view('pharmacy::index', compact(
            'assets',
            'categorias',
            'totalData',
            'pipelineData',
            'days',
            'successfulData',
            'failedData',
            'pendingCount',
            'finishedCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pharmacy::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('pharmacy::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pharmacy::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
