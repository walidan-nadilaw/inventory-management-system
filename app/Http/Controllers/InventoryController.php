<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = \App\Models\Inventory::all();
        return view('home', compact('inventory'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ]);
    
        Inventory::create($validated);
    
        return redirect()->route('home')->with('add', 'Item berhasil ditambahkan.');
    }    

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit($id)
    {
        $item = Inventory::findOrFail($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Inventory::findOrFail($id);
        $item->update($request->validate([
            'item' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ]));
    
        return redirect()->route('home')->with('update', 'item berhasil diupdate');
    }

    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
        return redirect()->route('home')->with('delete', 'item berhasil dihapus');
    }
}
