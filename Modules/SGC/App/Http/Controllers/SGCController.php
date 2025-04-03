<?php

namespace Modules\SGC\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Modules\SGC\App\Models\Audited;
use Modules\SGC\App\Models\Auditor;
use Modules\SGC\App\Models\Checklist;
use Modules\SGC\App\Models\Find;
use Modules\SGC\App\Models\Report;

class SGCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $assets = ['chart', 'animation'];

        return view('sgc::index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sgc::create');
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
        return view('sgc::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function informeAuditoria($report): mixed
    {
        //consultamos la información del informe de auditoria
        $report = Report::where('id', $report)->first();

        //consultamos los procesos auditors
        $auditors = Auditor::where('cycle_id', $report->cycle_id)->get();

        //consultamos los procesos auditados
        $auditeds = Audited::where('cycle_id', $report->cycle_id)->get();

        //consultamos los procesos auditados
        $process = Checklist::select('id', 'process', 'responsible', 'strength')
                    ->where('cycle_id', $report->cycle_id)
                    ->with('observations')
                    ->get();

        //consultamos el detalle de la orden de compra
        $findings = Find::whereIn('checklist_id', $process->pluck('id')->toArray())
                        ->with('checklist')
                        ->with('criterion')
                        ->get();

        //consultamos el resumen de los hallazgos por proceso
        $resumen = DB::table('sgc_checklists')
                    ->select('sgc_checklists.process',
                    DB::raw('SUM(CASE WHEN sgc_criterions.findings = "NC" THEN 1 ELSE 0 END) AS NC'),
                    DB::raw('SUM(CASE WHEN sgc_criterions.findings = "O" THEN 1 ELSE 0 END) AS O'))
                    ->join('sgc_criterions', 'sgc_checklists.id', '=', 'sgc_criterions.checklist_id')
                    ->groupBy('sgc_checklists.process')
                    ->get();

        //generamos la cantidad de paginas del PDF de la orden
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('sgc::PDF.informeAuditoria', compact('report', 'process', 'findings', 'resumen', 'auditors', 'auditeds'));
        $pdf->setPaper('letter');
        return $pdf->stream();
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
