<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::paginate(10);
        return view('master.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.location.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'whname' => 'required',
            'aisle' => 'required',
            'level' => 'required',
            'row' => 'required',
            'loc_area' => 'required',
        ]);

        Location::create($request->all());
        return redirect()->route('master.location.index')->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data location berdasarkan ID
        $location = Location::findOrFail($id);
        return view('master.location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data location berdasarkan ID
        $location = Location::findOrFail($id);
        return view('master.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'area' => 'required',
            'whname' => 'required',
            'aisle' => 'required',
            'level' => 'required',
            'row' => 'required',
            'loc_area' => 'required',
        ]);

        // Mengambil data location berdasarkan ID
        $location = Location::findOrFail($id);
        $location->update($request->all());

        return redirect()->route('master.location.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mengambil data location berdasarkan ID
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('master.location.index')->with('success', 'Location deleted successfully.');
    }
}
