@extends('layouts.app')

@section('content')
    <h1 class="page-title">Riwayat Transaksi</h1>
    
    <div class="table-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Riwayat Perubahan Inventory</h3>
            <div>
                <button class="btn btn-outline-primary me-2">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <button class="btn btn-outline-success">
                    <i class="fas fa-file-export"></i> Export
                </button>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Item</th>
                        <th>Tindakan</th>
                        <th>Jumlah</th>
                        <th>Pengguna</th>
                        <th>Tanggal & Waktu</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($history as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['item_name'] }}</td>
                        <td>
                            @if($item['action'] == 'Stock Added')
                                <span class="badge bg-success">{{ $item['action'] }}</span>
                            @elseif($item['action'] == 'Stock Reduced')
                                <span class="badge bg-warning">{{ $item['action'] }}</span>
                            @else
                                <span class="badge bg-info">{{ $item['action'] }}</span>
                            @endif
                        </td>
                        <td>{{ $item['quantity'] ?? '-' }}</td>
                        <td>{{ $item['user'] }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#historyModal{{ $item['id'] }}">
                                <i class="fas fa-eye"></i> Detail
                            </button>
                            
                            <!-- History Detail Modal -->
                            <div class="modal fade" id="historyModal{{ $item['id'] }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Transaksi #{{ $item['id'] }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h6>Informasi Item</h6>
                                                <p><strong>Nama Item:</strong> {{ $item['item_name'] }}</p>
                                                <p><strong>Tindakan:</strong> {{ $item['action'] }}</p>
                                                <p><strong>Jumlah:</strong> {{ $item['quantity'] ?? 'Tidak ada perubahan jumlah' }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <h6>Informasi Transaksi</h6>
                                                <p><strong>Dilakukan Oleh:</strong> {{ $item['user'] }}</p>
                                                <p><strong>Tanggal & Waktu:</strong> {{ $item['date'] }}</p>
                                                <p><strong>Catatan:</strong> {{ $item['notes'] ?? 'Tidak ada catatan' }}</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data riwayat yang tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection