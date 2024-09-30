<?php

namespace App\Http\Controllers;

use App\Models\InventoryDetail;
use Illuminate\Http\Request;

class InventoryDetailsController extends Controller
{
    public function index()
    {
        $inventoryDetails = InventoryDetail::all(); 
        return view('inventory.detail.index', compact('inventoryDetails'));
    }

    public function create()
    {
        return view('inventory.detail.add');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'receive_date' => 'required|date',
            'location' => 'required|string|max:255',
            'plt_id' => 'required|string|max:100',
            'material' => 'required|string|max:255',
            'material_description' => 'nullable|string',
            'uom' => 'required|string|max:50',
            'unrestricted' => 'required|integer|min:0',
            'blocked' => 'required|integer|min:0',
            'remarks' => 'nullable|string'
        ]);

        InventoryDetail::create($request->all());
        return redirect()->route('inventory.detail.index')->with('success', 'Inventory detail added successfully.');
    }

    public function edit($id)
    {
        $inventoryDetail = InventoryDetail::findOrFail($id);
        return view('inventory.detail.edit', compact('inventoryDetail'));
    }

    public function show()
    {
        //
    }

    // Method untuk memperbarui data
    public function update(Request $request, InventoryDetail $inventoryDetail)
    {
        // Validasi input
        $request->validate([
            'receive_date' => 'required|date',
            'location' => 'required|string|max:255',
            'plt_id' => 'required|string|max:100',
            'material' => 'required|string|max:255',
            'material_description' => 'nullable|string',
            'uom' => 'required|string|max:50',
            'unrestricted' => 'required|integer|min:0',
            'blocked' => 'required|integer|min:0',
            'remarks' => 'nullable|string'
        ]);

        $inventoryDetail->update($request->all());
        return redirect()->route('inventory.detail.index')->with('success', 'Inventory detail updated successfully.');
    }

    public function destroy($id)
    {
        $inventoryDetail = InventoryDetail::findOrFail($id);
        $inventoryDetail->delete();

        return redirect()->route('inventory.detail.index')->with('success', 'Inventory item deleted successfully.');
    }
}
