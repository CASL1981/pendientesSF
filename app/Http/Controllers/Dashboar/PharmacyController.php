<?php

namespace App\Http\Controllers\Dashboar;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Pharmacy\App\Models\Pending;

class PharmacyController extends Controller
{
    public function index(Request $request)
    {
        // === Gráfica Mensual ===
        // Meses: 1, 2, 3, 4, 6, 7, 8 (correspondientes a Jan, Feb, Mar, Apr, Jun, Jul, Aug)
        $meses = [1, 2, 3, 4, 6, 7, 8];
        $categorias = ['Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug'];
        $totalData = [];
        $pipelineData = [];
        foreach ($meses as $mes) {
            $totalData[] = Pending::whereMonth('created_at', $mes)->count();
            $pipelineData[] = Pending::whereMonth('created_at', $mes)
                                      ->where('status', 'Terminado')
                                      ->count();
        }
        // Se envían las series en formato [totalData, pipelineData]
        $monthlySeries = [
            [
                'name' => 'total',
                'data' => array_values($totalData)
            ],
            [
                'name' => 'pipline',
                'data' => array_values($pipelineData)
            ]
        ];

        // === Gráfica Semanal ===
        $days = [];
        $successfulData = [];
        $failedData = [];
        // Últimos 10 días (puedes ajustar el rango)
        for ($i = 9; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $days[] = $date->format('D');
            $successfulCount = Pending::whereDate('created_at', $date)
                                        ->where('status', 'Terminado')
                                        ->count();
            $failedCount = Pending::whereDate('created_at', $date)
                                  ->where('status', 'Activo')
                                  ->count();
            $successfulData[] = $successfulCount;
            $failedData[] = $failedCount;
        }
        $weeklySeries = [
            [
                'name' => 'Successful deals',
                'data' => array_values($successfulData)
            ],
            [
                'name' => 'Failed deals',
                'data' => array_values($failedData)
            ]
        ];

        // === Gráfica Anual Radial ===
        $currentYear = Carbon::now()->year;
        $pendingCount = Pending::whereYear('created_at', $currentYear)
                                ->where('status', 'Activo')
                                ->count();
        $finishedCount = Pending::whereYear('created_at', $currentYear)
                                 ->where('status', 'Terminado')
                                 ->count();
        $yearlySeries = [ $pendingCount, $finishedCount ];
        $yearlyLabels = ['Pedidos Pendientes', 'Pedidos Terminados'];

        return Inertia::render('Dashboard', [
            'monthlyCategorias' => $categorias,
            'monthlySeries'     => $monthlySeries,
            'weeklyCategories'  => $days,
            'weeklySeries'      => $weeklySeries,
            'yearlySeries'      => $yearlySeries,
            'yearlyLabels'      => $yearlyLabels,
        ]);
    }
}
