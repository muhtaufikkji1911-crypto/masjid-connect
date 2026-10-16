@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-12">
    
    <!-- Header Page -->
    <!-- Header Page -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1 tracking-tight">Pengaturan Jadwal Salat</h1>
            <p class="text-sm text-gray-500">Konfigurasi waktu azan, iqamah, dan sinkronisasi API lokasi.</p>
        </div>
    </div>

    <!-- Section 1: Sinkronisasi Lokasi & API -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-gray-100">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-green-50 text-[#063f2b] flex items-center justify-center text-lg border border-green-100">
                    <i class="fa-solid fa-location-crosshairs"></i>
                </div>
                <div>
                    <h2 class="font-bold text-gray-900 text-sm">Sinkronisasi Lokasi & API</h2>
                    <p class="text-xs text-gray-400">Koordinat geografis masjid untuk akurasi jadwal.</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span class="bg-green-50 text-[#10b981] text-[10px] font-bold px-3 py-1.5 rounded-full border border-green-200 flex items-center space-x-1.5">
                    <span class="w-1.5 h-1.5 bg-[#10b981] rounded-full animate-pulse"></span>
                    <span>Auto-synced via Kemenag API</span>
                </span>
                <button class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 shadow-sm">
                    <i class="fa-solid fa-rotate"></i>
                    <span>Sync Now</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Latitude</label>
                <input type="text" value="-5.1476" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Longitude</label>
                <input type="text" value="119.4327" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Kota / Wilayah</label>
                <input type="text" value="Makassar, Sulawesi Selatan" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Metode Kalkulasi</label>
                <input type="text" value="Kemenag RI (20.0° Subuh, 18.0° Isya)" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
            </div>
        </div>
    </div>

    <!-- Section 2: Matriks Jadwal Salat Harian -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-gray-100">
            <div>
                <h2 class="font-bold text-gray-900 text-sm">Matriks Jadwal Salat Harian</h2>
                <p class="text-xs text-gray-400">Konfigurasi koreksi waktu (Ihtiyat) dan jeda iqamah.</p>
            </div>
            <div class="flex items-center space-x-2">
                <button onclick="openPdfModal()" class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center space-x-1.5 shadow-sm">
                    <i class="fa-solid fa-file-pdf text-red-500"></i>
                    <span>Download PDF</span>
                </button>
                <button onclick="openCsvModal()" class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center space-x-1.5 shadow-sm">
                    <i class="fa-solid fa-file-arrow-up text-green-600"></i>
                    <span>Import CSV</span>
                </button>
            </div>
        </div>

        <!-- Table Matriks -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                        <th class="py-3 px-4">Waktu Salat</th>
                        <th class="py-3 px-4">Standar API</th>
                        <th class="py-3 px-4">Koreksi Ihtiyat</th>
                        <th class="py-3 px-4">Efektif Tampil</th>
                        <th class="py-3 px-4">Jeda Iqamah</th>
                        <th class="py-3 px-4">Buzzer/Alarm</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-xs font-medium text-gray-700">
                    
                    <!-- Imsak -->
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-2.5">
                            <span class="w-7 h-7 rounded-lg bg-gray-100 text-gray-600 flex items-center justify-center text-xs"><i class="fa-solid fa-moon"></i></span>
                            <span class="font-bold text-gray-900">Imsak</span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-500">04:28</td>
                        <td class="py-3.5 px-4">
                            <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-lg p-0.5 shadow-inner">
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">-</button>
                                <span class="px-2 text-[11px] font-bold text-gray-800">+2 mnt</span>
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">+</button>
                            </div>
                        </td>
                        <td class="py-3.5 px-4"><span class="bg-[#063f2b] text-white px-3 py-1 rounded-lg font-bold shadow-sm">04:30</span></td>
                        <td class="py-3.5 px-4 text-gray-400 font-normal">- N/A -</td>
                        <td class="py-3.5 px-4">
                            <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 outline-none focus:border-[#063f2b]">
                                <option>Standard Beep</option>
                                <option>Muted</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Subuh -->
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-2.5">
                            <span class="w-7 h-7 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center text-xs"><i class="fa-solid fa-cloud-sun"></i></span>
                            <span class="font-bold text-gray-900">Subuh</span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-500">04:38</td>
                        <td class="py-3.5 px-4">
                            <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-lg p-0.5 shadow-inner">
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">-</button>
                                <span class="px-2 text-[11px] font-bold text-gray-800">+2 mnt</span>
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">+</button>
                            </div>
                        </td>
                        <td class="py-3.5 px-4"><span class="bg-[#063f2b] text-white px-3 py-1 rounded-lg font-bold shadow-sm">04:40</span></td>
                        <td class="py-3.5 px-4">
                            <div class="flex items-center space-x-1.5">
                                <input type="number" value="10" class="w-12 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1 text-center font-bold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none">
                                <span class="text-gray-400 text-[11px]">mnt</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 outline-none focus:border-[#063f2b]">
                                <option>Azan Makkah</option>
                                <option>Standard Adzan</option>
                                <option>Standard Beep</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Terbit -->
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-2.5">
                            <span class="w-7 h-7 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center text-xs"><i class="fa-solid fa-sun"></i></span>
                            <span class="font-bold text-gray-900">Terbit</span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-500">05:55</td>
                        <td class="py-3.5 px-4">
                            <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-lg p-0.5 shadow-inner">
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">-</button>
                                <span class="px-2 text-[11px] font-bold text-gray-800">+2 mnt</span>
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">+</button>
                            </div>
                        </td>
                        <td class="py-3.5 px-4"><span class="bg-[#063f2b] text-white px-3 py-1 rounded-lg font-bold shadow-sm">05:57</span></td>
                        <td class="py-3.5 px-4 text-gray-400 font-normal">- N/A -</td>
                        <td class="py-3.5 px-4">
                            <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 outline-none focus:border-[#063f2b]">
                                <option>Sunrise Alarm</option>
                                <option>Muted</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Dzuhur -->
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-2.5">
                            <span class="w-7 h-7 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center text-xs"><i class="fa-solid fa-sun"></i></span>
                            <span class="font-bold text-gray-900">Dzuhur</span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-500">12:02</td>
                        <td class="py-3.5 px-4">
                            <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-lg p-0.5 shadow-inner">
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">-</button>
                                <span class="px-2 text-[11px] font-bold text-gray-800">+2 mnt</span>
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">+</button>
                            </div>
                        </td>
                        <td class="py-3.5 px-4"><span class="bg-[#063f2b] text-white px-3 py-1 rounded-lg font-bold shadow-sm">12:04</span></td>
                        <td class="py-3.5 px-4">
                            <div class="flex items-center space-x-1.5">
                                <input type="number" value="10" class="w-12 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1 text-center font-bold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none">
                                <span class="text-gray-400 text-[11px]">mnt</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 outline-none focus:border-[#063f2b]">
                                <option>Standard Adzan</option>
                                <option>Azan Makkah</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Ashar -->
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-2.5">
                            <span class="w-7 h-7 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center text-xs"><i class="fa-solid fa-cloud-sun"></i></span>
                            <span class="font-bold text-gray-900">Ashar</span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-500">15:20</td>
                        <td class="py-3.5 px-4">
                            <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-lg p-0.5 shadow-inner">
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">-</button>
                                <span class="px-2 text-[11px] font-bold text-gray-800">+2 mnt</span>
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">+</button>
                            </div>
                        </td>
                        <td class="py-3.5 px-4"><span class="bg-[#063f2b] text-white px-3 py-1 rounded-lg font-bold shadow-sm">15:22</span></td>
                        <td class="py-3.5 px-4">
                            <div class="flex items-center space-x-1.5">
                                <input type="number" value="10" class="w-12 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1 text-center font-bold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none">
                                <span class="text-gray-400 text-[11px]">mnt</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 outline-none focus:border-[#063f2b]">
                                <option>Standard Adzan</option>
                                <option>Azan Makkah</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Maghrib -->
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-2.5">
                            <span class="w-7 h-7 rounded-lg bg-red-50 text-red-500 flex items-center justify-center text-xs"><i class="fa-solid fa-cloud-moon"></i></span>
                            <span class="font-bold text-gray-900">Maghrib</span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-500">18:05</td>
                        <td class="py-3.5 px-4">
                            <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-lg p-0.5 shadow-inner">
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">-</button>
                                <span class="px-2 text-[11px] font-bold text-gray-800">+2 mnt</span>
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">+</button>
                            </div>
                        </td>
                        <td class="py-3.5 px-4"><span class="bg-[#063f2b] text-white px-3 py-1 rounded-lg font-bold shadow-sm">18:07</span></td>
                        <td class="py-3.5 px-4">
                            <div class="flex items-center space-x-1.5">
                                <input type="number" value="7" class="w-12 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1 text-center font-bold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none">
                                <span class="text-gray-400 text-[11px]">mnt</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 outline-none focus:border-[#063f2b]">
                                <option>Standard Adzan</option>
                                <option>Azan Makkah</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Isya -->
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-2.5">
                            <span class="w-7 h-7 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-xs"><i class="fa-solid fa-moon"></i></span>
                            <span class="font-bold text-gray-900">Isya</span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-500">19:15</td>
                        <td class="py-3.5 px-4">
                            <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-lg p-0.5 shadow-inner">
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">-</button>
                                <span class="px-2 text-[11px] font-bold text-gray-800">+2 mnt</span>
                                <button class="w-6 h-6 bg-white hover:bg-gray-200 rounded text-gray-600 text-xs font-bold shadow-sm">+</button>
                            </div>
                        </td>
                        <td class="py-3.5 px-4"><span class="bg-[#063f2b] text-white px-3 py-1 rounded-lg font-bold shadow-sm">19:17</span></td>
                        <td class="py-3.5 px-4">
                            <div class="flex items-center space-x-1.5">
                                <input type="number" value="10" class="w-12 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1 text-center font-bold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none">
                                <span class="text-gray-400 text-[11px]">mnt</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 outline-none focus:border-[#063f2b]">
                                <option>Standard Adzan</option>
                                <option>Azan Makkah</option>
                            </select>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Section 3: Pengaturan Khusus Salat Jumat -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-6">
        <div class="flex items-center space-x-3 pb-4 border-b border-gray-100">
            <div class="w-10 h-10 rounded-xl bg-green-50 text-[#063f2b] flex items-center justify-center text-lg border border-green-100">
                <i class="fa-solid fa-mosque"></i>
            </div>
            <div>
                <h2 class="font-bold text-gray-900 text-sm">Pengaturan Khusus Salat Jumat</h2>
                <p class="text-xs text-gray-400">Manajemen petugas dan mode display khusus hari Jumat.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
            
            <!-- Left inputs -->
            <div class="space-y-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Khatib Pekan Ini</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                            <i class="fa-solid fa-user-tie text-xs"></i>
                        </span>
                        <input type="text" value="KH. Dr. Hasanuddin Al-Makassary" class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Imam Jumat</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                            <i class="fa-solid fa-user text-xs"></i>
                        </span>
                        <input type="text" value="Ust. Syamsuddin" class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                    </div>
                </div>
            </div>

            <!-- Right Toggle & Info Box -->
            <div class="bg-gray-50/70 border border-gray-100 rounded-2xl p-5 space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-gray-900 text-xs">Friday Auto-Mode</h4>
                        <p class="text-[11px] text-gray-500 mt-0.5">Nonaktifkan countdown iqamah pada Dzuhur Jumat & tampilkan info petugas secara otomatis.</p>
                    </div>
                    <!-- Toggle Switch (On) -->
                    <div class="w-11 h-6 bg-[#063f2b] rounded-full relative cursor-pointer shadow-inner shrink-0 border border-[#063f2b]">
                        <div class="w-4 h-4 bg-white rounded-full absolute right-[2px] top-[3px] shadow-sm"></div>
                    </div>
                </div>

                <div class="bg-blue-50/70 border border-blue-100/60 rounded-xl p-3 flex items-start space-x-2.5 text-blue-900">
                    <i class="fa-solid fa-circle-info text-blue-500 mt-0.5"></i>
                    <p class="text-[11px] leading-relaxed">Sistem akan beralih ke mode "Khotbah" 5 menit sebelum waktu Dzuhur.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Action Bar -->
    <div class="flex items-center justify-between pt-4">
        <div class="flex items-center space-x-2 text-xs font-medium text-gray-500">
            <span class="w-2 h-2 rounded-full bg-[#10b981]"></span>
            <span>Semua perubahan divalidasi</span>
        </div>
        <div class="flex items-center space-x-3">
            <button class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-5 py-2.5 rounded-xl text-xs font-bold transition shadow-sm">
                Reset Default
            </button>
            <button class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-6 py-2.5 rounded-xl text-xs font-bold transition shadow-md">
                Simpan Perubahan
            </button>
        </div>
    </div>

</div>
<!-- ========================================== -->
    <!-- MODAL 1: DOWNLOAD PDF JADWAL SALAT -->
    <!-- ========================================== -->
    <div id="pdfModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closePdfModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[480px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="pdfModalBox">
            
            <div class="px-6 py-4 flex justify-between items-start border-b border-gray-100 bg-red-50/40 rounded-t-2xl">
                <div>
                    <h2 class="text-base font-bold text-gray-900 tracking-tight">Download Laporan PDF</h2>
                    <p class="text-[11px] text-gray-500 mt-0.5">Cetak matriks jadwal salat dan iqamah.</p>
                </div>
                <button onclick="closePdfModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-7 h-7 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
            
            <div class="p-6 space-y-4 text-xs">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Periode Jadwal</label>
                    <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-pointer">
                        <option>Bulan Ini (Maret 2024)</option>
                        <option>Bulan Depan (April 2024)</option>
                        <option>1 Tahun Penuh (2024)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Orientasi Kertas</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="orientation" class="peer sr-only" checked>
                            <div class="border border-gray-200 rounded-xl p-3 flex flex-col items-center justify-center text-gray-400 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-600 transition shadow-sm">
                                <i class="fa-solid fa-file text-lg mb-1"></i>
                                <span class="font-bold">Potret (Portrait)</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="orientation" class="peer sr-only">
                            <div class="border border-gray-200 rounded-xl p-3 flex flex-col items-center justify-center text-gray-400 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-600 transition shadow-sm">
                                <i class="fa-solid fa-file-lines text-lg mb-1 rotate-90"></i>
                                <span class="font-bold">Lanskap (Landscape)</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex items-center space-x-2 pt-1 text-gray-600">
                    <input type="checkbox" id="includeNote" class="rounded text-[#063f2b] focus:ring-[#063f2b]" checked>
                    <label for="includeNote" class="text-[11px] select-none">Sertakan catatan koreksi Ihtiyat & nama pengurus</label>
                </div>
            </div>
            
            <div class="px-6 py-3.5 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closePdfModal()" class="font-bold text-gray-500 hover:text-gray-800 transition px-3 py-1.5 text-xs">Batal</button>
                <button onclick="closePdfModal()" class="flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-xl font-bold transition shadow-md text-xs">
                    <i class="fa-solid fa-download"></i>
                    <span>Generate PDF</span>
                </button>
            </div>
        </div>
    </div>


    <!-- ========================================== -->
    <!-- MODAL 2: IMPORT CSV JADWAL SALAT -->
    <!-- ========================================== -->
    <div id="csvModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeCsvModal()"></div>
        <div class="bg-white rounded-2xl w-full max-w-[480px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="csvModalBox">
            
            <div class="px-6 py-4 flex justify-between items-start border-b border-gray-100 bg-green-50/40 rounded-t-2xl">
                <div>
                    <h2 class="text-base font-bold text-gray-900 tracking-tight">Import Data Jadwal (CSV)</h2>
                    <p class="text-[11px] text-gray-500 mt-0.5">Unggah data jadwal dari Kemenag atau Hisab.</p>
                </div>
                <button onclick="closeCsvModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-7 h-7 rounded-full flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
            
            <div class="p-6 space-y-4 text-xs">
                <!-- Area Upload Drag & Drop -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">File CSV Jadwal</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 p-6 flex flex-col items-center justify-center cursor-pointer transition">
                        <div class="w-10 h-10 bg-white shadow-sm border border-gray-100 rounded-full flex items-center justify-center text-green-600 mb-2">
                            <i class="fa-solid fa-file-arrow-up text-base"></i>
                        </div>
                        <p class="text-xs text-gray-800 font-medium mb-1">Tarik file CSV ke sini atau <span class="text-[#063f2b] underline">cari file</span></p>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider">Format: .csv (Maksimal 2MB)</p>
                    </div>
                </div>

                <div class="bg-amber-50/60 border border-amber-100 rounded-xl p-3 flex items-start space-x-2.5 text-amber-900">
                    <i class="fa-solid fa-triangle-exclamation text-amber-500 mt-0.5"></i>
                    <p class="text-[11px] leading-relaxed">Pastikan struktur kolom CSV sesuai dengan template resmi Masjid Connect (Tanggal, Imsak, Subuh, Dzuhur, Ashar, Maghrib, Isya).</p>
                </div>
            </div>
            
            <div class="px-6 py-3.5 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                <button onclick="closeCsvModal()" class="font-bold text-gray-500 hover:text-gray-800 transition px-3 py-1.5 text-xs">Batal</button>
                <button onclick="closeCsvModal()" class="flex items-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-5 py-2 rounded-xl font-bold transition shadow-md text-xs">
                    <i class="fa-solid fa-upload"></i>
                    <span>Upload & Sinkronkan</span>
                </button>
            </div>
        </div>
    </div>


    <!-- Script Kontrol Modal PDF & CSV -->
    <script>
        // Modal PDF
        function openPdfModal() {
            const modal = document.getElementById('pdfModal');
            const box = document.getElementById('pdfModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closePdfModal() {
            const modal = document.getElementById('pdfModal');
            const box = document.getElementById('pdfModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        // Modal CSV
        function openCsvModal() {
            const modal = document.getElementById('csvModal');
            const box = document.getElementById('csvModalBox');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }
        function closeCsvModal() {
            const modal = document.getElementById('csvModal');
            const box = document.getElementById('csvModalBox');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
    </script>
@endsection