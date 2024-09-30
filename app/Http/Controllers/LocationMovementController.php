<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationMovement;
use App\Models\Location;
use App\Models\Material;
use App\Models\InventoryDetail;

class LocationMovementController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        $materials = Material::all();
        $inventoryDetails = InventoryDetail::all();
        
        return view('location_movement.add', compact('locations', 'materials', 'inventoryDetails'));
    }

    // Menyimpan data Location Movement ke database
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'from_location' => 'required|exists:locations,id',
            'material_id' => 'required|exists:materials,id',
            'material_description' => 'required|string',
            'plt_id' => 'required|exists:inventory,id',
            'qty' => 'required|integer',
            'to_location' => 'required|exists:locations,id',
        ]);

        LocationMovement::create([
            'date' => $request->date,
            'from_location' => $request->from_location,
            'material_id' => $request->material_id,
            'material_description' => $request->material_description,
            'plt_id' => $request->plt_id,
            'qty' => $request->qty,
            'to_location' => $request->to_location,
        ]);

        return redirect()->route('location_movement.index')->with('success', 'Location Movement berhasil disimpan!');
    }

    // Menampilkan daftar Location Movement
    public function index()
    {
        $location_movement = LocationMovement::with(['fromLocation', 'toLocation', 'material'])->get();
        return view('location_movement.index', compact('location_movement'));
    }
}
