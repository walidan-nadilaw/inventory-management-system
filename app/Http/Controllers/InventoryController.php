<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory = \App\Models\Inventory::all();
        return view('home', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Inventory::create($request->validate([
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required|integer',
        ]));
    
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Inventory::findOrFail($id);
        return view('edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Inventory::findOrFail($id);
        $item->update($request->validate([
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required|integer',
        ]));
    
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
        return redirect()->route('home');
    }
}
