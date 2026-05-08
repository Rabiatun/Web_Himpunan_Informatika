@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4">
    <div class="bg-white rounded-lg shadow-md w-full max-w-md p-8">
        <div class="text-center mb-8">
            <img src="{{ asset('images/Logo-HMIT.png') }}" alt="HMIT Logo" class="mx-auto h-16 w-16 mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Login Mahasiswa</h2>
            <p class="text-gray-500 text-sm mt-1">Masuk ke portal HMIT UTS</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('mahasiswa.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="email@example.com" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <x-password-input id="password" name="password" required />
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300">
                Masuk
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">
            Belum punya akun?
            <a href="{{ route('mahasiswa.register') }}" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
        </p>
        <p class="text-center text-gray-400 text-sm mt-2">
            <a href="{{ route('home') }}" class="hover:underline">← Kembali ke Beranda</a>
        </p>
    </div>
</div>
@endsection
