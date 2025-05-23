<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi</title>
    {{-- Menggunakan Tailwind CSS via CDN untuk kemudahan --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
        <div class="text-center mb-6">
            {{-- Anda bisa mengganti dengan logo atau ikon jika ada --}}
            <svg class="mx-auto h-12 w-auto text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="mt-4 text-2xl font-bold text-gray-900">
                Sistem Manajemen Barang Toko Sumber Plastik
            </h2>
            <p class="text-sm text-gray-600 mt-1">Silakan masukkan kredensial Anda.</p>
        </div>

        {{-- Tempat untuk menampilkan pesan error jika login gagal (opsional) --}}
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            Login gagal. Periksa kembali username dan password Anda.
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
            @csrf {{-- Token CSRF Laravel --}}

            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <input id="username" name="username" type="text"
                           class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required
                           autofocus>
                    {{-- @error('username')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror --}}
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password"
                           autocomplete="current-password"
                           class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required>
                    {{-- @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror --}}
                </div>
            </div>

            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition ease-in-out duration-150">
                    Masuk
                </button>
            </div>
        </form>
    </div>
</body>
</html>