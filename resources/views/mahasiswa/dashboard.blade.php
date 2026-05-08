@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4">
    <div class="container mx-auto max-w-2xl">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Selamat datang, {{ $mahasiswa->name }}</h2>
            <p class="text-gray-500 mb-6">NIM: {{ $mahasiswa->nim }} | {{ $mahasiswa->email }}</p>

            <div class="bg-blue-50 border border-blue-200 rounded-md p-4 mb-6">
                <p class="text-blue-700 text-sm">Anda berhasil login sebagai mahasiswa menggunakan cookie.</p>
            </div>

            <a href="{{ route('mahasiswa.logout') }}"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm transition duration-300">
                Logout
            </a>
        </div>
    </div>
</div>
@endsection
