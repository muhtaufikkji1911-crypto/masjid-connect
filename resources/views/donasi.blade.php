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
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="bg-gray-100 p-1.5 rounded text-gray-400 hover:text-gray-600 hover:bg-gray-200 transition"><i class="fa-regular fa-image text-xs"></i></button>
                            <button class="bg-gray-100 p-1.5 rounded text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition"><i class="fa-regular fa-pen-to-square text-xs"></i></button>
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
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="bg-gray-100 p-1.5 rounded text-gray-400 hover:text-gray-600 hover:bg-gray-200 transition"><i class="fa-regular fa-image text-xs"></i></button>
                            <button class="bg-gray-100 p-1.5 rounded text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition"><i class="fa-regular fa-pen-to-square text-xs"></i></button>
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
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="bg-gray-100 p-1.5 rounded text-gray-400 hover:text-gray-600 hover:bg-gray-200 transition"><i class="fa-regular fa-image text-xs"></i></button>
                            <button class="bg-gray-100 p-1.5 rounded text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition"><i class="fa-regular fa-pen-to-square text-xs"></i></button>
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
@endsection