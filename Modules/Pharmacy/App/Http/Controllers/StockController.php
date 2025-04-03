<?php

namespace Modules\Pharmacy\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\PendingDetailImport;
use App\Imports\StockImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Pharmacy\App\Models\Stock;

class StockController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $stocks = Stock::paginate(20);
        return view('pharmacy::stocks.index', compact('stocks'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new StockImport, $file);

        return redirect()->route('pharmacy.stock')->with('success', 'Import created successfully.');
    }

    public function detailpending(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new PendingDetailImport, $file);

        return redirect()->route('pharmacy.detail.pending')->with('success', 'Import created successfully.');
    }


    // Display the specified resource
    // public function show($id)
    // {
    //     $stock = Stock::find($id);
    //     if (!$stock) {
    //         return redirect()->route('stocks.index')->withErrors('Stock not found.');
    //     }
    //     return view('stocks.show', compact('stock'));
    // }

    // Update the specified resource in storage
    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'year' => 'sometimes|integer',
    //         'period' => 'sometimes|string',
    //         'product_id' => 'sometimes|integer',
    //         'product_name' => 'sometimes|string',
    //         'available' => 'sometimes|boolean',
    //     ]);

    //     $stock = Stock::find($id);
    //     if (!$stock) {
    //         return redirect()->route('stocks.index')->withErrors('Stock not found.');
    //     }

    //     $stock->update($validated);
    //     return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    // }

    // Remove all resources from storage
    public function destroy()
    {
        Stock::truncate();
        return redirect()->route('pharmacy.stock')->with('success', 'All records deleted successfully.');
    }
}
