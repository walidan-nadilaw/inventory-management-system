@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-8 pb-4 border-b border-gray-200">Dashboard</h1>
<div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold mb-3">Selamat Datang di Inventory Management System</h2>
    <p class="text-gray-600">Kelola inventaris Anda dengan mudah dan efisien. Gunakan sistem ini untuk melacak stok, memantau pergerakan barang, dan mengoptimalkan proses inventory Anda.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-500 text-white mr-4">
                <i class="fas fa-box text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Total Item</h3>
                <p class="text-2xl font-bold">{{ $totalItems }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-500 text-white mr-4">
                <i class="fas fa-cubes text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Total Stok</h3>
                <p class="text-2xl font-bold">{{ $totalStok }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-purple-50 border-l-4 border-purple-500 rounded-lg p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-500 text-white mr-4">
                <i class="fas fa-money-bill-wave text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Total Nilai</h3>
                <p class="text-2xl font-bold">Rp {{ number_format($totalNilai, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold">Daftar Inventory</h3>
        <a href="{{ route('items.index') }}" class="bg-primary hover:bg-primary-hover text-white px-4 py-2 rounded-md flex items-center">
            <i class="fas fa-tasks mr-2"></i> Kelola Inventory
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="px-4 py-3 rounded-tl-lg">ID</th>
                    <th class="px-4 py-3">Nama Produk</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3 rounded-tr-lg">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $item->id }}</td>
                    <td class="px-4 py-3">{{ $item->nama }}</td>
                    <td class="px-4 py-3">{{ $item->jumlah }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">Tidak ada data inventory yang tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection