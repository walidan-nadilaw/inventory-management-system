@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Edit Item</h1>
                <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <form action="{{ route('inventory.update', $item['id']) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="item" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" name="item" id="item" value="{{ old('item', $item['item']) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            @error('item')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="category" id="category" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Electronics" {{ old('category', $item['category']) == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                <option value="Office Supplies" {{ old('category', $item['category']) == 'Office Supplies' ? 'selected' : '' }}>Office Supplies</option>
                                <option value="Furniture" {{ old('category', $item['category']) == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                                <option value="Elektronik" {{ old('category', $item['category']) == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                <option value="Pakaian" {{ old('category', $item['category']) == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                                <option value="Makanan" {{ old('category', $item['category']) == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                <option value="Minuman" {{ old('category', $item['category']) == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                <option value="Kesehatan" {{ old('category', $item['category']) == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                <option value="Alat Tulis" {{ old('category', $item['category']) == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis</option>
                                <option value="Lainnya" {{ old('category', $item['category']) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $item['quantity']) }}" min="0" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            @error('quantity')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $item['price']) }}" min="0" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                            @error('price')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('inventory.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Batal
                        </a>
                        <button type="submit" class="bg-warning hover:bg-amber-500 text-white px-6 py-2 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-warning">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection