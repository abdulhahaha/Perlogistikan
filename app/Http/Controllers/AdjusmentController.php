<?php

namespace App\Http\Controllers;

use App\Models\Adjusment;
use Illuminate\Http\Request;

class AdjusmentController extends Controller
{
    // Menampilkan seluruh data adjustment
    public function index()
    {
        $adjusments = Adjusment::all();
        return view('adjusment.index', compact('adjusments'));
    }

    // Menampilkan form untuk menambah adjustment
    public function create()
    {
        return view('adjusment.create');
    }

    // Menyimpan data adjustment baru
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string',
            'location' => 'required|string',
            'plt_id' => 'required|string',
            'material' => 'required|string',
            'material_description' => 'required|string',
            'uom' => 'required|string',
            'qty' => 'required|integer',
        ]);

        Adjusment::create($request->all());

        return redirect()->route('adjusment.index')->with('success', 'Data Adjusments berhasil ditambahkan');
    }

    // Menampilkan detail dari suatu Adjusments
    public function show($id)
    {
        $adjusments = Adjusment::findOrFail($id);
        return view('adjusment.show', compact('adjusments'));
    }

    // Menampilkan form edit Adjusments
    public function edit($id)
    {
        $adjusments = Adjusment::findOrFail($id);
        return view('adjusment.edit', compact('adjusments'));
    }

    // Memperbarui data Adjusments yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string',
            'location' => 'required|string',
            'plt_id' => 'required|string',
            'material' => 'required|string',
            'material_description' => 'required|string',
            'uom' => 'required|string',
            'qty' => 'required|integer',
        ]);

        $adjusments = Adjusment::findOrFail($id);
        $adjusments->update($request->all());

        return redirect()->route('adjusment.index')->with('success', 'Data Adjusments berhasil diperbarui');
    }

    // Menghapus data Adjusments
    public function destroy($id)
    {
        $adjusments = Adjusment::findOrFail($id);
        $adjusments->delete();

        return redirect()->route('adjusment.index')->with('success', 'Data Adjusments berhasil dihapus');
    }
}
