@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4">
    <div class="container mx-auto max-w-2xl">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Dashboard Admin</h2>
            <p class="text-gray-500 mb-6">{{ $admin['name'] }} | {{ $admin['email'] }}</p>

            <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4 mb-6">
                <p class="text-yellow-700 text-sm">Anda berhasil login sebagai admin menggunakan session.</p>
            </div>

            <a href="{{ route('admin.logout') }}"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm transition duration-300">
                Logout
            </a>
        </div>
    </div>
</div>
@endsection
