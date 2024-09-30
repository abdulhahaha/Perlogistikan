<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Shipper ;

class ShipperController extends Controller
{
    public function index()
    {
        $shippers = Shipper::paginate(10);
        return view('master.shipper.index', compact('shippers'));
    }

    public function create()
    {
        return view('master.shipper.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:shippers',
            'shipper' => 'required',
            'status' => 'required|boolean',
        ]);

        Shipper::create($request->all());

        return redirect()->route('master.shipper.index')->with('success', 'Shipper created successfully.');
    }

    public function edit($id)
    {
        $shipper = Shipper::findOrFail($id);
        return view('master.shipper.edit', compact('shipper'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:shippers,code,' . $id,
            'shipper' => 'required',
            'status' => 'required|boolean',
        ]);

        $shipper = Shipper::findOrFail($id);
        $shipper->update($request->all());

        return redirect()->route('master.shipper.index')->with('success', 'Shipper updated successfully.');
    }

    public function destroy($id)
    {
        $shipper = Shipper::findOrFail($id);
        $shipper->delete();

        return redirect()->route('master.shipper.index')->with('success', 'Shipper deleted successfully.');
    }
}

