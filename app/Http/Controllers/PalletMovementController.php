<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryDetail;
use App\Models\Material;
use App\Models\Location;
use App\Models\PalletMovement;

class PalletMovementController extends Controller
{
    public function create()
    {
        $inventoryDetails = InventoryDetail::all();
        $materials = Material::all();
        $locations = Location::all();

        return view('pallet_movement.add', compact('inventoryDetails', 'materials', 'locations'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'from_plt_id' => 'required|exists:inventory_details,id',
            'to_plt_id' => 'required|exists:inventory_details,id',
            'material_id' => 'required|exists:materials,id',
            'location_id' => 'required|exists:locations,id',
            'qty' => 'required|integer',
        ]);

        PalletMovement::create($validatedData);

        return redirect()->back()->with('success', 'Location movement berhasil ditambahkan!');
    }

    public function index()
    {
        $pallet_movement = PalletMovement::with(['fromPlt', 'toPlt', 'material', 'location'])->get();

        return view('pallet_movement.index', compact('pallet_movement'));
    }
}
