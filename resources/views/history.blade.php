@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold mb-4">History Perubahan Inventory</h3>
    <table class="w-full text-left">
        <thead class="bg-dark text-white">
            <tr>
                <th class="px-4 py-3">Waktu </th>
                <th class="px-4 py-3">Item</th>
                <th class="px-4 py-3">Aksi</th>
                <th class="px-4 py-3">Jumlah Sebelumnya</th>
                <th class="px-4 py-3">Jumlah Baru</th>
                <th class="px-4 py-3">User</th>
            </tr>
        </thead>
        <tbody>
            @forelse($histories as $history)
            <tr>
                <td class="px-4 py-3">{{ $history->created_at->subHour()->setTimezone('Asia/Singapore')->format('Y-m-d H:i:s') }}</td>
                <td class="px-4 py-3">{{ $history->item }}</td> 
                <td class="px-4 py-3">{{ ucfirst($history->action) }}</td>
                <td class="px-4 py-3">{{ $history->old_quantity }}</td>
                <td class="px-4 py-3">{{ $history->new_quantity }}</td>
                <td class="px-4 py-3">{{ $history->username ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4">Belum ada history perubahan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection