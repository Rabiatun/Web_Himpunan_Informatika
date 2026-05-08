@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4">
    <div class="bg-white rounded-lg shadow-md w-full max-w-md p-8">
        <div class="text-center mb-8">
            <img src="{{ asset('images/Logo-HMIT.png') }}" alt="HMIT Logo" class="mx-auto h-16 w-16 mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Daftar Mahasiswa</h2>
            <p class="text-gray-500 text-sm mt-1">Buat akun portal HMIT UTS</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nama lengkap Anda" required>
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-gray-700 text-sm font-medium mb-2">NIM</label>
                <input type="text" id="nim" name="nim" value="{{ old('nim') }}"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nomor Induk Mahasiswa" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="email@example.com" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <x-password-input id="password" name="password" placeholder="Minimal 8 karakter" required />
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password</label>
                <x-password-input id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required />
            </div>

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300">
                Daftar
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">
            Sudah punya akun?
            <a href="{{ route('mahasiswa.login') }}" class="text-blue-600 hover:underline font-medium">Login di sini</a>
        </p>
        <p class="text-center text-gray-400 text-sm mt-2">
            <a href="{{ route('home') }}" class="hover:underline">← Kembali ke Beranda</a>
        </p>
    </div>
</div>
@endsection
