@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-10">
    
    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm mb-1">Total Kas Masjid</div>
            <div class="text-2xl font-bold text-gray-800">Rp 42.850.000</div>
            <div class="mt-3 flex items-center text-xs text-green-600 font-medium">
                <i class="fa-solid fa-arrow-trend-up mr-1"></i> +8.4% bulan ini
            </div>
            <i class="fa-solid fa-wallet absolute -bottom-4 -right-2 text-6xl text-gray-50 opacity-50"></i>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm mb-1">Pemasukan (Bulan Ini)</div>
            <div class="text-2xl font-bold text-gray-800">Rp 5.230.000</div>
            <div class="mt-3 inline-block px-2 py-1 bg-green-50 text-green-600 text-[10px] font-semibold rounded">
                <i class="fa-solid fa-caret-down mr-1"></i> Penerimaan Rutin
            </div>
            <i class="fa-solid fa-money-bill-trend-up absolute -bottom-4 -right-2 text-6xl text-gray-50 opacity-50"></i>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm mb-1">Pengeluaran (Bulan Ini)</div>
            <div class="text-2xl font-bold text-gray-800">Rp 2.150.000</div>
            <div class="mt-3 inline-block px-2 py-1 bg-orange-50 text-orange-600 text-[10px] font-semibold rounded">
                <i class="fa-solid fa-caret-up mr-1"></i> Operasional & Maintenance
            </div>
            <i class="fa-solid fa-money-bill-transfer absolute -bottom-4 -right-2 text-6xl text-gray-50 opacity-50"></i>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="text-gray-500 text-sm mb-1">Status TV Signage</div>
            <div class="text-2xl font-bold text-gray-800">Active</div>
            <div class="mt-3 inline-block px-2 py-1 bg-green-50 text-green-600 text-[10px] font-semibold rounded border border-green-200">
                <span class="w-2 h-2 inline-block bg-green-500 rounded-full mr-1"></span> ONLINE - 1 SCREEN
            </div>
            <i class="fa-solid fa-tv absolute -bottom-4 -right-2 text-6xl text-gray-50 opacity-50"></i>
        </div>
    </div>

    <!-- Chart & Jadwal Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Card Analisis Arus Kas -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 lg:col-span-2 w-full">
            
            <!-- Header & Toggle -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Analisis Arus Kas</h2>
                    <!-- Tambahkan ID 'chart-subtitle' di sini -->
                    <p id="chart-subtitle" class="text-sm text-gray-500">Laporan Pemasukan dan Pengeluaran 4 Minggu Terakhir</p>
                </div>
                
                <div class="flex bg-gray-100/80 rounded-lg p-1 shrink-0">
                    <button id="btn-mingguan" onclick="toggleChartPeriod('mingguan')" class="px-4 py-1.5 rounded-md text-sm font-medium transition bg-[#0a3121] text-white shadow-sm">
                        Mingguan
                    </button>
                    <button id="btn-bulanan" onclick="toggleChartPeriod('bulanan')" class="px-4 py-1.5 rounded-md text-sm font-medium transition text-gray-500 hover:text-gray-900 bg-transparent">
                        Bulanan
                    </button>
                </div>
            </div>

            <!-- Wadah Grafik Chart.js -->
            <div class="relative w-full h-[300px]">
                <canvas id="cashflowChart"></canvas>
            </div>

        </div>

        <!-- Widget Jadwal Salat -->
            <div class="bg-[#0a3121] rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
                
                <!-- Background dekorasi (Opsional) -->
                <div class="absolute top-0 right-0 opacity-10 pointer-events-none">
                    <i class="fa-solid fa-mosque text-9xl -mt-4 -mr-4"></i>
                </div>

                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-xl font-bold tracking-tight mb-1">Jadwal Salat</h2>
                            <p class="text-[11px] text-green-100/60">Bumi Tamalanrea Permai, Makassar</p>
                        </div>
                        <span class="bg-[#f59e0b] text-[#0a3121] text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-widest">WITA</span>
                    </div>

                    <div class="space-y-0 text-[13px] font-medium">
                        <!-- Imsak -->
                        <div class="flex justify-between items-center py-3.5 border-b border-white/10">
                            <div class="flex items-center space-x-3.5"><i class="fa-solid fa-moon w-4 text-center text-green-100/60"></i><span>Imsak</span></div>
                            <span class="font-bold text-[14px]">04:22</span>
                        </div>
                        
                        <!-- Subuh -->
                        <div class="flex justify-between items-center py-3.5 border-b border-white/10">
                            <div class="flex items-center space-x-3.5"><i class="fa-solid fa-cloud-sun w-4 text-center text-green-100/60"></i><span>Subuh</span></div>
                            <span class="font-bold text-[14px]">04:32</span>
                        </div>
                        
                        <!-- Terbit -->
                        <div class="flex justify-between items-center py-3.5 border-b border-white/10">
                            <div class="flex items-center space-x-3.5"><i class="fa-solid fa-sun w-4 text-center text-green-100/60"></i><span>Terbit</span></div>
                            <span class="font-bold text-[14px]">05:46</span>
                        </div>
                        
                        <!-- Dzuhur -->
                        <div class="flex justify-between items-center py-3.5 border-b border-white/10">
                            <div class="flex items-center space-x-3.5"><i class="fa-solid fa-sun w-4 text-center text-green-100/60"></i><span>Dzuhur</span></div>
                            <span class="font-bold text-[14px]">11:51</span>
                        </div>
                        
                        <!-- Ashar (Highlight Diperbaiki agar sejajar) -->
                        <div class="flex justify-between items-center bg-[#f59e0b] rounded-xl py-3 px-4 -mx-4 text-[#0a3121] shadow-lg my-1">
                            <div class="flex items-center space-x-3.5">
                                <i class="fa-solid fa-sun w-4 text-center"></i>
                                <span class="font-extrabold uppercase tracking-wider">Ashar</span>
                            </div>
                            <div class="text-right leading-none">
                                <span class="font-black text-base block mb-0.5">15:08</span>
                                <span class="text-[9px] font-bold tracking-widest uppercase opacity-80 block">Now</span>
                            </div>
                        </div>
                        
                        <!-- Maghrib -->
                        <div class="flex justify-between items-center py-3.5 border-b border-white/10">
                            <div class="flex items-center space-x-3.5"><i class="fa-solid fa-cloud-moon w-4 text-center text-green-100/60"></i><span>Maghrib</span></div>
                            <span class="font-bold text-[14px]">17:55</span>
                        </div>
                        
                        <!-- Isya -->
                        <div class="flex justify-between items-center py-3.5">
                            <div class="flex items-center space-x-3.5"><i class="fa-solid fa-moon w-4 text-center text-green-100/60"></i><span>Isya</span></div>
                            <span class="font-bold text-[14px]">19:04</span>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- NEW ROW: Agenda & Kajian + Digital Signage Controller -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Agenda & Kajian -->
        <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-bold text-gray-800 text-lg">Agenda & Kajian</h2>
                <a href="/agenda" class="text-xs font-bold text-[#063f2b] hover:underline">Lihat Semua</a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="text-[10px] text-gray-400 uppercase tracking-wider border-b border-gray-100">
                            <th class="pb-3 font-bold w-2/5">Kegiatan</th>
                            <th class="pb-3 font-bold w-1/4">Pemateri</th>
                            <th class="pb-3 font-bold w-1/4">Waktu</th>
                            <th class="pb-3 font-bold text-center">TV Display</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Item 1 -->
                        <tr class="border-b border-gray-50">
                            <td class="py-4 pr-2">
                                <p class="font-bold text-gray-900 text-[13px]">Kajian Fiqih Ibadah</p>
                                <p class="text-[11px] text-gray-500 mt-0.5">Ruang Utama</p>
                            </td>
                            <td class="py-4 text-[13px] pr-2">Ust. Salim A. Fillah</td>
                            <td class="py-4 pr-2">
                                <p class="font-bold text-gray-900 text-[12px]">19 Sept 2026</p>
                                <p class="text-[11px] text-gray-500 mt-0.5">Ba'da Ashar</p>
                            </td>
                            <td class="py-4 text-center">
                            <div class="tv-display-toggle w-6 h-6 mx-auto rounded-full bg-[#10b981] text-white flex items-center justify-center cursor-pointer transition-colors duration-300 shadow-sm hover:scale-110" data-status="active">
                                <i class="fa-solid fa-check text-[10px] transition-opacity duration-300 opacity-100"></i>
                            </div>
                        </td>
                        </tr>
                        <!-- Item 2 -->
                        <tr class="border-b border-gray-50">
                            <td class="py-4 pr-2">
                                <p class="font-bold text-gray-900 text-[13px]">Tahsin Al-Qur'an Dewasa</p>
                                <p class="text-[11px] text-gray-500 mt-0.5">Lantai 2</p>
                            </td>
                            <td class="py-4 text-[13px] pr-2">Ust. Abu Hurairah</td>
                            <td class="py-4 pr-2">
                                <p class="font-bold text-gray-900 text-[12px]">20 Sept 2026</p>
                                <p class="text-[11px] text-gray-500 mt-0.5">09:00 - 11:00</p>
                            </td>
                            <td class="py-4 text-center">
                            <div class="tv-display-toggle w-6 h-6 mx-auto rounded-full bg-gray-200 text-white flex items-center justify-center cursor-pointer transition-colors duration-300 shadow-sm hover:scale-110" data-status="inactive">
                                <i class="fa-solid fa-check text-[10px] transition-opacity duration-300 opacity-0"></i>
                            </div>
                        </td>
                        </tr>
                        <!-- Item 3 -->
                        <tr>
                            <td class="py-4 pr-2">
                                <p class="font-bold text-gray-900 text-[13px]">Santunan Anak Yatim</p>
                                <p class="text-[11px] text-gray-500 mt-0.5">Aula Masjid</p>
                            </td>
                            <td class="py-4 text-[13px] pr-2">Drs. H. Mulyadi</td>
                            <td class="py-4 pr-2">
                                <p class="font-bold text-gray-900 text-[12px]">22 Sept 2026</p>
                                <p class="text-[11px] text-gray-500 mt-0.5">10:00 - Selesai</p>
                            </td>
                            <td class="py-4 text-center">
                            <div class="tv-display-toggle w-6 h-6 mx-auto rounded-full bg-[#10b981] text-white flex items-center justify-center cursor-pointer transition-colors duration-300 shadow-sm hover:scale-110" data-status="active">
                                <i class="fa-solid fa-check text-[10px] transition-opacity duration-300 opacity-100"></i>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Digital Signage Controller Panel -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm h-full flex flex-col">
            
            <!-- Header Panel -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Digital Signage Controller</h2>
                    <p class="text-xs text-gray-500 mt-1">Kontrol cepat tampilan layar TV dari Dashboard</p>
                </div>
                
                <!-- Tombol Aksi Cepat (Modern & Elegan) -->
                <div class="flex items-center gap-3">
                    <!-- Tombol Mute Adzan -->
                    <button id="dash-btn-mute" class="flex items-center space-x-2 bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 px-4 py-2 rounded-xl text-xs font-bold transition-all shadow-sm">
                        <i class="fa-solid fa-volume-xmark"></i>
                        <span>MUTE ADHAN</span>
                    </button>
                    
                    <!-- Tombol Khutbah Mode -->
                    <button id="dash-btn-khutbah" class="flex items-center space-x-2 bg-[#063f2b] text-white hover:bg-[#042e1f] px-4 py-2 rounded-xl text-xs font-bold transition-all shadow-md">
                        <i class="fa-solid fa-bolt text-amber-400"></i>
                        <span>KHUTBAH MODE</span>
                    </button>
                </div>
            </div>

            <!-- Area Kotak Live Preview (Rasio 16:9 Murni) -->
            <div class="relative w-full aspect-video mb-6 rounded-2xl sm:rounded-3xl overflow-hidden border border-gray-200 shadow-sm bg-[#faf5ed] pointer-events-none select-none">
                
                <!-- Badge Live Preview -->
                <div class="absolute top-2.5 left-2.5 sm:top-3 sm:left-3 z-20 flex items-center space-x-1.5 bg-white/90 backdrop-blur-md border border-white px-2 py-1 rounded-full shadow-sm">
                    <span class="relative flex h-1.5 w-1.5 sm:h-2 sm:w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 sm:h-2 sm:w-2 bg-red-500"></span>
                    </span>
                    <span class="text-[6.5px] sm:text-[7.5px] font-black text-gray-800 tracking-widest uppercase">LIVE PREVIEW</span>
                </div>

                <!-- TV Screen Area (Absolute Inset-0 untuk memaksa masuk pas ke dalam 16:9) -->
                <div class="absolute inset-0 p-2 sm:p-3 pt-8 sm:pt-10 flex flex-col gap-1.5 sm:gap-2">
                    
                    <!-- 1. TV Top Header -->
                    <div style="background-color: #ffffff;" class="flex justify-between items-center px-3 py-1.5 sm:py-2 rounded-xl sm:rounded-2xl border border-orange-100 shadow-sm shrink-0 w-full">
                        <div class="flex items-center space-x-2 truncate">
                            <div style="background-color: #f59e0b; color: #ffffff;" class="w-5 h-5 sm:w-7 sm:h-7 rounded-md sm:rounded-lg flex items-center justify-center font-bold text-[10px] sm:text-sm shrink-0 shadow-sm">
                                <i class="fa-solid fa-mosque"></i>
                            </div>
                            <div class="truncate">
                                <h3 class="font-extrabold text-[9px] sm:text-xs text-gray-900 leading-tight truncate">Masjid Al-Ikhlas</h3>
                                <p class="text-[6px] sm:text-[7.5px] text-gray-400 font-extrabold tracking-wider uppercase mt-0.5 truncate">KEBON JERUK, JAKARTA BARAT</p>
                            </div>
                        </div>
                        <div class="text-center hidden sm:block shrink-0">
                            <p style="color: #d97706;" class="text-[7px] sm:text-[8px] font-black uppercase tracking-wider">12 Sya'ban 1445 H</p>
                            <p class="text-[6.5px] sm:text-[7.5px] text-gray-400 font-medium">Kamis, 22 Februari 2024</p>
                        </div>
                        <div class="text-right shrink-0">
                            <span style="color: #f59e0b;" class="text-sm sm:text-xl font-black tracking-wider">15:42<span class="text-[7px] sm:text-[10px] text-gray-400 font-normal ml-0.5">:18</span></span>
                        </div>
                    </div>

                    <!-- 2. TV Middle Body (Flex-1 agar mengisi sisa ruang tengah secara dinamis) -->
                    <div class="flex-1 flex flex-row gap-1.5 sm:gap-2 w-full min-h-0 overflow-hidden">
                        
                        <!-- Kolom Kiri: JADWAL SHOLAT -->
                        <div style="background-color: #ffffff;" class="w-[26%] h-full rounded-xl sm:rounded-2xl p-1.5 sm:p-2 border border-orange-100 shadow-sm flex flex-col justify-between overflow-hidden">
                            <div class="flex flex-col h-full">
                                <p class="text-[6px] sm:text-[7.5px] font-extrabold text-amber-600 uppercase tracking-wider border-b border-gray-100 pb-1 mb-1 shrink-0">JADWAL</p>
                                <div class="flex-1 flex flex-col justify-between text-[7px] sm:text-[9px] font-bold text-gray-600">
                                    <div class="flex justify-between items-center gap-1"><span>Imsak</span><span class="text-gray-900 font-black">04:28</span></div>
                                    <div class="flex justify-between items-center gap-1"><span>Subuh</span><span class="text-gray-900 font-black">04:38</span></div>
                                    <div class="flex justify-between items-center gap-1"><span>Terbit</span><span class="text-gray-900 font-black">05:54</span></div>
                                    <div class="flex justify-between items-center gap-1"><span>Dzuhur</span><span class="text-gray-900 font-black">12:04</span></div>
                                    <!-- Ashar Aktif -->
                                    <div style="background-color: #063f2b; color: #ffffff;" class="flex justify-between items-center px-1 py-0.5 rounded sm:rounded-md text-white font-extrabold shadow-sm text-[7px] sm:text-[9px]">
                                        <span>Ashar</span><span class="font-black">15:18</span>
                                    </div>
                                    <div class="flex justify-between items-center gap-1"><span>Maghrib</span><span class="text-gray-900 font-black">18:12</span></div>
                                    <div class="flex justify-between items-center gap-1"><span>Isya</span><span class="text-gray-900 font-black">19:21</span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Tengah: Gambar Masjid & Hadis Harian -->
                        <div style="background-image: linear-gradient(to top, rgba(0,0,0,0.85) 15%, rgba(0,0,0,0.25) 75%), url('https://images.unsplash.com/photo-1564769625405-49e0950efc93?auto=format&fit=crop&w=1200&q=80'); background-size: cover; background-position: center;" class="w-[48%] h-full rounded-xl sm:rounded-2xl p-2 border border-orange-100 shadow-sm relative flex flex-col justify-between overflow-hidden">
                            <div class="flex justify-between items-start relative z-10 gap-1">
                                <span style="background-color: #f59e0b; color: #ffffff;" class="text-[6px] sm:text-[7px] font-extrabold px-1.5 py-0.5 rounded uppercase tracking-wider shadow">Hadis</span>
                                <div style="background-color: rgba(0,0,0,0.6);" class="px-1.5 py-0.5 rounded sm:rounded-md border border-white/10 backdrop-blur-sm shrink-0">
                                    <span class="text-[5px] sm:text-[6px] text-gray-300 block uppercase font-bold tracking-wide">MAGHRIB</span>
                                    <span style="color: #f59e0b;" class="text-[8px] sm:text-[10px] font-black tracking-wide">02:30:14</span>
                                </div>
                            </div>
                            <div class="relative z-10 space-y-0.5 text-white">
                                <p class="text-[7.5px] sm:text-[9px] italic font-medium leading-tight line-clamp-2 sm:line-clamp-3">"Sesungguhnya sholat itu mencegah dari perbuatan keji dan munkar."</p>
                                <p style="color: #fde047;" class="text-[6px] sm:text-[7px] font-extrabold uppercase">(QS. AL-ANKABUT: 45)</p>
                            </div>
                        </div>

                        <!-- Kolom Kanan: LAPORAN KAS -->
                        <div style="background-color: #ffffff;" class="w-[26%] h-full rounded-xl sm:rounded-2xl p-1.5 sm:p-2 border border-orange-100 shadow-sm flex flex-col justify-between overflow-hidden">
                            <div class="truncate shrink-0">
                                <div class="flex justify-between items-center border-b border-gray-100 pb-1 mb-1 gap-1">
                                    <p class="text-[6px] sm:text-[7.5px] font-extrabold text-amber-600 uppercase tracking-wider truncate">KAS</p>
                                    <i class="fa-solid fa-chart-pie text-gray-400 text-[7px] sm:text-[9px] shrink-0"></i>
                                </div>
                                <p class="text-[5.5px] sm:text-[6.5px] text-gray-400 font-extrabold tracking-wider leading-none">TOTAL SALDO</p>
                                <p class="text-[8px] sm:text-[10px] font-black text-gray-900 mt-0.5 truncate">Rp 42.850.000</p>
                            </div>
                            
                            <div class="flex-1 flex flex-col justify-center gap-0.5 sm:gap-1 my-1 overflow-hidden">
                                <!-- Pemasukan -->
                                <div style="background-color: #f0fdf4;" class="p-1 rounded sm:rounded-md border border-green-100 flex flex-col items-start gap-0.5 overflow-hidden">
                                    <div class="leading-none w-full">
                                        <span class="text-[5px] sm:text-[5.5px] font-extrabold text-green-700 uppercase tracking-wide">PEMASUKAN</span>
                                        <span class="font-extrabold text-green-900 text-[7px] sm:text-[8.5px] block mt-0.5 truncate">Rp 5.230.000</span>
                                    </div>
                                </div>
                                <!-- Pengeluaran -->
                                <div style="background-color: #fef2f2;" class="p-1 rounded sm:rounded-md border border-red-100 flex flex-col items-start gap-0.5 overflow-hidden">
                                    <div class="leading-none w-full">
                                        <span class="text-[5px] sm:text-[5.5px] font-extrabold text-red-700 uppercase tracking-wide">PENGELUARAN</span>
                                        <span class="font-extrabold text-red-900 text-[7px] sm:text-[8.5px] block mt-0.5 truncate">Rp 2.150.000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- QRIS mini -->
                            <div style="background-color: #fcf8f2;" class="p-1 rounded sm:rounded-md text-[6px] sm:text-[7px] text-center text-gray-700 flex items-center justify-center space-x-1 border border-orange-50 font-medium overflow-hidden shrink-0">
                                <i style="color: #d97706;" class="fa-solid fa-qrcode shrink-0"></i>
                                <span class="truncate leading-none">QRIS Infaq</span>
                            </div>
                        </div>
                    </div>

                    <!-- 2.5 Kotak Agenda Hari Ini -->
                    <div style="background-color: #ffffff;" class="w-full rounded-xl sm:rounded-2xl p-1.5 sm:p-2 border border-orange-100 shadow-sm flex items-center justify-between gap-1.5 shrink-0 overflow-hidden">
                        <div class="flex items-center space-x-1 shrink-0 pl-0.5">
                            <div style="background-color: #fef3c7; color: #d97706;" class="w-4 h-4 sm:w-5 sm:h-5 rounded flex items-center justify-center text-[7px] sm:text-[8px] font-bold">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <span class="text-[6.5px] sm:text-[7.5px] font-black text-gray-700 uppercase tracking-wider hidden sm:block">AGENDA</span>
                        </div>
                        <div class="flex gap-1 w-full flex-1 min-w-0">
                            <div style="background-color: #fcf8f2;" class="w-1/2 p-1 rounded sm:rounded-md border border-orange-100 flex items-center gap-1 overflow-hidden">
                                <span class="text-[6px] sm:text-[6.5px] font-black bg-amber-100 text-amber-900 px-1 py-0.5 rounded-sm shrink-0">18:30 • MAGHRIB</span>
                                <span class="font-bold text-gray-800 text-[7px] sm:text-[8.5px] truncate">Kajian Kitab Riyadhus Shalihin</span>
                            </div>
                            <div style="background-color: #fcf8f2;" class="w-1/2 p-1 rounded sm:rounded-md border border-orange-100 flex items-center gap-1 overflow-hidden">
                                <span class="text-[6px] sm:text-[6.5px] font-black bg-amber-100 text-amber-900 px-1 py-0.5 rounded-sm shrink-0">16:00 • ASHAR</span>
                                <span class="font-bold text-gray-800 text-[7px] sm:text-[8.5px] truncate">TPA Anak-Anak</span>
                            </div>
                        </div>
                    </div>

                    <!-- 3. TV Bottom Ticker / Info -->
                    <div style="background: linear-gradient(to right, #f59e0b, #d97706); color: #ffffff;" class="w-full px-2 py-1 sm:py-1.5 rounded-xl sm:rounded-2xl flex items-center justify-between shadow-sm shrink-0 overflow-hidden">
                        <div class="flex items-center space-x-1.5 truncate">
                            <span style="background-color: #063f2b; color: #ffffff;" class="px-1.5 py-0.5 rounded text-[6px] sm:text-[7px] uppercase tracking-wider shadow-sm shrink-0 font-black">INFO</span>
                            <span class="truncate text-[7.5px] sm:text-[8.5px] font-semibold leading-none">Jadwal Sholat Jumat tgl 23 Februari 2024: Imam & Khatib Ustadz H. Ahmad Syarifuddin, Lc.</span>
                        </div>
                        <div class="flex items-center space-x-1 shrink-0 pl-1.5 border-l border-white/20">
                            <span class="text-[6.5px] sm:text-[7.5px] font-normal opacity-90 hidden sm:inline">Mohon matikan ponsel.</span>
                            <i class="fa-solid fa-bell-slash text-[7px] sm:text-[8px]"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Area Running Text -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">RUNNING TEXT BANNER</label>
                    <span class="text-[10px] text-gray-400 font-medium italic">Preview akan otomatis berubah saat Anda mengetik</span>
                </div>
                
                <div class="flex gap-3">
                    <input type="text" value="Mohon luruskan dan rapatkan shaf sebelum shalat dimulai..." class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-sm text-gray-800 focus:border-[#063f2b] focus:bg-white focus:ring-2 focus:ring-[#063f2b]/10 outline-none transition font-medium">
                    
                    <button class="bg-[#f59e0b] hover:bg-[#d97706] text-white px-8 py-3.5 rounded-xl text-xs font-bold transition shadow-sm shrink-0 uppercase tracking-wider">
                        Update
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // 1. Siapkan Data Dummy Mingguan & Bulanan
    const dataMingguan = {
        labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
        datasets: [
            { label: 'Pemasukan', data: [2500000, 3200000, 1800000, 4100000], backgroundColor: '#063f2b', borderRadius: 4, barPercentage: 0.6 },
            { label: 'Pengeluaran', data: [1200000, 1500000, 900000, 2100000], backgroundColor: '#f59e0b', borderRadius: 4, barPercentage: 0.6 }
        ]
    };

    const dataBulanan = {
        labels: ['Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep'],
        datasets: [
            { label: 'Pemasukan', data: [12500000, 15200000, 11800000, 16100000, 13500000, 17000000], backgroundColor: '#063f2b', borderRadius: 4, barPercentage: 0.6 },
            { label: 'Pengeluaran', data: [4500000, 6100000, 3800000, 5500000, 4200000, 6800000], backgroundColor: '#f59e0b', borderRadius: 4, barPercentage: 0.6 }
        ]
    };

    // 2. Render Grafik Pertama Kali (Format Mingguan)
    const ctx = document.getElementById('cashflowChart').getContext('2d');
    let cashflowChart = new Chart(ctx, {
        type: 'bar',
        data: dataMingguan,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8, padding: 20, font: { family: 'Inter', size: 12 } } },
                tooltip: { callbacks: { label: function(context) { return ' Rp ' + context.raw.toLocaleString('id-ID'); } } }
            },
            scales: {
                y: { 
                    beginAtZero: true, 
                    border: { display: false },
                    grid: { color: '#f3f4f6' },
                    ticks: { callback: function(value) { return (value / 1000000) + 'jt'; }, font: { family: 'Inter', size: 11 }, color: '#9ca3af' }
                },
                x: { 
                    border: { display: false },
                    grid: { display: false },
                    ticks: { font: { family: 'Inter', size: 12 }, color: '#6b7280' }
                }
            }
        }
    });

    // 3. Fungsi Toggle (Ubah Warna Tombol, Teks Subjudul, dan Data Grafik)
    function toggleChartPeriod(period) {
        const btnMingguan = document.getElementById('btn-mingguan');
        const btnBulanan = document.getElementById('btn-bulanan');
        const subtitle = document.getElementById('chart-subtitle');

        const activeClasses = ['bg-[#0a3121]', 'text-white', 'shadow-sm'];
        const inactiveClasses = ['text-gray-500', 'hover:text-gray-900', 'bg-transparent'];

        if (period === 'mingguan') {
            btnMingguan.classList.remove(...inactiveClasses);
            btnMingguan.classList.add(...activeClasses);
            btnBulanan.classList.remove(...activeClasses);
            btnBulanan.classList.add(...inactiveClasses);
            
            // Ubah Teks dan Data ke Mingguan
            subtitle.innerText = 'Laporan Pemasukan dan Pengeluaran 4 Minggu Terakhir';
            cashflowChart.data = dataMingguan;
        } else {
            btnBulanan.classList.remove(...inactiveClasses);
            btnBulanan.classList.add(...activeClasses);
            btnMingguan.classList.remove(...activeClasses);
            btnMingguan.classList.add(...inactiveClasses);
            
            // Ubah Teks dan Data ke Bulanan
            subtitle.innerText = 'Laporan Pemasukan dan Pengeluaran 6 Bulan Terakhir';
            cashflowChart.data = dataBulanan;
        }
        
        // Perbarui tampilan grafik secara visual
        cashflowChart.update();
    }
    // ==========================================
    // FUNGSI INTERAKSI SAKLAR TV DISPLAY AGENDA
    // ==========================================
    const tvToggles = document.querySelectorAll('.tv-display-toggle');
    
    tvToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const icon = this.querySelector('i');
            const currentStatus = this.getAttribute('data-status');
            
            if (currentStatus === 'active') {
                this.classList.replace('bg-[#10b981]', 'bg-gray-200');
                icon.classList.replace('opacity-100', 'opacity-0');
                this.setAttribute('data-status', 'inactive');
                
                if (typeof showToast === "function") showToast('Agenda disembunyikan dari layar TV.');
            } else {
                this.classList.replace('bg-gray-200', 'bg-[#10b981]');
                icon.classList.replace('opacity-0', 'opacity-100');
                this.setAttribute('data-status', 'active');
                
                if (typeof showToast === "function") showToast('Agenda ditampilkan di layar TV.');
            }
        });
    });
</script>

<style>
    /* Animasi khusus untuk teks berjalan di dalam preview TV */
    @keyframes scroll-left {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-running-text {
        display: inline-block;
        white-space: nowrap;
        animation: scroll-left 15s linear infinite;
        padding-left: 100%; /* Memastikan teks mulai dari ujung kanan layar */
    }
    
</style>
@endsection