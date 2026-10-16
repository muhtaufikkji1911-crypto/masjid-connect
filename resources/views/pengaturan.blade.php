@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-12">
    
    <!-- Header Page -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-2">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1 tracking-tight">Pengaturan Sistem</h1>
            <p class="text-sm text-gray-500">Kelola profil masjid, manajemen pengurus, dan konfigurasi sistem.</p>
        </div>
    </div>

    <!-- Tabs Navigasi Pengaturan -->
    <div class="flex border-b border-gray-200 space-x-8 text-xs font-bold text-gray-500 bg-white px-6 rounded-t-2xl pt-4 shadow-sm">
        <button class="pb-3 border-b-2 border-[#063f2b] text-[#063f2b]">Profil Masjid</button>
        <button class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Pengurus & Hak Akses</button>
        <button class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Notifikasi & Integrasi</button>
        <button class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Backup & Sistem</button>
    </div>

    <!-- Konten Utama: Grid Layout (Kiri: Identitas & Lokasi, Kanan: Rekening & QRIS) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Kolom Kiri & Tengah (Span 2) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Box 1: Identitas Masjid -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-5 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                <h2 class="font-bold text-gray-900 text-sm pl-2">Identitas Masjid</h2>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 pl-2 items-center">
                    <!-- Upload Logo -->
                    <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-2xl p-4 bg-gray-50/50 text-center">
                        <div class="w-14 h-14 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-gray-400 mb-2">
                            <i class="fa-solid fa-mosque text-xl"></i>
                        </div>
                        <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider mb-2">UPLOAD LOGO</span>
                        <button class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-3 py-1.5 rounded-lg text-[11px] font-bold shadow-sm transition">Ubah Foto</button>
                    </div>

                    <!-- Input Nama & ID -->
                    <div class="sm:col-span-2 space-y-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Nama Masjid</label>
                            <input type="text" value="Masjid Al-Ikhlas" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Nomor ID Masjid (Legal / Kemenag)</label>
                            <input type="text" value="01.2.04.14.05.000123" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Box 2: Lokasi & GPS -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-5 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                <h2 class="font-bold text-gray-900 text-sm pl-2">Lokasi & GPS</h2>

                <div class="space-y-4 pl-2">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Alamat Lengkap</label>
                        <input type="text" value="Jl. Perintis Kemerdekaan KM.10, Bumi Tamalanrea Permai (BTP) Blok M, Makassar" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Kota / Kabupaten</label>
                            <input type="text" value="Kota Makassar" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Kecamatan</label>
                            <input type="text" value="Tamalanrea" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Latitude</label>
                            <input type="text" value="-5.133297" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>
                        <div class="flex space-x-2">
                            <div class="flex-1">
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Longitude</label>
                                <input type="text" value="119.488342" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                            <button class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-4 py-2.5 rounded-xl text-xs font-bold transition shadow-sm h-[38px] shrink-0 flex items-center space-x-1.5">
                                <i class="fa-solid fa-location-crosshairs"></i>
                                <span>Ambil dari GPS</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Kolom Kanan: Rekening & Donasi -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                <h2 class="font-bold text-gray-900 text-sm pl-2">Rekening & Donasi</h2>

                <div class="space-y-3.5 pl-2">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Bank</label>
                        <input type="text" value="Bank Syariah Indonesia (BSI)" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nomor Rekening</label>
                        <input type="text" value="714 889 0012" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nama Pemilik Rekening</label>
                        <input type="text" value="Masjid Al-Ikhlas BTP" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                    </div>

                    <!-- QRIS Preview Box -->
                    <div class="pt-2">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">QRIS Preview</label>
                        <div class="border border-gray-200 rounded-2xl p-5 bg-gray-50/50 flex flex-col items-center justify-center text-center space-y-3">
                            <div class="w-36 h-36 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center p-3">
                                <i class="fa-solid fa-qrcode text-5xl text-amber-500 mb-1"></i>
                                <span class="text-[8px] text-gray-400 font-bold uppercase">SCAN TO DONATE</span>
                            </div>
                            <button class="text-xs font-bold text-[#f59e0b] hover:underline">Ganti QRIS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer Action Bar -->
    <div class="flex items-center justify-end pt-4 space-x-3">
        <button class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-6 py-2.5 rounded-xl text-xs font-bold transition shadow-sm">
            Batal
        </button>
        <button class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-7 py-2.5 rounded-xl text-xs font-bold transition shadow-md">
            Simpan Perubahan
        </button>
    </div>

</div>
@endsection