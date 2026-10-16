@extends('layouts.app')
<!-- Tambahkan di bagian atas file Anda -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-10">
    
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Laporan Kas & Keuangan</h1>
            <p class="text-sm text-gray-500 mt-1">Manajemen kas operasional, donasi, dan pengeluaran Masjid Al-Ikhlas</p>
        </div>
        <div class="flex items-center space-x-3">
            <!-- Tombol Catat Pemasukan -->
            <button onclick="openPemasukanModal()" class="flex items-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                <i class="fa-solid fa-plus"></i>
                <span>Catat Pemasukan</span>
            </button>
            
            <!-- Tombol Catat Pengeluaran -->
            <button onclick="openPengeluaranModal()" class="flex items-center space-x-2 bg-gray-700 hover:bg-gray-800 text-white px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                <i class="fa-solid fa-minus"></i>
                <span>Catat Pengeluaran</span>
            </button>
            
            <!-- Tombol Export -->
            <button onclick="openExportModal()" class="flex items-center space-x-2 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                <i class="fa-solid fa-file-export"></i>
                <span>Export</span>
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm font-medium mb-2">Saldo Rekening Utama</div>
            <div class="text-3xl font-bold text-gray-900 mb-3">Rp 32.450.000</div>
            <div class="flex items-center text-xs text-[#10b981] font-semibold">
                <i class="fa-solid fa-arrow-trend-up mr-1.5"></i> +4.2% dari bulan lalu
            </div>
            <!-- Dekorasi Icon Background -->
            <i class="fa-solid fa-building-columns absolute -bottom-6 -right-4 text-8xl text-gray-50 opacity-60"></i>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm font-medium mb-2">Kas Tunai Kotak Infaq</div>
            <div class="text-3xl font-bold text-gray-900 mb-3">Rp 10.400.000</div>
            <div class="inline-flex items-center px-2.5 py-1 bg-green-50 text-[#10b981] text-[11px] font-bold rounded-md">
                <i class="fa-solid fa-caret-down mr-1.5"></i> Penerimaan Jumat
            </div>
            <i class="fa-solid fa-box-archive absolute -bottom-6 -right-4 text-8xl text-gray-50 opacity-60"></i>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm font-medium mb-2">Pengeluaran Operasional Berjalan</div>
            <div class="text-3xl font-bold text-gray-900 mb-3">Rp 2.150.000</div>
            <div class="inline-flex items-center px-2.5 py-1 bg-amber-50 text-amber-600 text-[11px] font-bold rounded-md">
                <i class="fa-solid fa-caret-up mr-1.5"></i> Listrik & Kebersihan
            </div>
            <i class="fa-solid fa-file-invoice-dollar absolute -bottom-6 -right-4 text-8xl text-gray-50 opacity-60"></i>
        </div>
    </div>

    <!-- Data Table Section -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
        
        <!-- Filter & Search Bar -->
        <div class="p-5 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex space-x-3 w-full md:w-auto">
                <!-- Dropdown Kategori -->
                <div class="relative">
                    <select class="appearance-none bg-gray-50 border border-gray-200 text-gray-700 py-2.5 pl-4 pr-10 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#063f2b] focus:border-transparent font-medium cursor-pointer">
                        <option>Semua Kategori</option>
                        <option>Infaq Jumat</option>
                        <option>Operasional</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
                
                <!-- Date Picker -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-calendar text-gray-400"></i>
                    </div>
                    <input type="text" value="1 Sept 2026 - 18 Sept 2026" class="bg-gray-50 border border-gray-200 text-gray-700 py-2.5 pl-10 pr-4 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#063f2b] focus:border-transparent font-medium cursor-pointer w-64" readonly>
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
                        <th class="px-6 py-4 font-bold">Tanggal</th>
                        <th class="px-6 py-4 font-bold">Kategori</th>
                        <th class="px-6 py-4 font-bold">Deskripsi/Keterangan</th>
                        <th class="px-6 py-4 font-bold">Jenis</th>
                        <th class="px-6 py-4 font-bold">Jumlah (Rp)</th>
                        <th class="px-6 py-4 font-bold text-center">Bukti</th>
                        <th class="px-6 py-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y divide-gray-50">
                    
                    <!-- Baris 1: Pemasukan -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-[13px]">18 Sept 2026</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">14:30 WIB</p>
                        </td>
                        <td class="px-6 py-4 text-[13px]">Infaq Jumat</td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-800 text-[13px]">Penghitungan Kotak Infaq</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">Utama (Lobi Utama)</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-wider">Pemasukan</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-[#10b981]">Rp 5.230.000</td>
                        <td class="px-6 py-4 text-center">
                            <button class="bg-gray-100 p-2 rounded text-gray-400 hover:text-gray-600 hover:bg-gray-200 transition"><i class="fa-regular fa-image"></i></button>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="text-gray-400 hover:text-blue-600 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="text-gray-400 hover:text-red-600 transition"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>

                    <!-- Baris 2: Pengeluaran -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-[13px]">17 Sept 2026</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">09:15 WIB</p>
                        </td>
                        <td class="px-6 py-4 text-[13px]">Operasional & Listrik</td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-800 text-[13px]">Pembayaran Listrik & PDAM</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">Bulan Agustus</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-wider">Pengeluaran</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-red-500">Rp 1.450.000</td>
                        <td class="px-6 py-4 text-center">
                            <!-- Contoh jika ada foto bukti -->
                            <div class="w-8 h-8 mx-auto rounded bg-gray-200 overflow-hidden cursor-pointer hover:opacity-80 transition border border-gray-300">
                                <img src="https://images.unsplash.com/photo-1621980838965-031ed42aeb04?q=80&w=100&auto=format&fit=crop" class="w-full h-full object-cover" alt="Bukti">
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="text-gray-400 hover:text-blue-600 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="text-gray-400 hover:text-red-600 transition"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>

                    <!-- Baris 3: Pengeluaran -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-[13px]">15 Sept 2026</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">11:00 WIB</p>
                        </td>
                        <td class="px-6 py-4 text-[13px]">Santunan Yatim</td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-800 text-[13px]">Penyaluran Santunan Bulanan</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">- 20 Anak</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-wider">Pengeluaran</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-red-500">Rp 2.000.000</td>
                        <td class="px-6 py-4 text-center">
                            <button class="bg-gray-100 p-2 rounded text-gray-400 hover:text-gray-600 hover:bg-gray-200 transition"><i class="fa-regular fa-image"></i></button>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="text-gray-400 hover:text-blue-600 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="text-gray-400 hover:text-red-600 transition"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>
                    
                    <!-- Baris 4: Pemasukan -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-[13px]">12 Sept 2026</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">20:10 WIB</p>
                        </td>
                        <td class="px-6 py-4 text-[13px]">Donasi Terikat</td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-800 text-[13px]">Donasi Perbaikan Atap (Bpk.</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">Mulyadi)</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-wider">Pemasukan</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-[#10b981]">Rp 1.000.000</td>
                        <td class="px-6 py-4 text-center">
                            <button class="bg-gray-100 p-2 rounded text-gray-400 hover:text-gray-600 hover:bg-gray-200 transition"><i class="fa-regular fa-image"></i></button>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="text-gray-400 hover:text-blue-600 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="text-gray-400 hover:text-red-600 transition"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-5 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <span class="text-xs text-gray-500">Menampilkan 1 - 10 dari 124 transaksi</span>
            
            <div class="flex items-center space-x-1">
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-500 hover:bg-gray-50 transition text-xs"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="px-3 py-1.5 bg-[#063f2b] text-white font-medium rounded text-xs">1</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition font-medium text-xs">2</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition font-medium text-xs">3</button>
                <span class="px-2 text-gray-400 text-xs">...</span>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition font-medium text-xs">13</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded text-gray-500 hover:bg-gray-50 transition text-xs"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

    </div>
</div>
<!-- ========================================== -->
    <!-- MODAL 1: CATAT PEMASUKAN KAS -->
    <!-- ========================================== -->
    <div id="pemasukanModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closePemasukanModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="pemasukanModalBox">
            
            <!-- Header Modal Pemasukan (Nuansa Hijau) -->
            <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100 bg-green-50/50 rounded-t-2xl">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Catat Pemasukan Kas</h2>
                    <p class="text-xs text-gray-500 mt-1">Masukkan dana masuk ke kas utama masjid.</p>
                </div>
                <button onclick="closePemasukanModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin;">
                <!-- Nominal -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jumlah Pemasukan (Rp)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[13px] font-bold text-[#10b981]">Rp</span>
                        <input type="number" placeholder="0" class="w-full bg-green-50/30 border border-green-200 rounded-lg pl-10 pr-4 py-3 text-[16px] text-gray-900 font-bold focus:outline-none focus:border-[#10b981] focus:bg-white focus:ring-1 focus:ring-[#10b981] transition">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Kategori</label>
                        <select class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#10b981] focus:bg-white transition cursor-pointer">
                            <option>Infaq Jumat</option>
                            <option>Kotak Amal Harian</option>
                            <option>Sumbangan Donatur</option>
                            <option>Lain-lain</option>
                        </select>
                    </div>
                    <!-- Tanggal -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Tanggal</label>
                        <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#10b981] focus:bg-white transition cursor-text">
                    </div>
                </div>

                <!-- Keterangan -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Keterangan / Sumber</label>
                    <input type="text" placeholder="Contoh: Penghitungan kotak infaq lobi utama" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#10b981] focus:bg-white focus:ring-1 focus:ring-[#10b981] transition">
                </div>

                <!-- Bukti -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Bukti Foto (Opsional)</label>
                    <div class="border border-dashed border-gray-300 rounded-xl bg-gray-50 hover:bg-gray-100 p-4 flex items-center justify-center cursor-pointer transition">
                        <i class="fa-solid fa-camera text-gray-400 mr-2"></i>
                        <span class="text-[12px] text-gray-500 font-medium">Upload foto perhitungan/struk</span>
                    </div>
                </div>
            </div>
            
            <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closePemasukanModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
                <button onclick="closePemasukanModal()" class="bg-[#10b981] hover:bg-[#059669] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">Simpan Pemasukan</button>
            </div>
        </div>
    </div>


    <!-- ========================================== -->
    <!-- MODAL 2: CATAT PENGELUARAN KAS -->
    <!-- ========================================== -->
    <div id="pengeluaranModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closePengeluaranModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="pengeluaranModalBox">
            
            <!-- Header Modal Pengeluaran (Nuansa Merah) -->
            <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100 bg-red-50/50 rounded-t-2xl">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Catat Pengeluaran Kas</h2>
                    <p class="text-xs text-gray-500 mt-1">Masukkan data pengeluaran operasional masjid.</p>
                </div>
                <button onclick="closePengeluaranModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin;">
                <!-- Nominal -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jumlah Pengeluaran (Rp)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[13px] font-bold text-red-500">Rp</span>
                        <input type="number" placeholder="0" class="w-full bg-red-50/30 border border-red-200 rounded-lg pl-10 pr-4 py-3 text-[16px] text-gray-900 font-bold focus:outline-none focus:border-red-500 focus:bg-white focus:ring-1 focus:ring-red-500 transition">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Kategori</label>
                        <select class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-red-500 focus:bg-white transition cursor-pointer">
                            <option>Operasional & Listrik</option>
                            <option>Insentif/Honor</option>
                            <option>Perawatan & Perbaikan</option>
                            <option>Konsumsi</option>
                        </select>
                    </div>
                    <!-- Tanggal -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Tanggal</label>
                        <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-red-500 focus:bg-white transition cursor-text">
                    </div>
                </div>

                <!-- Keterangan -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Deskripsi / Keterangan</label>
                    <input type="text" placeholder="Contoh: Pembayaran token listrik dan PDAM" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-red-500 focus:bg-white focus:ring-1 focus:ring-red-500 transition">
                </div>

                <!-- Bukti -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Bukti Nota/Kwitansi (Wajib)</label>
                    <div class="border border-dashed border-gray-300 rounded-xl bg-gray-50 hover:bg-gray-100 p-4 flex items-center justify-center cursor-pointer transition">
                        <i class="fa-solid fa-file-invoice text-gray-400 mr-2"></i>
                        <span class="text-[12px] text-gray-500 font-medium">Upload foto nota bukti bayar</span>
                    </div>
                </div>
            </div>
            
            <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closePengeluaranModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
                <button onclick="closePengeluaranModal()" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">Simpan Pengeluaran</button>
            </div>
        </div>
    </div>


    <!-- Script Kontrol Modal -->
    <script>
        // Modal Pemasukan
        function openPemasukanModal() {
            const modal = document.getElementById('pemasukanModal');
            const box = document.getElementById('pemasukanModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closePemasukanModal() {
            const modal = document.getElementById('pemasukanModal');
            const box = document.getElementById('pemasukanModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        // Modal Pengeluaran
        function openPengeluaranModal() {
            const modal = document.getElementById('pengeluaranModal');
            const box = document.getElementById('pengeluaranModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closePengeluaranModal() {
            const modal = document.getElementById('pengeluaranModal');
            const box = document.getElementById('pengeluaranModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
    </script>
    <!-- ========================================== -->
    <!-- MODAL 3: EXPORT DATA KEUANGAN -->
    <!-- ========================================== -->
    <div id="exportModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeExportModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[500px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="exportModalBox">
            
            <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100 bg-gray-50/50 rounded-t-2xl">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Export Laporan Keuangan</h2>
                    <p class="text-xs text-gray-500 mt-1">Unduh rekapitulasi kas masuk dan keluar.</p>
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

                <!-- Filter Jenis Transaksi -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jenis Transaksi</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg pl-4 pr-10 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition cursor-pointer">
                            <option>Semua Transaksi (Buku Kas Umum)</option>
                            <option>Hanya Pemasukan</option>
                            <option>Hanya Pengeluaran</option>
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
                            <input type="radio" name="format_keuangan" class="peer sr-only" checked>
                            <div class="border border-gray-200 rounded-xl p-3 flex flex-col items-center justify-center text-gray-400 peer-checked:border-[#10b981] peer-checked:bg-green-50 peer-checked:text-[#10b981] transition shadow-sm">
                                <i class="fa-solid fa-file-excel text-2xl mb-2"></i>
                                <span class="text-xs font-bold">Ms. Excel</span>
                            </div>
                        </label>
                        
                        <!-- PDF Option -->
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="format_keuangan" class="peer sr-only">
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
                    <span>Download Laporan</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Script Kontrol Semua Modal (Ditulis Ulang dengan Tambahan Export) -->
    <script>
        // Modal Pemasukan
        function openPemasukanModal() {
            const modal = document.getElementById('pemasukanModal');
            const box = document.getElementById('pemasukanModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closePemasukanModal() {
            const modal = document.getElementById('pemasukanModal');
            const box = document.getElementById('pemasukanModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        // Modal Pengeluaran
        function openPengeluaranModal() {
            const modal = document.getElementById('pengeluaranModal');
            const box = document.getElementById('pengeluaranModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closePengeluaranModal() {
            const modal = document.getElementById('pengeluaranModal');
            const box = document.getElementById('pengeluaranModalBox');
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