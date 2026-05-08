@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-800 flex items-center justify-center py-12 px-4">
    <div class="bg-white rounded-lg shadow-md w-full max-w-md p-8">
        <div class="text-center mb-8">
            <img src="{{ asset('images/Logo-HMIT.png') }}" alt="HMIT Logo" class="mx-auto h-16 w-16 mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Ganti Password Admin</h2>
            <p class="text-gray-500 text-sm mt-1">Masukkan email dan password baru</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.forgot-password.update', ['secret' => $secret]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Admin</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500"
                    placeholder="admin@hmit.ac.id" required>
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 text-sm font-medium mb-2">Password Baru</label>
                <x-password-input id="new_password" name="new_password" placeholder="Minimal 8 karakter" ringColor="gray" required />
            </div>

            <div class="mb-6">
                <label for="new_password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password Baru</label>
                <x-password-input id="new_password_confirmation" name="new_password_confirmation" placeholder="Ulangi password baru" ringColor="gray" required />
            </div>

            <button type="submit"
                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-md transition duration-300">
                Ganti Password
            </button>
        </form>

        <p class="text-center text-gray-400 text-sm mt-6">
            <a href="{{ route('admin.login', ['secret' => $secret]) }}" class="hover:underline">← Kembali ke Login</a>
        </p>
    </div>
</div>
@endsection
