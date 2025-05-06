<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Jika Anda memiliki middleware auth, aktifkan baris di bawah ini
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Mengambil semua data item
        $items = Item::all();
        
        // Menghitung total item (jumlah record)
        $totalItems = $items->count();
        
        // Menghitung total stok (jumlah dari semua barang)
        $totalStok = $items->sum('jumlah');
        
        // Menghitung total nilai inventory (harga x jumlah)
        $totalNilai = $items->sum(function($item) {
            return $item->harga * $item->jumlah;
        });
        
        return view('home', compact('items', 'totalItems', 'totalStok', 'totalNilai'));
    }
}