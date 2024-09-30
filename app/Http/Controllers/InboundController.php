<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\InboundImport; 

class InboundController extends Controller
{
    public function index()
    {
        $inbounds = Inbound::all();
        return view('inventory.inbound.index', compact('inbounds'));
    }

    public function showImportForm()
    {
        return view('inventory.inbound.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);

        Excel::import(new InboundImport, $request->file('file'));
        return redirect()->route('inventory.inbound.index')->with('success', 'Data imported successfully.');
    }

    public function create()
    {
        return view('inventory.inbound.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'receive_date' => 'required|date',
            'no_document' => 'required|string|max:255',
            'consignee' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'material_description' => 'required|string',
            'inbound_qty' => 'required|numeric', 
            'uom' => 'required|string|max:50',
            'plt_id' => 'required|string|max:100',
            'location' => 'required|string|max:255',
        ]);

        Inbound::create($request->all());
        return redirect()->route('inventory.inbound.index')->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $inbound = Inbound::findOrFail($id);
        return view('inventory.inbound.edit', compact('inbound'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'receive_date' => 'required|date',
        'no_document' => 'required|string|max:255',
        'consignee' => 'required|string|max:255',
        'material' => 'required|string|max:255',
        'material_description' => 'required|string',
        'inbound_qty' => 'required|numeric', 
        'uom' => 'required|string|max:50',
        'plt_id' => 'required|string|max:100',
        'location' => 'required|string|max:255',
    ]);

    $inbound = Inbound::findOrFail($id);
    $inbound->update($request->all());

    return redirect()->route('inventory.inbound.index')->with('success', 'Data updated successfully.');
}

    public function destroy($id)
    {
        $inbound = Inbound::findOrFail($id);
        $inbound->delete();
        return redirect()->route('inventory.inbound.index')->with('success', 'Data has been deleted successfully');
    }

}
