<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\User;
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
        $user = User::findOrFail(auth()->id());
        
        $validated = $request->validate([
            'item' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ]);
    
        Inventory::create($validated);

        InventoryHistory::create([
            'item' => $validated['item'],
            'action' => 'add',
            'new_quantity' => $validated['quantity'],
            'username' => $user->username,
        ]);
    
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
        $user = User::findOrFail(auth()->id());
        $oldQty = $item->quantity;

        $validated = $request->validate([
            'item' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ]);

        $item->update($validated);

        InventoryHistory::create([
            'item' => $item->item,
            'action' => 'update',
            'old_quantity' => $oldQty,
            'new_quantity' => $validated['quantity'],
            'username' => $user->username,
        ]);

        return redirect()->route('home')->with('update', 'item berhasil diupdate');
    }

    public function history(){
        $histories = InventoryHistory::with('user')->latest()->get();
        return view('history', compact('histories'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail(auth()->id());
        $item = Inventory::findOrFail($id);

        InventoryHistory::create([
            'item' => $item->item,
            'action' => 'delete',
            'username' => $user->username,
        ]);

        $item->delete();
        return redirect()->route('home')->with('delete', 'item berhasil dihapus');
    }
}
