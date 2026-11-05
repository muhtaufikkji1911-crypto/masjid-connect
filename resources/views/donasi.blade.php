@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-10">
    
    <!-- Header Page -->
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Program Donasi & Infaq</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola program sedekah, pemantauan target donasi, dan verifikasi infaq QRIS.</p>
        </div>
        <div class="flex items-center space-x-3">
            <!-- Tombol Buat Program -->
            <button onclick="openProgramModal()" class="flex items-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                <i class="fa-solid fa-plus"></i>
                <span>Buat Program Donasi</span>
            </button>
            <!-- Tombol Catat Infaq -->
            <button onclick="openInfaqModal()" class="flex items-center space-x-2 bg-[#f59e0b] hover:bg-[#d97706] text-white px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                <i class="fa-solid fa-plus"></i>
                <span>Catat Infaq Tunai</span>
            </button>
            <!-- Tombol Export Data -->
            <button onclick="openExportModal()" class="flex items-center space-x-2 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                <i class="fa-solid fa-file-export"></i>
                <span>Export Data Donasi</span>
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm font-medium mb-2">Total Donasi Terkumpul</div>
            <div class="text-2xl font-bold text-gray-900 mb-3">Rp 84.500.000</div>
            <div class="flex items-center text-xs text-[#10b981] font-semibold">
                <i class="fa-solid fa-arrow-trend-up mr-1.5"></i> +14.2%
            </div>
            <i class="fa-solid fa-sack-dollar absolute -bottom-4 -right-4 text-7xl text-gray-50 opacity-80"></i>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm font-medium mb-2">Donasi Bulan Ini</div>
            <div class="text-2xl font-bold text-gray-900 mb-3">Rp 12.450.000</div>
            <div class="inline-flex items-center px-2.5 py-1 bg-green-50 text-[#10b981] text-[11px] font-bold rounded-md">
                Terverifikasi
            </div>
            <i class="fa-solid fa-hand-holding-dollar absolute -bottom-4 -right-4 text-7xl text-gray-50 opacity-80"></i>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm font-medium mb-2">Kampanye Aktif</div>
            <div class="text-2xl font-bold text-gray-900 mb-3">4 Program Berjalan</div>
            <div class="inline-flex items-center px-2.5 py-1 bg-amber-50 text-amber-600 text-[11px] font-bold rounded-md">
                Monitor Target
            </div>
            <i class="fa-solid fa-bullhorn absolute -bottom-4 -right-4 text-7xl text-gray-50 opacity-80"></i>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm font-medium mb-2">Donasi via QRIS Digital</div>
            <div class="text-2xl font-bold text-gray-900 mb-3">68% dari total</div>
            <div class="flex items-center text-xs text-[#10b981] font-semibold">
                <i class="fa-solid fa-arrow-trend-up mr-1.5"></i> Naik pesat
            </div>
            <i class="fa-solid fa-qrcode absolute -bottom-4 -right-4 text-7xl text-gray-50 opacity-80"></i>
        </div>
    </div>

    <!-- Active Campaign Progress Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Campaign 1 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-4">
                <h3 class="font-bold text-gray-900 text-[15px] leading-snug w-2/3">Renovasi Sound System & Akustik</h3>
                <div class="flex flex-col space-y-1 items-end">
                    <span class="bg-red-50 text-red-500 text-[9px] font-bold px-2 py-0.5 rounded border border-red-100">Sisa 14 Hari</span>
                    <span class="bg-green-50 text-green-600 text-[9px] font-bold px-2 py-0.5 rounded border border-green-100">QRIS Siap</span>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-xs font-bold mb-2">
                    <span class="text-gray-500">Terkumpul: <span class="text-gray-900">15M</span> / 20M</span>
                    <span class="text-[#10b981]">75%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-[#10b981] h-1.5 rounded-full" style="width: 75%"></div>
                </div>
            </div>
        </div>

        <!-- Campaign 2 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-4">
                <h3 class="font-bold text-gray-900 text-[15px] leading-snug w-2/3">Santunan Rutin 50 Anak Yatim</h3>
                <span class="bg-green-50 text-green-600 text-[9px] font-bold px-2 py-0.5 rounded border border-green-100">Bulan Ini</span>
            </div>
            <div>
                <div class="flex justify-between text-xs font-bold mb-2">
                    <span class="text-gray-500">Terkumpul: <span class="text-gray-900">9M</span> / 10M</span>
                    <span class="text-[#10b981]">90%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-[#10b981] h-1.5 rounded-full" style="width: 90%"></div>
                </div>
            </div>
        </div>

        <!-- Campaign 3 -->
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-4">
                <h3 class="font-bold text-gray-900 text-[15px] leading-snug w-2/3">Pengadaan 100 Al-Qur'an Standar Utsmani</h3>
                <span class="bg-[#063f2b] text-white text-[9px] font-bold px-2 py-0.5 rounded">Tercapai</span>
            </div>
            <div>
                <div class="flex justify-between text-xs font-bold mb-2">
                    <span class="text-gray-500">Terkumpul: <span class="text-gray-900">6.5M</span> / 6.5M</span>
                    <span class="text-[#10b981]">100%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-[#10b981] h-1.5 rounded-full" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Section -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
        
        <!-- Filter & Search Bar -->
        <div class="p-5 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex space-x-3 w-full md:w-auto">
                <!-- Dropdown Program -->
                <div class="relative">
                    <select class="appearance-none bg-gray-50 border border-gray-200 text-gray-700 py-2.5 pl-4 pr-10 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#063f2b] focus:border-transparent font-medium cursor-pointer">
                        <option>Pilih Program</option>
                        <option>Renovasi Sound System</option>
                        <option>Santunan Yatim</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
                
                <!-- Dropdown Metode -->
                <div class="relative">
                    <select class="appearance-none bg-gray-50 border border-gray-200 text-gray-700 py-2.5 pl-4 pr-10 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#063f2b] focus:border-transparent font-medium cursor-pointer">
                        <option>Metode Pembayaran</option>
                        <option>QRIS</option>
                        <option>Transfer Bank</option>
                        <option>Tunai</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>

            <!-- Search -->
            <div class="relative w-full md:w-72">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                </div>
                <input type="text" placeholder="Cari transaksi..." class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-[#063f2b] focus:border-[#063f2b] block w-full pl-10 p-2.5 outline-none transition-all">
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead>
                    <tr class="text-[11px] text-gray-400 uppercase tracking-wider border-b border-gray-100 bg-gray-50/50">
                        <th class="px-6 py-4 font-bold">Tanggal & Waktu</th>
                        <th class="px-6 py-4 font-bold">Donatur</th>
                        <th class="px-6 py-4 font-bold">Program</th>
                        <th class="px-6 py-4 font-bold">Metode</th>
                        <th class="px-6 py-4 font-bold">Jumlah (Rp)</th>
                        <th class="px-6 py-4 font-bold text-center">Status</th>
                        <th class="px-6 py-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y divide-gray-50">
                    
                    <!-- Baris 1 -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-[13px]">01 Okt 2026</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">10:45 WIB • #MC29402</p>
                        </td>
                        <td class="px-6 py-4 text-[13px] font-medium text-gray-800">Bapak Haji Firdaus</td>
                        <td class="px-6 py-4 text-[13px] text-gray-600">Renovasi Sound System</td>
                        <td class="px-6 py-4 text-[13px] text-gray-600">QRIS - Bank Syariah</td>
                        <td class="px-6 py-4 font-bold text-[#10b981]">Rp 2.500.000</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded">Berhasil</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-50 border border-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-700 transition-colors shadow-sm" title="Lihat Bukti">
                                    <i class="fa-regular fa-image text-sm"></i>
                                </button>
                                <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-50 border border-gray-100 text-gray-400 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-100 transition-colors shadow-sm" title="Edit Data">
                                    <i class="fa-regular fa-pen-to-square text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Baris 2 -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-[13px]">01 Okt 2026</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">09:12 WIB • #MC29401</p>
                        </td>
                        <td class="px-6 py-4 text-[13px] font-medium text-gray-800">Ibu Siti Khadijah</td>
                        <td class="px-6 py-4 text-[13px] text-gray-600">Santunan Anak Yatim</td>
                        <td class="px-6 py-4 text-[13px] text-gray-600">Transfer Manual</td>
                        <td class="px-6 py-4 font-bold text-[#10b981]">Rp 500.000</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded">Berhasil</span>
                        </td>
                        <td class="py-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <!-- Tombol Lihat Bukti -->
                            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-50 border border-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-700 transition-colors shadow-sm" title="Lihat Bukti">
                                <i class="fa-regular fa-image text-sm"></i>
                            </button>
                            
                            <!-- Tombol Edit -->
                            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-50 border border-gray-100 text-gray-400 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-100 transition-colors shadow-sm" title="Edit Data">
                                <i class="fa-regular fa-pen-to-square text-sm"></i>
                            </button>
                        </div>
                    </td>
                    </tr>

                    <!-- Baris 3 -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-[13px]">30 Sept 2026</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">21:05 WIB • #MC29399</p>
                        </td>
                        <td class="px-6 py-4 text-[13px] font-medium text-gray-800">Hamba Allah</td>
                        <td class="px-6 py-4 text-[13px] text-gray-600">Pengadaan Al-Qur'an</td>
                        <td class="px-6 py-4 text-[13px] text-gray-600">QRIS - Digital</td>
                        <td class="px-6 py-4 font-bold text-[#10b981]">Rp 150.000</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded">Berhasil</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-50 border border-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-700 transition-colors shadow-sm" title="Lihat Bukti">
                                    <i class="fa-regular fa-image text-sm"></i>
                                </button>
                                <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-50 border border-gray-100 text-gray-400 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-100 transition-colors shadow-sm" title="Edit Data">
                                    <i class="fa-regular fa-pen-to-square text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-5 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <span class="text-xs text-gray-500">Menampilkan 1 - 10 dari 480 donasi</span>
            
            <div class="flex items-center space-x-1">
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-500 hover:bg-gray-50 transition text-xs"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="px-3 py-1.5 bg-[#063f2b] text-white font-medium rounded text-xs">1</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition font-medium text-xs">2</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition font-medium text-xs">3</button>
                <span class="px-2 text-gray-400 text-xs">...</span>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition font-medium text-xs">48</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-500 hover:bg-gray-50 transition text-xs"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

    </div>
</div>
<!-- ========================================== -->
    <!-- MODAL 1: BUAT PROGRAM DONASI BARU -->
    <!-- ========================================== -->
    <div id="programModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeProgramModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[640px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="programModalBox">
            <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Buat Program Donasi</h2>
                    <p class="text-xs text-gray-500 mt-1">Buat kampanye baru untuk menggalang dana dari jamaah.</p>
                </div>
                <button onclick="closeProgramModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 w-8 h-8 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin;">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Nama Program</label>
                    <input type="text" placeholder="Contoh: Renovasi Tempat Wudhu" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Target Dana (Rp)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[13px] font-bold text-gray-400">Rp</span>
                            <input type="number" placeholder="0" class="w-full bg-gray-50 border border-gray-200 rounded-lg pl-10 pr-4 py-2.5 text-[13px] text-gray-800 font-bold focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Batas Waktu</label>
                        <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Gambar / Thumbnail Program</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl bg-gray-50/50 hover:bg-gray-50 p-6 flex flex-col items-center justify-center cursor-pointer transition">
                        <div class="w-10 h-10 bg-white shadow-sm border border-gray-100 rounded-full flex items-center justify-center text-blue-400 mb-3">
                            <i class="fa-regular fa-image text-lg"></i>
                        </div>
                        <p class="text-[13px] text-gray-800 font-medium mb-1">Tarik gambar ke sini atau <span class="text-[#063f2b] underline">cari file</span></p>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider">Format: JPG, PNG (Maks. 2MB)</p>
                    </div>
                </div>
            </div>
            <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closeProgramModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
                <button onclick="closeProgramModal()" class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">Simpan Program</button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL 2: CATAT INFAQ TUNAI -->
    <!-- ========================================== -->
    <div id="infaqModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeInfaqModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="infaqModalBox">
            <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100 bg-amber-50/30 rounded-t-2xl">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Catat Infaq Tunai</h2>
                    <p class="text-xs text-gray-500 mt-1">Masukkan data infaq/sedekah manual dari jamaah.</p>
                </div>
                <button onclick="closeInfaqModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 w-8 h-8 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin;">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Nama Donatur</label>
                    <input type="text" placeholder="Kosongkan jika Hamba Allah" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#f59e0b] focus:bg-white focus:ring-1 focus:ring-[#f59e0b] transition">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jumlah Infaq (Rp)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[13px] font-bold text-[#f59e0b]">Rp</span>
                        <input type="number" placeholder="0" class="w-full bg-amber-50/50 border border-amber-200 rounded-lg pl-10 pr-4 py-3 text-[16px] text-gray-900 font-bold focus:outline-none focus:border-[#f59e0b] focus:bg-white focus:ring-1 focus:ring-[#f59e0b] transition">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Disalurkan Ke</label>
                    <select class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#f59e0b] focus:bg-white focus:ring-1 focus:ring-[#f59e0b] transition cursor-pointer">
                        <option>Kas Utama Masjid (Umum)</option>
                        <option>Renovasi Sound System</option>
                        <option>Santunan Rutin 50 Anak Yatim</option>
                        <option>Pengadaan Al-Qur'an</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Tanggal Terima</label>
                    <input type="date" value="2026-10-02" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#f59e0b] focus:bg-white transition cursor-text">
                </div>
            </div>
            <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closeInfaqModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
                <button onclick="closeInfaqModal()" class="bg-[#f59e0b] hover:bg-[#d97706] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">Simpan Infaq</button>
            </div>
        </div>
    </div>

    <!-- Script Kontrol Modal -->
    <script>
        // Modal Program
        function openProgramModal() {
            const modal = document.getElementById('programModal');
            const box = document.getElementById('programModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closeProgramModal() {
            const modal = document.getElementById('programModal');
            const box = document.getElementById('programModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        // Modal Infaq
        function openInfaqModal() {
            const modal = document.getElementById('infaqModal');
            const box = document.getElementById('infaqModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closeInfaqModal() {
            const modal = document.getElementById('infaqModal');
            const box = document.getElementById('infaqModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
    </script>
    <!-- ========================================== -->
    <!-- MODAL 3: EXPORT DATA DONASI -->
    <!-- ========================================== -->
    <div id="exportModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeExportModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="exportModalBox">
            
            <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100 bg-gray-50/50 rounded-t-2xl">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Export Data Donasi</h2>
                    <p class="text-xs text-gray-500 mt-1">Unduh laporan donasi dan infaq dalam bentuk file.</p>
                </div>
                <button onclick="closeExportModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin;">
                
                <!-- Rentang Tanggal -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Dari Tanggal</label>
                        <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Sampai Tanggal</label>
                        <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                    </div>
                </div>

                <!-- Filter Program -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Pilih Program</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg pl-4 pr-10 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition cursor-pointer">
                            <option>Semua Program (Keseluruhan)</option>
                            <option>Kas Utama Masjid (Umum)</option>
                            <option>Renovasi Sound System</option>
                            <option>Santunan Rutin 50 Anak Yatim</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Format File -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Format Laporan</label>
                    <div class="flex items-center space-x-3">
                        <!-- Excel Option -->
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="format" class="peer sr-only" checked>
                            <div class="border border-gray-200 rounded-xl p-3 flex flex-col items-center justify-center text-gray-400 peer-checked:border-[#10b981] peer-checked:bg-green-50 peer-checked:text-[#10b981] transition shadow-sm">
                                <i class="fa-solid fa-file-excel text-2xl mb-2"></i>
                                <span class="text-xs font-bold">Ms. Excel</span>
                            </div>
                        </label>
                        
                        <!-- PDF Option -->
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="format" class="peer sr-only">
                            <div class="border border-gray-200 rounded-xl p-3 flex flex-col items-center justify-center text-gray-400 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-500 transition shadow-sm">
                                <i class="fa-solid fa-file-pdf text-2xl mb-2"></i>
                                <span class="text-xs font-bold">PDF Doc</span>
                            </div>
                        </label>
                    </div>
                </div>
                
            </div>
            
            <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closeExportModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
                <button onclick="closeExportModal()" class="flex items-center space-x-2 bg-gray-800 hover:bg-black text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">
                    <i class="fa-solid fa-download text-sm"></i>
                    <span>Download File</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 1. POP-UP MODAL LIHAT BUKTI DONASI -->
    <!-- ========================================== -->
    <div id="buktiModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <!-- Latar Belakang Gelap -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeBuktiModal()"></div>
        
        <!-- Kotak Konten -->
        <div class="bg-white rounded-2xl w-full max-w-[400px] p-5 shadow-2xl relative z-10 flex flex-col mx-4 transform scale-95 transition-transform duration-300" id="buktiModalBox">
            <div class="flex justify-between items-center mb-4 border-b border-gray-100 pb-3">
                <div>
                    <h3 class="font-bold text-gray-900 text-base">Bukti Transaksi</h3>
                    <p class="text-[10px] text-gray-400 mt-0.5 uppercase tracking-wider">#MC29402 • 01 Okt 2026</p>
                </div>
                <button onclick="closeBuktiModal()" class="text-gray-400 hover:text-gray-700 bg-gray-50 hover:bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
            
            <!-- Area Gambar Bukti -->
            <div class="w-full bg-gray-50 rounded-xl overflow-hidden aspect-[3/4] border border-gray-200 flex items-center justify-center group relative">
                <!-- Ini hanya gambar contoh (dummy), nantinya diganti URL dari database -->
                <img src="https://images.unsplash.com/photo-1621980838965-031ed42aeb04?q=80&w=400&auto=format&fit=crop" alt="Bukti Transfer" class="w-full h-full object-cover">
                
                <!-- Tombol Download Gambar (Opsional) -->
                <a href="#" class="absolute bottom-4 right-4 bg-white/90 backdrop-blur text-gray-800 p-2.5 rounded-lg shadow-md hover:bg-[#063f2b] hover:text-white transition opacity-0 group-hover:opacity-100">
                    <i class="fa-solid fa-download text-sm"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 2. POP-UP MODAL EDIT DATA DONASI -->
    <!-- ========================================== -->
    <div id="editDonasiModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeEditDonasiModal()"></div>
        
        <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="editDonasiModalBox">
            
            <!-- Header Modal -->
            <div class="px-6 py-5 flex justify-between items-start border-b border-gray-100 bg-blue-50/50 rounded-t-2xl">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 tracking-tight">Edit Data Donasi</h2>
                    <p class="text-[11px] text-gray-500 mt-1">Perbarui informasi donatur dan status transaksi.</p>
                </div>
                <button onclick="closeEditDonasiModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            
            <!-- Body Form Edit -->
            <div class="p-6 overflow-y-auto space-y-4" style="scrollbar-width: thin;">
                
                <!-- Input Nama Donatur -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Nama Donatur</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <i class="fa-regular fa-user text-gray-400 text-xs"></i>
                        </div>
                        <!-- Ditambahkan id="edit-donatur-nama" -->
                        <input type="text" id="edit-donatur-nama" class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-9 pr-4 py-2.5 text-[13px] text-gray-800 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <!-- Input Nominal -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Jumlah (Rp)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-[12px] font-bold text-[#10b981]">Rp</span>
                            <!-- Ditambahkan id="edit-donatur-jumlah" -->
                            <input type="number" id="edit-donatur-jumlah" class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-9 pr-4 py-2.5 text-[13px] text-gray-800 font-bold focus:outline-none focus:border-[#063f2b] focus:bg-white transition">
                        </div>
                    </div>
                    
                    <!-- Dropdown Status -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Status</label>
                        <div class="relative">
                            <!-- Ditambahkan id="edit-donatur-status" -->
                            <select id="edit-donatur-status" class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[13px] text-gray-800 font-semibold focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-pointer">
                                <option value="berhasil">✅ Berhasil</option>
                                <option value="pending">⏳ Pending</option>
                                <option value="gagal">❌ Gagal</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input Program Tujuan -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Program Tujuan <span class="text-red-500">*</span></label>
                    <!-- Ditambahkan id="edit-donatur-program" -->
                    <input type="text" id="edit-donatur-program" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-2.5 text-xs text-gray-800 focus:border-[#063f2b] focus:bg-white outline-none transition font-semibold">
                </div>
            </div>
            
            <!-- Footer Form (Tombol Simpan) -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closeEditDonasiModal()" class="text-[13px] font-bold text-gray-500 hover:text-gray-900 transition px-3 py-2">Batal</button>
                
                <!-- Ditambahkan id="btn-simpan-edit-donasi" dan dihapus onclick bawaannya -->
                <button id="btn-simpan-edit-donasi" class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-5 py-2.5 rounded-xl text-[13px] font-bold transition shadow-sm flex items-center space-x-2">
                    <i class="fa-solid fa-check text-xs"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </div>
    </div>

        <!-- ========================================== -->
        <!-- SCRIPT UNTUK MEMBUKA/MENUTUP MODAL & FUNGSI EDIT -->
        <!-- ========================================== -->
        <script>
            // FUNGSI MODAL BUKTI
            function openBuktiModal() {
                const modal = document.getElementById('buktiModal');
                const box = document.getElementById('buktiModalBox');
                if(modal && box) {
                    modal.classList.remove('hidden');
                    setTimeout(() => { modal.classList.remove('opacity-0'); box.classList.remove('scale-95'); box.classList.add('scale-100'); }, 10);
                }
            }
            function closeBuktiModal() {
                const modal = document.getElementById('buktiModal');
                const box = document.getElementById('buktiModalBox');
                if(modal && box) {
                    modal.classList.add('opacity-0'); box.classList.remove('scale-100'); box.classList.add('scale-95');
                    setTimeout(() => { modal.classList.add('hidden'); }, 300);
                }
            }

            // FUNGSI MODAL EDIT DONASI
            function openEditDonasiModal() {
                const modal = document.getElementById('editDonasiModal');
                const box = document.getElementById('editDonasiModalBox');
                if(modal && box) {
                    modal.classList.remove('hidden');
                    setTimeout(() => { modal.classList.remove('opacity-0'); box.classList.remove('scale-95'); box.classList.add('scale-100'); }, 10);
                }
            }
            function closeEditDonasiModal() {
                const modal = document.getElementById('editDonasiModal');
                const box = document.getElementById('editDonasiModalBox');
                if(modal && box) {
                    modal.classList.add('opacity-0'); box.classList.remove('scale-100'); box.classList.add('scale-95');
                    setTimeout(() => { modal.classList.add('hidden'); }, 300);
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                let currentRow = null; 

                // 1. Klik Tombol Bukti (Ikon Gambar) -> TIDAK ADA NOTIFIKASI
                const btnBukti = document.querySelectorAll('.fa-image');
                btnBukti.forEach(btn => {
                    const parentBtn = btn.closest('button') || btn.closest('a');
                    if (parentBtn) {
                        parentBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation(); // Mencegah trigger notifikasi dari elemen lain
                            openBuktiModal();
                        });
                    }
                });

                // 2. Klik Tombol Edit (Ikon Pensil) -> TIDAK ADA NOTIFIKASI
                const btnEdits = document.querySelectorAll('.fa-pen-to-square');
                btnEdits.forEach(btn => {
                    const parentBtn = btn.closest('button') || btn.closest('a');
                    if (parentBtn) {
                        parentBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation(); // Mencegah trigger notifikasi dari elemen lain
                            
                            currentRow = this.closest('tr');
                            if (currentRow) {
                                const namaSaatIni = currentRow.children[1].innerText.trim();
                                const programSaatIni = currentRow.children[2].innerText.trim();
                                const jumlahTeks = currentRow.children[4].innerText.trim(); 
                                const statusTeks = currentRow.children[5].innerText.trim().toLowerCase();

                                const jumlahAngka = jumlahTeks.replace(/[^0-9]/g, '');

                                document.getElementById('edit-donatur-nama').value = namaSaatIni;
                                document.getElementById('edit-donatur-program').value = programSaatIni;
                                document.getElementById('edit-donatur-jumlah').value = jumlahAngka;
                                
                                const statusSelect = document.getElementById('edit-donatur-status');
                                if (statusTeks.includes('berhasil')) statusSelect.value = 'berhasil';
                                else if (statusTeks.includes('pending')) statusSelect.value = 'pending';
                                else if (statusTeks.includes('gagal')) statusSelect.value = 'gagal';
                            }
                            openEditDonasiModal();
                        });
                    }
                });

                // 3. Klik Tombol SIMPAN PERUBAHAN -> NOTIFIKASI MUNCUL DI SINI
                const btnSimpan = document.getElementById('btn-simpan-edit-donasi');
                if (btnSimpan) {
                    btnSimpan.addEventListener('click', function() {
                        if (currentRow) {
                            const namaBaru = document.getElementById('edit-donatur-nama').value;
                            const programBaru = document.getElementById('edit-donatur-program').value;
                            const jumlahBaru = document.getElementById('edit-donatur-jumlah').value;
                            const statusBaru = document.getElementById('edit-donatur-status').value;

                            const formatRupiah = "Rp " + parseInt(jumlahBaru || 0).toLocaleString('id-ID');

                            currentRow.children[1].innerText = namaBaru;      
                            currentRow.children[2].innerText = programBaru;   
                            currentRow.children[4].innerHTML = `<span class="text-[#10b981] font-bold">${formatRupiah}</span>`;

                            let htmlStatus = '';
                            if (statusBaru === 'berhasil') {
                                htmlStatus = `<span class="bg-green-100 text-green-700 px-3 py-1 rounded-md text-[11px] font-bold">Berhasil</span>`;
                            } else if (statusBaru === 'pending') {
                                htmlStatus = `<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-md text-[11px] font-bold">Pending</span>`;
                            } else if (statusBaru === 'gagal') {
                                htmlStatus = `<span class="bg-red-100 text-red-700 px-3 py-1 rounded-md text-[11px] font-bold">Gagal</span>`;
                            }
                            currentRow.children[5].innerHTML = htmlStatus;

                            closeEditDonasiModal();

                            // === PANGGIL POP-UP BERHASIL ===
                            // Jika dashboard Anda memiliki fungsi showToast bawaan:
                            if (typeof showToast === "function") {
                                showToast('Tindakan Anda berhasil disimpan.');
                            }
                        }
                    });
                }

                // 4. Interaksi Angka Halaman Bawah (Pagination)
                const paginationContainers = document.querySelectorAll('.flex.items-center.space-x-1, .flex.items-center.space-x-2');
                paginationContainers.forEach(container => {
                    const paginationLinks = container.querySelectorAll('button:not(:first-child):not(:last-child)'); 
                    paginationLinks.forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault(); 
                            paginationLinks.forEach(l => {
                                l.classList.remove('bg-[#063f2b]', 'text-white');
                                l.classList.add('border-gray-200', 'text-gray-600', 'hover:bg-gray-50', 'border');
                            });
                            this.classList.remove('border-gray-200', 'text-gray-600', 'hover:bg-gray-50', 'border');
                            this.classList.add('bg-[#063f2b]', 'text-white');
                        });
                    });
                });

            });
        </script>

    <!-- Script Kontrol Semua Modal -->
    <script>
        // Modal Program
        function openProgramModal() {
            const modal = document.getElementById('programModal');
            const box = document.getElementById('programModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closeProgramModal() {
            const modal = document.getElementById('programModal');
            const box = document.getElementById('programModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        // Modal Infaq
        function openInfaqModal() {
            const modal = document.getElementById('infaqModal');
            const box = document.getElementById('infaqModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closeInfaqModal() {
            const modal = document.getElementById('infaqModal');
            const box = document.getElementById('infaqModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        // Modal Export (Baru ditambahkan)
        function openExportModal() {
            const modal = document.getElementById('exportModal');
            const box = document.getElementById('exportModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closeExportModal() {
            const modal = document.getElementById('exportModal');
            const box = document.getElementById('exportModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
        
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // 1. Fungsi Tombol Lihat Bukti (Ikon Gambar)
        const btnBukti = document.querySelectorAll('.fa-image');
        btnBukti.forEach(btn => {
            const parentBtn = btn.closest('button') || btn.closest('a');
            if (parentBtn) {
                parentBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (typeof showToast === "function") {
                        showToast('Menampilkan pop-up foto bukti donasi...');
                    } else {
                        alert('Menampilkan foto bukti donasi...');
                    }
                    // Tambahkan logika untuk membuka modal gambar bukti di sini
                });
            }
        });

        // 2. Fungsi Tombol Edit (Ikon Pensil)
        const btnEdits = document.querySelectorAll('.fa-pen-to-square');
        btnEdits.forEach(btn => {
            const parentBtn = btn.closest('button') || btn.closest('a');
            if (parentBtn) {
                parentBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (typeof showToast === "function") {
                        showToast('Membuka form edit data donasi...');
                    } else {
                        alert('Membuka form edit data donasi...');
                    }
                    // Tambahkan logika untuk membuka modal edit di sini
                });
            }
        });

        // 3. Fungsi Interaksi Pagination (Angka Halaman)
        // Mencari kontainer pagination (berada di bagian bawah tabel)
        const paginationContainers = document.querySelectorAll('.flex.items-center.space-x-1, .flex.items-center.space-x-2');
        
        paginationContainers.forEach(container => {
            // Ambil semua tombol angka (kecuali tombol next/prev)
            const paginationLinks = container.querySelectorAll('button:not(:first-child):not(:last-child)'); 
            
            paginationLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    
                    // Reset warna semua tombol angka ke abu-abu
                    paginationLinks.forEach(l => {
                        l.classList.remove('bg-[#063f2b]', 'text-white');
                        l.classList.add('border-gray-200', 'text-gray-600', 'hover:bg-gray-50', 'border');
                    });
                    
                    // Beri warna hijau ke tombol yang sedang ditekan
                    this.classList.remove('border-gray-200', 'text-gray-600', 'hover:bg-gray-50', 'border');
                    this.classList.add('bg-[#063f2b]', 'text-white');
                    
                    const pageNumber = this.innerText;
                    if (typeof showToast === "function" && pageNumber.trim() !== '' && !isNaN(pageNumber)) {
                        showToast(`Memuat data donasi halaman ${pageNumber}...`);
                    }
                });
            });
        });

    });
</script>
@endsection