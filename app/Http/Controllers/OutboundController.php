<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outbound;

class OutboundController extends Controller
{
    // Method untuk menampilkan daftar outbound
    public function index()
    {
        $outbounds = Outbound::all(); // Mengambil semua data outbound
        return view('inventory.outbound.index', compact('outbounds'));
    }

    // Method untuk menampilkan form tambah outbound
    public function create()
    {
        return view('inventory.outbound.add');
    }

    // Method untuk menyimpan data outbound ke database
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'shipped_date' => 'required|date',
            'no_document' => 'required|string|max:255',
            'shipper' => 'required|string|max:255',
            'plt_id' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'material' => 'required|string|max:255',
            'material_description' => 'required|string',
            'inbound_qty' => 'required|integer',
            'uom' => 'required|string|max:10',
            'remarks' => 'nullable|string',
        ]);

        // Simpan data ke database
        Outbound::create($request->all());

        return redirect()->route('inventory.outbound.index')->with('success', 'Outbound data added successfully');
    }
}
