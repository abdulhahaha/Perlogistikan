<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::paginate(10);
        return view('master.material.index', compact('materials'));
    }

    public function create()
    {
        return view('master.material.add');
    }

    // Menyimpan material baru
    public function store(Request $request)
    {
        $request->validate([
            'material' => 'required',
            'material_description' => 'required',
            'uom' => 'required',
            'check' => 'required|boolean',
        ]);

        Material::create($request->all());

        return redirect()->route('master.material.index')->with('success', 'Material created successfully.');
    }

    // Menampilkan form edit material
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('master.material.edit', compact('material'));
    }

    // Mengupdate material yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'material' => 'required',
            'material_description' => 'required',
            'uom' => 'required',
            'check' => 'required|boolean',
        ]);

        $material = Material::findOrFail($id);
        $material->update($request->all());

        return redirect()->route('master.material.index')->with('success', 'Material updated successfully.');
    }

    // Menghapus material
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('master.material.index')->with('success', 'Material deleted successfully.');
    }
}

