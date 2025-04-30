@extends('layouts.app')

@section('content')
    <h1 class="page-title">Dashboard</h1>
    
    <div class="welcome-card">
        <h2>Selamat Datang di Inventory Management System</h2>
        <p>Kelola inventaris Anda dengan mudah dan efisien. Gunakan sistem ini untuk melacak stok, memantau pergerakan barang, dan mengoptimalkan proses inventory Anda.</p>
    </div>
    
    <div class="table-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Daftar Inventory</h3>
            <a href="/inventory/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Item Baru
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Terakhir Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inventory as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['category'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>{{ $item['last_updated'] }}</td>
                        <td>
                            <a href="/inventory/{{ $item['id'] }}/edit" class="btn btn-sm btn-warning btn-action">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger btn-action" 
                                    onclick="confirmDelete({{ $item['id'] }})">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data inventory yang tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = '/inventory/' + id;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }
    </script>
@endsection