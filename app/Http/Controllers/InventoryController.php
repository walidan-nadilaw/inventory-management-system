<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryHistory;
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
        $oldQty = $item->quantity;

        $validated = $request->validate([
            'item' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ]);

        $item->update($validated);

        InventoryHistory::create([
            'inventory_id' => $item->id,
            'item' => $item->item,
            'action' => 'updated',
            'old_quantity' => $oldQty,
            'new_quantity' => $validated['quantity'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home')->with('update', 'item berhasil diupdate');
    }

    public function history(){
        $histories = InventoryHistory::with('user')->latest()->get();
        return view('history', compact('histories'));
    }

    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
        return redirect()->route('home')->with('delete', 'item berhasil dihapus');
    }
}
