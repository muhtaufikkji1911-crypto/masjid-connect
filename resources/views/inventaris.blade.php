@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-12">
    
    <!-- Header Page -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1 tracking-tight">Inventaris & Pemeliharaan Aset</h1>
            <p class="text-sm text-gray-500">Kelola barang, kondisi fisik, dan jadwal servis peralatan masjid.</p>
        </div>
    </div>

    <!-- Summary Cards (4 Kotak Statistik) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Total Aset Terdaftar</span>
                <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 text-xs">
                    <i class="fa-solid fa-box"></i>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-2xl font-black text-gray-900 leading-tight">148 <span class="text-xs font-normal text-gray-400">Barang</span></h3>
                <p class="text-[10px] font-bold text-[#10b981] mt-1 flex items-center space-x-1">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                    <span>+12 bulan ini</span>
                </p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Kondisi Baik</span>
                <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center text-[#10b981] text-xs">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-2xl font-black text-gray-900 leading-tight">92%</h3>
                <p class="text-[10px] font-bold text-[#10b981] bg-green-50 px-2 py-0.5 rounded-md inline-block mt-1">● Optimal</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Butuh Perbaikan</span>
                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center text-[#f59e0b] text-xs">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-2xl font-black text-gray-900 leading-tight">6 <span class="text-xs font-normal text-gray-400">Barang</span></h3>
                <p class="text-[10px] font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded-md inline-block mt-1">▲ 2 Kritis</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Total Nilai Aset</span>
                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-500 text-xs">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-xl font-black text-gray-900 leading-tight">Rp 185.000k</h3>
                <p class="text-[10px] text-gray-400 mt-1">Estimasi Depresiasi 5%</p>
            </div>
        </div>

    </div>

    <!-- Toolbar Filter & Action Buttons -->
    <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-sm flex flex-col lg:flex-row items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </span>
                <input type="text" placeholder="Cari kode atau nama aset..." class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-xs text-gray-800 outline-none focus:border-[#063f2b] focus:bg-white transition">
            </div>
            <select class="bg-gray-50 border border-gray-200 text-gray-700 text-xs rounded-xl px-4 py-2.5 outline-none focus:border-[#063f2b]">
                <option>Semua Ruangan</option>
                <option>Ruang Utama</option>
                <option>Ruang Kontrol</option>
                <option>Serambi Depan</option>
            </select>
            <select class="bg-gray-50 border border-gray-200 text-gray-700 text-xs rounded-xl px-4 py-2.5 outline-none focus:border-[#063f2b]">
                <option>Semua Kondisi</option>
                <option>Baik</option>
                <option>Rusak Ringan</option>
                <option>Rusak Berat</option>
            </select>
        </div>

        <div class="flex items-center space-x-3 w-full lg:w-auto justify-end">
            <button onclick="openTambahAsetModal()" class="flex-1 lg:flex-none items-center justify-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-5 py-2.5 rounded-xl text-xs font-bold transition shadow-md">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Tambah Aset</span>
            </button>
            <button onclick="openJadwalServisModal()" class="flex-1 lg:flex-none items-center justify-center space-x-2 bg-[#f59e0b] hover:bg-[#d97706] text-white px-5 py-2.5 rounded-xl text-xs font-bold transition shadow-md">
                <i class="fa-solid fa-calendar-days text-xs"></i>
                <span>Jadwal Servis</span>
            </button>
        </div>
    </div>

    <!-- Main Content Layout (Table & Maintenance Reminder) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left: Daftar Inventaris Aset Table (Span 2) -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <div>
                    <h2 class="font-bold text-gray-900 text-sm">Daftar Inventaris Aset</h2>
                    <p class="text-[11px] text-gray-400">Rekapitulasi seluruh perlengkapan dan inventaris masjid</p>
                </div>
                <button class="text-xs font-bold text-[#063f2b] hover:underline flex items-center space-x-1">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span>Download Report (PDF)</span>
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                            <th class="py-3 px-3">Kode Aset</th>
                            <th class="py-3 px-3">Barang</th>
                            <th class="py-3 px-3">Lokasi</th>
                            <th class="py-3 px-3">Kondisi</th>
                            <th class="py-3 px-3">Next Servis</th>
                            <th class="py-3 px-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-xs font-medium text-gray-700">
                        
                        <!-- Row 1 -->
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-3.5 px-3 font-bold text-gray-900">AST-042</td>
                            <td class="py-3.5 px-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center shrink-0 border border-gray-200 overflow-hidden">
                                        <i class="fa-solid fa-snowflake text-blue-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">AC Split Daikin 2 PK</p>
                                        <p class="text-[10px] text-gray-400">Elektronik</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 text-gray-600">Ruang Utama</td>
                            <td class="py-3.5 px-3"><span class="bg-green-50 text-[#10b981] font-bold px-2.5 py-1 rounded-lg text-[11px]">Baik</span></td>
                            <td class="py-3.5 px-3 font-semibold text-gray-800">12 Okt 2026</td>
                            <td class="py-3.5 px-3 text-right space-x-1">
                                <button class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-eye"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-green-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-solid fa-qrcode"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-amber-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-3.5 px-3 font-bold text-gray-900">AST-085</td>
                            <td class="py-3.5 px-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center shrink-0 border border-gray-200 overflow-hidden">
                                        <i class="fa-solid fa-sliders text-purple-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">Mixer Yamaha 16-CH</p>
                                        <p class="text-[10px] text-gray-400">Sound System</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 text-gray-600">Ruang Kontrol</td>
                            <td class="py-3.5 px-3"><span class="bg-amber-50 text-[#f59e0b] font-bold px-2.5 py-1 rounded-lg text-[11px]">Rusak Ringan</span></td>
                            <td class="py-3.5 px-3 font-semibold text-red-500">25 Sep 2026</td>
                            <td class="py-3.5 px-3 text-right space-x-1">
                                <button class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-eye"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-green-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-solid fa-qrcode"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-amber-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-3.5 px-3 font-bold text-gray-900">AST-112</td>
                            <td class="py-3.5 px-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center shrink-0 border border-gray-200 overflow-hidden">
                                        <i class="fa-solid fa-rug text-amber-700"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">Karpet Turki Grade A</p>
                                        <p class="text-[10px] text-gray-400">Mebel & Tekstil</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 text-gray-600">Ruang Utama</td>
                            <td class="py-3.5 px-3"><span class="bg-green-50 text-[#10b981] font-bold px-2.5 py-1 rounded-lg text-[11px]">Baik</span></td>
                            <td class="py-3.5 px-3 font-semibold text-gray-800">05 Des 2026</td>
                            <td class="py-3.5 px-3 text-right space-x-1">
                                <button class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-eye"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-green-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-solid fa-qrcode"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-amber-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-3.5 px-3 font-bold text-gray-900">AST-204</td>
                            <td class="py-3.5 px-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center shrink-0 border border-gray-200 overflow-hidden">
                                        <i class="fa-solid fa-tv text-indigo-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">Samsung LED 55"</p>
                                        <p class="text-[10px] text-gray-400">Digital Signage</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 text-gray-600">Serambi Depan</td>
                            <td class="py-3.5 px-3"><span class="bg-red-50 text-red-500 font-bold px-2.5 py-1 rounded-lg text-[11px]">Rusak Berat</span></td>
                            <td class="py-3.5 px-3 font-bold text-red-600">Urgent</td>
                            <td class="py-3.5 px-3 text-right space-x-1">
                                <button class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-eye"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-green-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-solid fa-qrcode"></i></button>
                                <button class="p-1.5 text-gray-400 hover:text-amber-600 rounded-lg hover:bg-gray-100 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Sidebar: Maintenance Reminder & Status Kondisi -->
        <div class="space-y-6">
            
            <!-- Maintenance Reminder Box -->
            <div class="bg-[#0a3121] rounded-2xl p-6 text-white shadow-xl relative overflow-hidden space-y-4">
                <div>
                    <h3 class="font-bold text-sm">Maintenance Reminder</h3>
                    <p class="text-[11px] text-green-100/60 mt-0.5">Tugas pemeliharaan terdekat</p>
                </div>

                <div class="space-y-3">
                    
                    <!-- Reminder 1 -->
                    <div class="bg-white text-gray-900 rounded-xl p-3.5 flex justify-between items-center shadow-sm">
                        <div>
                            <h4 class="font-bold text-xs">Cuci Karpet Utama</h4>
                            <p class="text-[10px] text-amber-600 font-medium mt-0.5">H-3 (21 Sept)</p>
                        </div>
                        <button class="bg-[#f59e0b] hover:bg-[#d97706] text-white text-[10px] font-bold px-3 py-1.5 rounded-lg transition shadow-sm">SELESAI</button>
                    </div>

                    <!-- Reminder 2 -->
                    <div class="bg-white text-gray-900 rounded-xl p-3.5 flex justify-between items-center shadow-sm">
                        <div>
                            <h4 class="font-bold text-xs">Servis Sound System</h4>
                            <p class="text-[10px] text-gray-400 font-medium mt-0.5">H-7 (25 Sept)</p>
                        </div>
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-[10px] font-bold px-3 py-1.5 rounded-lg transition">SELESAI</button>
                    </div>

                    <!-- Reminder 3 -->
                    <div class="bg-white text-gray-900 rounded-xl p-3.5 flex justify-between items-center shadow-sm">
                        <div>
                            <h4 class="font-bold text-xs">Cek Lampu Kubah</h4>
                            <p class="text-[10px] text-gray-400 font-medium mt-0.5">10 Okt 2026</p>
                        </div>
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-[10px] font-bold px-3 py-1.5 rounded-lg transition">SELESAI</button>
                    </div>

                </div>

                <button class="w-full text-center text-xs font-bold text-amber-400 hover:underline pt-1">Lihat Semua Kalender</button>
            </div>

            <!-- Status Kondisi Aset Chart Mock -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm">Status Kondisi Aset</h3>
                
                <div class="flex items-center justify-center py-4">
                    <div class="w-36 h-36 rounded-full border-8 border-[#10b981] border-t-[#f59e0b] border-r-red-500 flex flex-col items-center justify-center text-center shadow-inner">
                        <span class="text-xl font-black text-gray-900">148</span>
                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Total Aset</span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 text-center text-[11px] font-bold pt-2 border-t border-gray-100">
                    <div class="flex flex-col items-center"><span class="w-2.5 h-2.5 rounded-full bg-[#10b981] mb-1"></span><span class="text-gray-600">Baik (92%)</span></div>
                    <div class="flex flex-col items-center"><span class="w-2.5 h-2.5 rounded-full bg-[#f59e0b] mb-1"></span><span class="text-gray-600">Rusak Ringan</span></div>
                    <div class="flex flex-col items-center"><span class="w-2.5 h-2.5 rounded-full bg-red-500 mb-1"></span><span class="text-gray-600">Rusak Berat</span></div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- ========================================== -->
<!-- MODAL 1: TAMBAH ASET BARU -->
<!-- ========================================== -->
<div id="tambahAsetModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeTambahAsetModal()"></div>
    <!-- Ukuran diubah menjadi max-w-[500px] agar proporsional seperti biasa -->
    <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="tambahAsetModalBox">
        
        <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100 bg-gray-50/50 rounded-t-2xl">
            <div>
                <h2 class="text-xl font-bold text-gray-900 tracking-tight">Tambah Aset Baru</h2>
                <p class="text-xs text-gray-500 mt-1">Daftarkan perlengkapan atau barang inventaris baru masjid.</p>
            </div>
            <button onclick="closeTambahAsetModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        
        <div class="p-7 space-y-4 text-xs overflow-y-auto" style="scrollbar-width: thin;">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Nama Barang</label>
                    <input type="text" placeholder="Contoh: AC Split Daikin 2 PK" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-800 outline-none focus:border-[#063f2b] focus:bg-white transition font-medium text-xs">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Kategori</label>
                    <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-700 outline-none focus:border-[#063f2b] focus:bg-white transition font-medium text-xs cursor-pointer">
                        <option>Elektronik</option>
                        <option>Sound System</option>
                        <option>Mebel & Tekstil</option>
                        <option>Digital Signage</option>
                        <option>Lain-lain</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Lokasi Penempatan</label>
                    <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-700 outline-none focus:border-[#063f2b] focus:bg-white transition font-medium text-xs cursor-pointer">
                        <option>Ruang Utama</option>
                        <option>Ruang Kontrol</option>
                        <option>Serambi Depan</option>
                        <option>Gudang Masjid</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Kondisi Awal</label>
                    <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-700 outline-none focus:border-[#063f2b] focus:bg-white transition font-medium text-xs cursor-pointer">
                        <option>Baik</option>
                        <option>Rusak Ringan</option>
                        <option>Rusak Berat</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Estimasi Nilai / Harga (Rp)</label>
                    <input type="number" placeholder="0" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-800 outline-none focus:border-[#063f2b] focus:bg-white transition font-bold text-xs">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Tanggal Perolehan</label>
                    <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-700 outline-none focus:border-[#063f2b] focus:bg-white transition font-medium text-xs">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Keterangan / Catatan</label>
                <textarea rows="2" placeholder="Catatan tambahan mengenai aset..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-800 outline-none focus:border-[#063f2b] focus:bg-white transition resize-none font-medium text-xs"></textarea>
            </div>
        </div>
        
        <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
            <button onclick="closeTambahAsetModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
            <button onclick="closeTambahAsetModal()" class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">Simpan Aset</button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL 2: JADWAL SERVIS -->
<!-- ========================================== -->
<div id="jadwalServisModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeJadwalServisModal()"></div>
    <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="jadwalServisModalBox">
        
        <div class="px-6 py-4 flex justify-between items-start border-b border-gray-100 bg-amber-50/40 rounded-t-2xl">
            <div>
                <h2 class="text-base font-bold text-gray-900 tracking-tight">Buat Jadwal Servis / Pemeliharaan</h2>
                <p class="text-[11px] text-gray-500 mt-0.5">Atur pengingat perawatan aset inventaris.</p>
            </div>
            <button onclick="closeJadwalServisModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-7 h-7 rounded-full flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>
        
        <div class="p-6 space-y-4 text-xs">
            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Pilih Aset / Barang</label>
                <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-700 outline-none focus:border-[#f59e0b] focus:bg-white transition font-medium">
                    <option>AC Split Daikin 2 PK (AST-042)</option>
                    <option>Mixer Yamaha 16-CH (AST-085)</option>
                    <option>Karpet Turki Grade A (AST-112)</option>
                    <option>Samsung LED 55" (AST-204)</option>
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Jenis Pemeliharaan</label>
                <input type="text" placeholder="Contoh: Servis berkala & cuci filter AC" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-800 outline-none focus:border-[#f59e0b] focus:bg-white transition font-medium">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Tanggal Pelaksanaan</label>
                    <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-700 outline-none focus:border-[#f59e0b] focus:bg-white transition font-medium">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Petugas / Vendor</label>
                    <input type="text" placeholder="Nama teknisi / vendor" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-800 outline-none focus:border-[#f59e0b] focus:bg-white transition font-medium">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Estimasi Biaya (Opsional)</label>
                <input type="number" placeholder="0" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-800 outline-none focus:border-[#f59e0b] focus:bg-white transition font-bold">
            </div>
        </div>
        
        <div class="px-6 py-3.5 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
            <button onclick="closeJadwalServisModal()" class="font-bold text-gray-500 hover:text-gray-800 transition px-3 py-1.5 text-xs">Batal</button>
            <button onclick="closeJadwalServisModal()" class="bg-[#f59e0b] hover:bg-[#d97706] text-white px-5 py-2 rounded-xl font-bold transition shadow-md text-xs">Simpan Jadwal</button>
        </div>
    </div>
</div>

<!-- Script Kontrol Modal Inventaris -->
<script>
    // Modal Tambah Aset
    function openTambahAsetModal() {
        const modal = document.getElementById('tambahAsetModal');
        const box = document.getElementById('tambahAsetModalBox');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            box.classList.remove('scale-95');
            box.classList.add('scale-100');
        }, 10);
    }
    function closeTambahAsetModal() {
        const modal = document.getElementById('tambahAsetModal');
        const box = document.getElementById('tambahAsetModalBox');
        modal.classList.add('opacity-0');
        box.classList.remove('scale-100');
        box.classList.add('scale-95');
        setTimeout(() => { modal.classList.add('hidden'); }, 300);
    }

    // Modal Jadwal Servis
    function openJadwalServisModal() {
        const modal = document.getElementById('jadwalServisModal');
        const box = document.getElementById('jadwalServisModalBox');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            box.classList.remove('scale-95');
            box.classList.add('scale-100');
        }, 10);
    }
    function closeJadwalServisModal() {
        const modal = document.getElementById('jadwalServisModal');
        const box = document.getElementById('jadwalServisModalBox');
        modal.classList.add('opacity-0');
        box.classList.remove('scale-100');
        box.classList.add('scale-95');
        setTimeout(() => { modal.classList.add('hidden'); }, 300);
    }
</script>
@endsection