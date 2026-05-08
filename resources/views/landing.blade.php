<!-- resources/views/landing.blade.php -->
@extends('layouts.app') {{-- Menggunakan layout dasar yang sudah kita buat --}}

@section('content') {{-- Bagian ini akan diisi ke dalam @yield('content') di layout --}}

    <!-- ======================= HEADER SECTION ======================= -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            {{-- Logo dan Nama Organisasi di Header --}}
            <div class="flex items-center space-x-2">
                <img src="../images/Logo-HMIT.png" alt="HMIT Logo" class="h-10 w-10"> {{-- Ganti # dengan path gambar logo HMIT Anda (misal: {{ asset('images/hmit-logo.png') }}) --}}
                <span class="text-2xl font-bold text-gray-900">HMIT</span>
            </div>

            {{-- Navigasi Utama (Desktop) --}}
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#beranda" class="text-gray-600 hover:text-blue-600 font-medium">Beranda</a>
                <a href="#tentang-kami" class="text-gray-600 hover:text-blue-600 font-medium">Tentang Kami</a>

                <!-- Dropdown Informasi -->
                {{-- 'relative' dan 'group' untuk mengaktifkan dropdown saat di-hover --}}
                <div class="relative group">
                    <button class="text-gray-600 hover:text-blue-600 font-medium focus:outline-none flex items-center">
                        Informasi
                        {{-- Icon panah, akan berputar saat di-hover --}}
                        <svg class="ml-1 w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    {{-- Konten Dropdown, 'hidden' secara default, 'group-hover:block' untuk muncul saat di-hover --}}
                    <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md mt-2 w-48 py-2 z-10">
                        <a href="#profile-himpunan" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile Himpunan</a>
                        <a href="#divisi-himpunan" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Divisi Himpunan</a>
                    </div>
                </div>

                <a href="#kontak" class="text-gray-600 hover:text-blue-600 font-medium">Kontak</a>
                <a href="{{ route('mahasiswa.login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md font-medium transition duration-300">Masuk</a>
                <a href="{{ route('mahasiswa.register') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md font-medium transition duration-300">Daftar</a>
            </nav>

            {{-- Tombol untuk Menu Mobile (jika Anda ingin menambahkannya nanti) --}}
            <div class="md:hidden">
                <button class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <main>
        <!-- ======================= HERO SECTION ======================= -->
        {{-- Bagian pembuka halaman --}}
       <section id="beranda" class="relative py-24 text-center text-white overflow-hidden min-h-[500px] flex items-center justify-center">
    {{-- Background Image --}}
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/Foto 1.png') }}');"></div>

    {{-- Overlay untuk membuat teks lebih mudah dibaca --}}
    <div class="absolute inset-0 bg-black opacity-50"></div>

    {{-- Konten Hero (Logo, Judul, Deskripsi) --}}
    <div class="relative z-10 container mx-auto px-6">
        <img src="{{ asset('images/Logo-HMIT.png') }}" alt="HMIT UTS Logo Besar" class="mx-auto h-40 w-40 mb-6">
        <h1 class="text-5xl font-extrabold mb-4">HMIT UTS</h1>
        <p class="text-xl max-w-2xl mx-auto">Himpunan Mahasiswa Informatika adalah salah satu Lembaga Mahasiswa yang berada di lingkungan Fakultas Rekayasa Sistem</p>
    </div>
</section>

        <!-- ======================= VISI & MISI SECTION ======================= -->
        {{-- Bagian penjelasan visi dan misi --}}
        <section id="tentang-kami" class="py-16 bg-white">
            <div class="container mx-auto px-6 max-w-4xl">
                <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Visi & Misi Untuk Kepengurusan Himpunan Informatika Universitas Teknologi Sumbawa</h2>

                <div class="grid md:grid-cols-2 gap-12">
                    {{-- Kotak Visi --}}
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-2xl font-semibold text-blue-700 mb-4">Visi</h3>
                        <p class="text-gray-700 leading-relaxed">Menjadikan Program Studi Informatika yang bereputasi dan bermartabat di bidang informatika</p>
                    </div>

                    {{-- Kotak Misi --}}
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-2xl font-semibold text-blue-700 mb-4">Misi</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-2 leading-relaxed">
                            <li>Melaksanakan regenerasi yang bereputasi dan bermartabat untuk menghasilkan estafet kepengurusan</li>
                            <li>Menyelenggarakan penelitian di bidang informatika yang bermanfaat bagi industri dan berkontribusi nyata dalam pengembangan ilmu pengetahuan</li>
                            <li>Melakukan pengabdian kepada masyarakat di bidang informatika yang berkontribusi nyata untuk kemajuan masyarakat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======================= DEPARTEMEN SECTION (DIVISI HIMPUNAN) ======================= -->
        {{-- Bagian penjelasan tugas dan fungsi setiap departemen --}}
        <section id="divisi-himpunan" class="py-16 bg-blue-50">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Penjelasan Tugas dan Fungsi Setiap Departemen di Himpunan Mahasiswa Informatika</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Contoh Kotak Departemen (PWTI) --}}
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-blue-600 mb-3">PWTI</h3>
                        <p class="text-gray-700 text-sm">Divisi PWTI bertanggung jawab dalam memperluas cakrawala serta pengetahuan mahasiswa mengenai perkembangan teknologi terkini di bidang Informatika.</p>
                    </div>
                    {{-- Lanjutkan dengan departemen lain seperti ini --}}
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-blue-600 mb-3">PSDM</h3>
                        <p class="text-gray-700 text-sm">Departemen PSDM bertanggung jawab dalam merancang program pengembangan karakter, kepemimpinan, dan peningkatan kualitas diri seluruh anggota Himpunan Mahasiswa Informatika.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-blue-600 mb-3">SOSMAS</h3>
                        <p class="text-gray-700 text-sm">Departemen SOSMAS bertanggung jawab dalam membangun hubungan harmonis antara mahasiswa dengan masyarakat luar melalui aksi sosial dan program pengabdian yang berdampak nyata.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-blue-600 mb-3">KESRA</h3>
                        <p class="text-gray-700 text-sm">Departemen KESRA bertanggung jawab dalam memfasilitasi penyaluran bakat, minat, dan kegemaran mahasiswa di bidang non-akademik, khususnya seni dan aktivitas fisik.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-blue-600 mb-3">MEDIA</h3>
                        <p class="text-gray-700 text-sm">Departemen Media bertanggung jawab dalam mengelola representasi visual, dokumentasi, dan publikasi konten kreatif guna membangun identitas digital Himpunan Mahasiswa Informatika.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-xl font-semibold text-blue-600 mb-3">KWU</h3>
                        <p class="text-gray-700 text-sm">Departemen KWU bertanggung jawab dalam menumbuhkan jiwa kemandirian ekonomi dan mengelola unit usaha kreatif untuk mendukung finansial Himpunan Mahasiswa Informatika.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======================= PROGRAM KERJA SECTION ======================= -->
        {{-- Bagian untuk menampilkan kegiatan atau program kerja --}}
        <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Program Kerja Kami <br> Kegiatan dan Aktivitas Kami di Himpunan Mahasiswa Informatika</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Kotak Kegiatan 1: GUEST LECTURE (dengan gambar) -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden h-48 hover:shadow-lg transition duration-300">
                    {{-- Gambar latar belakang --}}
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/Guest Lecture.jpg') }}');"></div> {{-- GANTI DENGAN PATH GAMBAR RELEVAN --}}
                    {{-- Overlay untuk teks agar lebih jelas --}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    {{-- Teks di atas gambar --}}
                    <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white p-4">
                        <h3 class="text-xl font-semibold">GUEST LECTURE</h3>
                    </div>
                </div>

                <!-- Kotak Kegiatan 2: IT BOOTCAMP (dengan gambar) -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden h-48 hover:shadow-lg transition duration-300">
                    {{-- Gambar latar belakang --}}
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/IT Bootcamp.JPG') }}');"></div> {{-- GANTI DENGAN PATH GAMBAR RELEVAN --}}
                    {{-- Overlay untuk teks agar lebih jelas --}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    {{-- Teks di atas gambar --}}
                    <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white p-4">
                        <h3 class="text-xl font-semibold">IT BOOTCAMP</h3>
                    </div>
                </div>

                <!-- Kotak Kegiatan 3: MBKM SHARING (dengan gambar) -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden h-48 hover:shadow-lg transition duration-300">
                    {{-- Gambar latar belakang --}}
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/MBKM Sharing.JPG') }}');"></div> {{-- GANTI DENGAN PATH GAMBAR RELEVAN --}}
                    {{-- Overlay untuk teks agar lebih jelas --}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    {{-- Teks di atas gambar --}}
                    <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white p-4">
                        <h3 class="text-xl font-semibold">MBKM SHARING</h3>
                    </div>
                </div>

                <!-- Kotak Kegiatan 4: FAMILY GATHERING (dengan gambar) -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden h-48 hover:shadow-lg transition duration-300">
                    {{-- Gambar latar belakang --}}
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/Family Gathering.jpg') }}');"></div> {{-- GANTI DENGAN PATH GAMBAR RELEVAN --}}
                    {{-- Overlay untuk teks agar lebih jelas --}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    {{-- Teks di atas gambar --}}
                    <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white p-4">
                        <h3 class="text-xl font-semibold">FAMILY GATHERING</h3>
                    </div>
                </div>

                <!-- Kotak Kegiatan 5: ORIENTASI JURUSAN (dengan gambar) -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden h-48 hover:shadow-lg transition duration-300">
                    {{-- Gambar latar belakang --}}
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/Orientasi Jurusan.jpg') }}');"></div> {{-- GANTI DENGAN PATH GAMBAR RELEVAN --}}
                    {{-- Overlay untuk teks agar lebih jelas --}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    {{-- Teks di atas gambar --}}
                    <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white p-4">
                        <h3 class="text-xl font-semibold">ORIENTASI JURUSAN</h3>
                    </div>
                </div>

                <!-- Kotak Placeholder Kosong (tetap sama jika itu yang diinginkan) -->
                <div class="bg-gray-200 p-8 rounded-lg shadow-inner flex flex-col justify-center items-center text-center h-48 text-gray-600">
                    <p>Konten kegiatan lainnya...</p>
                </div>

            </div>
        </div>
    </section>

        <!-- ======================= HUBUNGI KAMI SECTION ======================= -->
        {{-- Bagian formulir kontak --}}
        <section id="kontak" class="py-16 bg-white">
            <div class="container mx-auto px-6 max-w-2xl">
                <h2 class="text-4xl font-bold text-center text-gray-900 mb-8">HUBUNGI KAMI</h2>
                <p class="text-center text-gray-700 mb-8">Apabila Anda memiliki kritik dan saran ataupun pertanyaan untuk HMIT dipersilahkan untuk mengisi kolom di bawah</p>

                <form action="#" method="POST" class="bg-gray-50 p-8 rounded-lg shadow-md">
                    @csrf {{-- Penting untuk keamanan Laravel --}}
                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Pesan Anda:</label>
                        <textarea id="message" name="message" rows="6" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-y" placeholder="Tulis kritik, saran, atau pertanyaan Anda di sini..."></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline transition duration-300">
                            KIRIM
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER SECTION ======================= -->
    <!-- Bagian FOOTER SECTION di resources/views/landing.blade.php -->
    <footer class="bg-gray-900 text-gray-200 py-12 mt-16">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="col-span-1 md:col-span-2 space-y-4">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/Logo-HMIT.png') }}" alt="HMIT UTS Footer Logo" class="h-12 w-12"> {{-- Sesuaikan path gambar logo utama Anda --}}
                    <h3 class="text-3xl font-bold">HMIT UTS</h3>
                </div>
                <p class="text-gray-400 text-sm">Himpunan Mahasiswa Informatika adalah salah satu Lembaga Mahasiswa yang berada di lingkungan Fakultas Rekayasa Sistem</p>
                <div class="flex space-x-4 mt-6">
                    {{-- Ganti Ikon Facebook --}}
                    <a href="https://www.facebook.com/profile.php?id=61554886307869" target="_blank" class="block h-10 w-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition duration-300" aria-label="Facebook">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="h-6 w-6"> {{-- Sesuaikan h-6 w-6 jika ikon Anda terlalu besar/kecil --}}
                    </a>
                    {{-- Ganti Ikon Instagram --}}
                    <a href="https://instagram.com/hmit.uts" target="_blank" class="block h-10 w-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition duration-300" aria-label="Instagram">
                        <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="h-6 w-6"> {{-- Sesuaikan h-6 w-6 jika ikon Anda terlalu besar/kecil --}}
                    </a>
                    {{-- Tambahkan Ikon TikTok jika Anda punya gambar tiktok.png --}}
                    <a href="https://tiktok.com/@hmit.uts" target="_blank" class="block h-10 w-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition duration-300" aria-label="TikTok">
                        <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" class="h-6 w-6"> {{-- Sesuaikan h-6 w-6 jika ikon Anda terlalu besar/kecil --}}
                    </a>
                </div>
            </div>

            <!-- Navigasi Cepat dan Divisi (tetap sama) -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">NAVIGASI</h4>
                <ul class="space-y-2">
                    <li><a href="#beranda" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">Beranda</a></li>
                    <li><a href="#tentang-kami" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">Tentang Kami</a></li>
                    <li><a href="#divisi-himpunan" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">Informasi</a></li>
                    <li><a href="#kontak" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white mb-4">DIVISI</h4>
                <ul class="space-y-2">
                    <li><a href="#divisi-himpunan" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">PWTI</a></li>
                    <li><a href="#divisi-himpunan" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">PSDM</a></li>
                    <li><a href="#divisi-himpunan" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">SOSMAS</a></li>
                    <li><a href="#divisi-himpunan" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">KESRA</a></li>
                    <li><a href="#divisi-himpunan" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">MEDIA</a></li>
                    <li><a href="#divisi-himpunan" class="text-gray-400 hover:text-blue-500 transition duration-300 text-sm">KWU</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center text-gray-500 text-sm mt-10">
            &copy; {{ date('Y') }} HMIT UTS. All rights reserved.
        </div>
    </footer>

@endsection {{-- Akhir dari bagian konten --}}
