<?php

namespace App\Http\Controllers;

use App\Models\Count;
use App\Models\InventoryDetail;
use Illuminate\Http\Request;

class CountController extends Controller
{
    // Menampilkan seluruh data inventory (Cycle counts)
    public function index()
    {
        $counts = Count::all();
        return view('count.index', compact('counts'));
    }

    // Menampilkan form untuk menambah data cycle count
    public function create()
    {
        return view('count.create');
    }

    // Menyimpan data cycle count baru
    public function store(Request $request)
    {
        $request->validate([
            'material' => 'required|string',
            'material_description' => 'required|string',
            'location' => 'required|boolean',
            'actual_location' => 'nullable|string',
            'uom' => 'required|string',
            'qty' => 'required|integer',
        ]);

        Count::create($request->all());

        return redirect()->route('count.index')->with('success', 'Data Cycle Count berhasil ditambahkan');
    }

    // Menampilkan detail dari suatu cycle count
    public function show($id)
    {
        $counts = Count::findOrFail($id);
        return view('count.show', compact('Count'));
    }

    public function checkInventory()
    {
        // Logika pengecekan inventory otomatis
        $inventoryDetail = Count::all(); // Ambil semua data dari inventory

        // Logika pengecekan (bisa disesuaikan dengan kebutuhan)
        foreach ($inventoryDetail as $item) {
            // Kamu bisa menambahkan logika pengecekan di sini,
            // misalnya mengecek lokasi yang sesuai atau quantity yang benar.
            $item->location = $item->location ? 'Y' : 'N';  // Contoh sederhana
        }

        // Kembalikan hasil pengecekan ke tampilan
        return view('count.index', compact('inventoryDetail'));
    }
}