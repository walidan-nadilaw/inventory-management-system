<?php 

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('home', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric|min:0', 
            'jumlah' => 'required|integer|min:0', 
        ]);

        Item::create($validated);
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:0', 
        ]);
        
        $item = Item::findOrFail($id);
        $item->update($validated);
        return redirect()->back()->with('success', 'Item berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }
}