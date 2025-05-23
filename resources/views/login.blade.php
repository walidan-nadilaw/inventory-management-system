<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    {{-- Ini adalah cara cepat untuk menggunakan Tailwind CSS melalui CDN.
         Untuk produksi, lebih baik menginstalnya sebagai bagian dari build project Laravel Anda. --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Selamat Datang! 👋</h2>
        <p class="text-center text-gray-600 mb-8">Silakan masuk untuk melanjutkan.</p>

        {{-- Pesan error umum atau sukses bisa ditampilkan di sini --}}
        {{-- @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif --}}
        {{-- @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form action="{{-- URL untuk_proses_login_Anda --}}" method="POST">
            @csrf {{-- Token CSRF untuk keamanan form Laravel --}}

            <div class="mb-5">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username <span class="text-red-500">*</span></label>
                <input type="text"
                       name="username"
                       id="username"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out"
                       placeholder="Masukkan username Anda"
                       value="{{ old('username') }}" {{-- Untuk mempertahankan input lama jika ada error validasi --}}
                       required
                       autofocus>
                {{-- Blok untuk menampilkan error validasi spesifik untuk username --}}
                {{-- @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                <input type="password"
                       name="password"
                       id="password"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out"
                       placeholder="Masukkan password Anda"
                       required>
                {{-- Blok untuk menampilkan error validasi spesifik untuk password --}}
                {{-- @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            {{-- Opsi "Ingat Saya" opsional --}}
            {{-- <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Ingat Saya
                    </label>
                </div>
            </div> --}}

            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    Masuk 🚀
                </button>
            </div>
        </form>

        {{-- Link ke halaman registrasi atau lupa password (opsional) --}}
        {{-- <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Belum punya akun? <a href="{{-- URL_halaman_registrasi --}}" class="font-medium text-indigo-600 hover:text-indigo-500">Daftar di sini</a>
            </p>
            <p class="text-sm text-gray-600 mt-2">
                <a href="{{-- URL_lupa_password --}}" class="font-medium text-indigo-600 hover:text-indigo-500">Lupa password?</a>
            </p>
        </div> --}}

    </div>
</body>
</html>