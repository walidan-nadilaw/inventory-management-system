@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Riwayat Perubahan Inventory</h3>
            <div class="flex space-x-3">
                <button class="px-4 py-2 border border-primary text-primary rounded-md hover:bg-blue-50 flex items-center">
                    <i class="fas fa-filter mr-2"></i> Filter
                </button>
                <button class="px-4 py-2 border border-success text-success rounded-md hover:bg-green-50 flex items-center">
                    <i class="fas fa-file-export mr-2"></i> Export
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="px-4 py-3 rounded-tl-lg">ID</th>
                        <th class="px-4 py-3">Nama Item</th>
                        <th class="px-4 py-3">Tindakan</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Pengguna</th>
                        <th class="px-4 py-3">Tanggal & Waktu</th>
                        <th class="px-4 py-3 rounded-tr-lg">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($history as $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $item['id'] }}</td>
                        <td class="px-4 py-3">{{ $item['item_name'] }}</td>
                        <td class="px-4 py-3">
                            @if($item['action'] == 'Stock Added')
                                <span class="bg-success text-white text-xs font-medium px-2.5 py-0.5 rounded">{{ $item['action'] }}</span>
                            @elseif($item['action'] == 'Stock Reduced')
                                <span class="bg-warning text-white text-xs font-medium px-2.5 py-0.5 rounded">{{ $item['action'] }}</span>
                            @else
                                <span class="bg-info text-white text-xs font-medium px-2.5 py-0.5 rounded">{{ $item['action'] }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $item['quantity'] ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $item['user'] }}</td>
                        <td class="px-4 py-3">{{ $item['date'] }}</td>
                        <td class="px-4 py-3">
                            <button class="bg-primary hover:bg-primary-hover text-white px-3 py-1 rounded flex items-center"
                                    x-data
                                    @click="$dispatch('open-detail-modal', {id: {{ $item['id'] }}})">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">Tidak ada data riwayat yang tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-6 flex justify-center">
            <nav class="flex space-x-1" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 cursor-not-allowed">
                    Previous
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-primary text-sm font-medium rounded-md text-white bg-primary">
                    1
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    3
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </a>
            </nav>
        </div>
    </div>

    <!-- History Detail Modals -->
    @foreach($history as $item)
    <div x-data="{ showDetailModal: false }"
         x-show="showDetailModal" 
         @open-detail-modal.window="if($event.detail.id === {{ $item['id'] }}) showDetailModal = true"
         @keydown.escape.window="showDetailModal = false"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0">
            <div x-show="showDetailModal" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div x-show="showDetailModal" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Detail Transaksi #{{ $item['id'] }}</h3>
                            <div class="mt-4 border-t border-gray-200 pt-4">
                                <div class="mb-4">
                                    <h6 class="font-medium text-gray-700 mb-2">Informasi Item</h6>
                                    <p class="text-sm text-gray-600"><span class="font-medium">Nama Item:</span> {{ $item['item_name'] }}</p>
                                    <p class="text-sm text-gray-600"><span class="font-medium">Tindakan:</span> {{ $item['action'] }}</p>
                                    <p class="text-sm text-gray-600"><span class="font-medium">Jumlah:</span> {{ $item['quantity'] ?? 'Tidak ada perubahan jumlah' }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="font-medium text-gray-700 mb-2">Informasi Transaksi</h6>
                                    <p class="text-sm text-gray-600"><span class="font-medium">Dilakukan Oleh:</span> {{ $item['user'] }}</p>
                                    <p class="text-sm text-gray-600"><span class="font-medium">Tanggal & Waktu:</span> {{ $item['date'] }}</p>
                                    <p class="text-sm text-gray-600"><span class="font-medium">Catatan:</span> {{ $item['notes'] ?? 'Tidak ada catatan' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" @click="showDetailModal = false" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection