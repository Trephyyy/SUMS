<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();

        return Inertia::render("Units/UnitAll", ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Units/UnitCreate");        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'SKU' => 'required|max:255|unique:units',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);
    Unit::create($validatedData);
    
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit = Unit::all()->find( $id );

        return Inertia::render("Units/UnitOne", ['unit' => $unit]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Unit::all()->find( $id );

        return Inertia::render("Units/UnitEdit", ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = Unit::all()->find( $id );

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'SKU' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
        $unit->name = $validatedData['name'];
        $unit->price = $validatedData['price'];
        $unit->quantity = $validatedData['quantity'];
        $unit->SKU = $validatedData['SKU'];
        $unit->save($validatedData);
        error_log('successfull');
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::all()->find( $id )->delete();
        
    }
}
