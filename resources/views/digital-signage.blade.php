@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-12">
    
    <!-- Header Page -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
        <div>
            <div class="flex items-center space-x-3 mb-1">
                <h1 class="text-xl font-bold text-gray-900 tracking-tight">Digital Signage Control Panel</h1>
                <span id="sync-status-badge" class="bg-green-50 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded-full border border-green-200 flex items-center space-x-1.5">
                    <span class="w-1.5 h-1.5 bg-[#10b981] rounded-full animate-pulse"></span>
                    <span>Connected / Sync OK</span>
                </span>
            </div>
            <p class="text-xs text-gray-500">TV Utama Ruang Sholat (Android TV Box - 192.168.1.50)</p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <!-- Tombol Refresh -->
            <button id="btn-refresh-screen" class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 shadow-sm">
                <i id="icon-refresh" class="fa-solid fa-rotate text-gray-400"></i>
                <span>Refresh Screen</span>
            </button>
            
            <!-- Tombol Preview Fullscreen -->
            <button onclick="window.open('/preview-signage', '_blank')" class="bg-[#10b981] hover:bg-[#059669] text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 shadow-md">
                <i class="fa-solid fa-expand"></i>
                <span>Preview Fullscreen TV</span>
            </button>
            
            <!-- Toggle Mode Khutbah -->
            <div id="toggle-khutbah-container" class="flex items-center space-x-3 bg-gray-50 border border-gray-200 px-3 py-1.5 rounded-xl cursor-pointer hover:bg-gray-100 transition">
                <span class="text-xs font-bold text-gray-700">Mode Khutbah / Senyap</span>
                <div id="toggle-bg"     class="w-10 h-5 bg-gray-300 rounded-full relative shadow-inner transition-colors duration-300">
                    <div id="toggle-circle" class="w-4 h-4 bg-white rounded-full absolute left-0.5 top-0.5 shadow-sm transform transition-transform duration-300 translate-x-0"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Live Preview TV Screen -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-gray-900 text-sm">Live Preview Layar TV Masjid</h2>
            <span class="text-[11px] text-gray-400 font-medium">Resolusi: 1920 x 1080 (16:9)</span>
        </div>

        <!-- Simulated TV Frame: Elegant Light V2 (Persis Referensi) -->
        <div style="background-color: #faf5ed; width: 100%; box-sizing: border-box;" class="rounded-3xl p-6 shadow-xl border border-orange-200 text-gray-800 flex flex-col space-y-4">
            
            <!-- 1. TV Top Header -->
            <div style="background-color: #ffffff; width: 100%; box-sizing: border-box;" class="flex justify-between items-center px-6 py-4 rounded-2xl border border-orange-100 shadow-sm">
                <div class="flex items-center space-x-3.5">
                    <div style="background-color: #f59e0b; color: #ffffff;" class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-lg shadow-md shrink-0">
                        <i class="fa-solid fa-mosque"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-base text-gray-900 leading-tight">Masjid Al-Ikhlas</h3>
                        <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase mt-0.5">KEBON JERUK, JAKARTA BARAT</p>
                    </div>
                </div>
                <div class="text-center">
                    <p style="color: #d97706;" class="text-xs font-black uppercase tracking-wider">12 Sya'ban 1445 H</p>
                    <p class="text-[10px] text-gray-400 font-medium">Kamis, 22 Februari 2024</p>
                </div>
                <div class="text-right">
                    <span style="color: #f59e0b;" class="text-3xl font-black tracking-wider">15:42<span class="text-xs text-gray-400 font-normal ml-1">:18</span></span>
                </div>
            </div>

            <!-- 2. TV Middle Body (Grid 3 Kolom Utama Persis Referensi) -->
            <div style="display: flex; flex-direction: row; gap: 14px; width: 100%; box-sizing: border-box;">
                
                <!-- Kolom Kiri: JADWAL SHOLAT (Lebar 24%) -->
                <div style="background-color: #ffffff; width: 24%; box-sizing: border-box;" class="rounded-2xl p-4 border border-orange-100 shadow-sm flex flex-col justify-between space-y-1">
                    <div>
                        <p class="text-[9px] font-extrabold text-amber-600 uppercase tracking-widest border-b border-gray-100 pb-2 mb-2">JADWAL SHOLAT</p>
                        <div class="space-y-1 text-xs font-semibold">
                            <div class="flex justify-between text-gray-600 px-1.5 py-1"><span>Imsak</span><span class="text-gray-900 font-bold">04:28</span></div>
                            <div class="flex justify-between text-gray-600 px-1.5 py-1"><span>Subuh</span><span class="text-gray-900 font-bold">04:38</span></div>
                            <div class="flex justify-between text-gray-600 px-1.5 py-1"><span>Terbit</span><span class="text-gray-900 font-bold">05:54</span></div>
                            <div class="flex justify-between text-gray-600 px-1.5 py-1"><span>Dzuhur</span><span class="text-gray-900 font-bold">12:04</span></div>
                            <!-- Ashar Aktif (Hijau Tua) -->
                            <div style="background-color: #063f2b; color: #ffffff;" class="flex justify-between px-3 py-1.5 rounded-xl font-bold shadow-sm">
                                <span>Ashar</span>
                                <span>15:18</span>
                            </div>
                            <div class="flex justify-between text-gray-600 px-1.5 py-1"><span>Maghrib</span><span class="text-gray-900 font-bold">18:12</span></div>
                            <div class="flex justify-between text-gray-600 px-1.5 py-1"><span>Isya</span><span class="text-gray-900 font-bold">19:21</span></div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Tengah: Gambar Masjid & Hadis Harian (Lebar 52%) -->
                <div style="width: 52%; box-sizing: border-box; background-image: linear-gradient(to top, rgba(0,0,0,0.85) 15%, rgba(0,0,0,0.25) 75%), url('https://images.unsplash.com/photo-1564769625405-49e0950efc93?auto=format&fit=crop&w=1200&q=80'); background-size: cover; background-position: center;" class="rounded-2xl p-5 border border-orange-100 shadow-sm relative flex flex-col justify-between min-h-[220px]">
                    <div class="flex justify-between items-start relative z-10">
                        <span style="background-color: #f59e0b; color: #ffffff;" class="text-[9px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider shadow">Hadis Harian</span>
                        <div style="background-color: rgba(0,0,0,0.6);" class="px-3.5 py-1.5 rounded-xl text-right border border-white/10 backdrop-blur-sm">
                            <span class="text-[8px] text-gray-300 block uppercase tracking-wider font-semibold">WAKTU MENUJU MAGHRIB</span>
                            <span style="color: #f59e0b;" class="text-sm font-black tracking-wide">02:30:14</span>
                        </div>
                    </div>
                    <div class="relative z-10 space-y-1 text-white">
                        <p class="text-xs sm:text-sm italic font-medium leading-relaxed">"Sesungguhnya sholat itu mencegah dari perbuatan keji dan munkar."</p>
                        <p style="color: #fde047;" class="text-[10px] font-bold">(QS. AL-ANKABUT: 45)</p>
                    </div>
                </div>

                <!-- Kolom Kanan: LAPORAN KAS (Lebar 24%) -->
                <div style="background-color: #ffffff; width: 24%; box-sizing: border-box;" class="rounded-2xl p-4 border border-orange-100 shadow-sm flex flex-col justify-between space-y-2">
                    <div>
                        <div class="flex justify-between items-center border-b border-gray-100 pb-2 mb-2">
                            <p class="text-[9px] font-extrabold text-amber-600 uppercase tracking-widest">LAPORAN KAS</p>
                            <i class="fa-solid fa-chart-pie text-gray-400 text-xs"></i>
                        </div>
                        <p class="text-[9px] text-gray-400 font-bold tracking-wider">TOTAL SALDO KAS</p>
                        <p class="text-base font-black text-gray-900 mt-0.5">Rp 42.850.000</p>
                    </div>
                    
                    <div class="space-y-1.5 text-[11px]">
                        <div style="background-color: #f0fdf4;" class="p-2 rounded-xl border border-green-100 flex justify-between items-center">
                            <div>
                                <span class="text-[8px] font-extrabold text-green-700 block uppercase">PEMASUKAN</span>
                                <span class="font-extrabold text-green-900 text-xs">Rp 5.230.000</span>
                            </div>
                            <span class="text-[10px] text-green-600 font-bold">Minggu ini</span>
                        </div>
                        <div style="background-color: #fef2f2;" class="p-2 rounded-xl border border-red-100 flex justify-between items-center">
                            <div>
                                <span class="text-[8px] font-extrabold text-red-700 block uppercase">PENGELUARAN</span>
                                <span class="font-extrabold text-red-900 text-xs">Rp 2.150.000</span>
                            </div>
                            <span class="text-[10px] text-red-600 font-bold">Operasional</span>
                        </div>
                    </div>

                    <div style="background-color: #fcf8f2;" class="p-2 rounded-xl text-[9px] text-center text-gray-700 flex items-center justify-center space-x-1.5 border border-orange-100 font-medium">
                        <i style="color: #d97706;" class="fa-solid fa-qrcode"></i>
                        <span>Scan QRIS Infaq Masjid melalui Layar Ini</span>
                    </div>
                </div>

            </div>

            <!-- 2.5 Kotak Agenda Hari Ini (Persis Referensi) -->
            <div style="background-color: #ffffff; width: 100%; box-sizing: border-box;" class="rounded-2xl p-3.5 border border-orange-100 shadow-sm flex items-center justify-between gap-4 text-xs">
                <div class="flex items-center space-x-2.5 shrink-0 pl-1">
                    <div style="background-color: #fef3c7; color: #d97706;" class="w-7 h-7 rounded-xl flex items-center justify-center text-xs font-bold">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <span class="text-[10px] font-black text-gray-700 uppercase tracking-wider">AGENDA HARI INI</span>
                </div>
                <div style="display: flex; gap: 12px; width: 100%;">
                    <div style="background-color: #fcf8f2; width: 50%;" class="p-2.5 rounded-xl border border-orange-100 flex items-center space-x-2.5">
                        <span class="text-[9px] font-bold bg-amber-100 text-amber-900 px-2 py-0.5 rounded shrink-0">18:30 • BAKDA MAGHRIB</span>
                        <span class="font-bold text-gray-800 text-xs truncate">Kajian Kitab Riyadhus Shalihin</span>
                    </div>
                    <div style="background-color: #fcf8f2; width: 50%;" class="p-2.5 rounded-xl border border-orange-100 flex items-center space-x-2.5">
                        <span class="text-[9px] font-bold bg-amber-100 text-amber-900 px-2 py-0.5 rounded shrink-0">16:00 • BAKDA ASHAR</span>
                        <span class="font-bold text-gray-800 text-xs truncate">TPA Anak-Anak (Gedung B)</span>
                    </div>
                </div>
            </div>

            <!-- 3. TV Bottom Ticker / Info -->
            <div style="background: linear-gradient(to right, #f59e0b, #d97706); color: #ffffff; width: 100%; box-sizing: border-box;" class="px-5 py-3 rounded-2xl flex items-center justify-between text-xs font-bold shadow-sm">
                <div class="flex items-center space-x-3 truncate">
                    <span style="background-color: #063f2b; color: #ffffff;" class="px-2.5 py-1 rounded-xl text-[9px] uppercase tracking-wider shadow-sm shrink-0 font-black">INFO MASJID</span>
                    <span class="truncate text-xs font-semibold">Jadwal Sholat Jumat tgl 23 Februari 2024: Imam & Khatib Ustadz H. Ahmad Syarifuddin, Lc.</span>
                </div>
                <div class="flex items-center space-x-2 shrink-0 pl-4 border-l border-white/20">
                    <span class="text-[11px] font-normal opacity-90 hidden md:inline">Mohon matikan alat komunikasi selama beribadah.</span>
                    <i class="fa-solid fa-bell-slash text-sm"></i>
                </div>
            </div>

        </div>
    </div>

    <!-- Section: Tabs & Management Area -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-6">

        <!-- Tab Content 1: Media & Poster Slider -->
        <div id="tab-media" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Upload Box -->
            <div id="upload-media-box" class="border-2 border-dashed border-gray-200 rounded-2xl bg-gray-50/50 hover:bg-gray-100 hover:border-[#063f2b] p-6 flex flex-col items-center justify-center cursor-pointer transition-all duration-300 text-center group">
                <div class="w-12 h-12 bg-white shadow-sm border border-gray-100 rounded-full flex items-center justify-center text-amber-500 mb-3 group-hover:scale-110 group-hover:text-[#063f2b] transition-transform">
                    <i class="fa-solid fa-cloud-arrow-up text-lg"></i>
                </div>
                <h4 class="text-xs font-bold text-gray-800 mb-1 group-hover:text-[#063f2b] transition-colors">Upload New Media</h4>
                <p class="text-[11px] text-gray-400 mb-3">Support JPG, PNG, MP4. Max size 50MB.<br>Recommended 1920x1080 px.</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mb-2 overflow-hidden">
                    <div class="bg-[#063f2b] h-full w-[60%]"></div>
                </div>
                <div class="flex justify-between w-full text-[10px] text-gray-400 font-medium">
                    <span>Storage Usage</span>
                    <span>1.2 GB / 2.0 GB USED</span>
                </div>
            </div>

            <!-- Active Playlist Items -->
            <div class="lg:col-span-2 space-y-3">
                <div class="flex justify-between items-center mb-1">
                    <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Active Playlist <span id="playlist-count" class="text-gray-400 font-normal">(3 items)</span></h4>
                    <button id="btn-reorder" class="text-sm font-bold text-[#063f2b] hover:text-green-800 transition bg-green-50/50 hover:bg-green-100 px-3 py-1.5 rounded-lg border border-green-200 shadow-sm flex items-center">
                        <i class="fa-solid fa-sort mr-2"></i> Reorder All
                    </button>
                </div>

                <!-- Item 1 -->
                <div class="playlist-item border border-gray-100 rounded-xl p-3 flex items-center justify-between bg-white hover:border-[#063f2b]/30 hover:shadow-sm transition">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-grip-vertical text-gray-300 cursor-grab hover:text-gray-500 transition"></i>
                        <!-- Tulisan "POSTER" dan efek gradient dihapus -->
                        <div class="w-16 h-10 bg-gray-200 rounded-lg overflow-hidden shrink-0 relative bg-cover bg-center shadow-inner" style="background-image: url('https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?auto=format&fit=crop&w=200&q=80')">
                        </div>
                        <div>
                            <h5 class="text-xs font-bold text-gray-800 item-title">Poster Kajian Jumat Malam.png</h5>
                            <p class="text-[10px] text-gray-400 mt-0.5">Uploaded 2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-1.5 bg-gray-50 border border-gray-200 px-2.5 py-1 rounded-lg text-xs">
                            <span class="text-gray-400 text-[10px]">Duration:</span>
                            <span class="font-bold text-gray-800">15s</span>
                        </div>
                        <button class="btn-edit-media text-gray-400 hover:text-blue-600 p-1.5 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn-delete-media text-gray-400 hover:text-red-500 p-1.5 transition"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="playlist-item border border-gray-100 rounded-xl p-3 flex items-center justify-between bg-white hover:border-[#063f2b]/30 hover:shadow-sm transition">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-grip-vertical text-gray-300 cursor-grab hover:text-gray-500 transition"></i>
                        <!-- Tulisan "DONASI" dan efek gradient dihapus -->
                        <div class="w-16 h-10 bg-gray-200 rounded-lg overflow-hidden shrink-0 relative bg-cover bg-center shadow-inner" style="background-image: url('https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=200&q=80')">
                        </div>
                        <div>
                            <h5 class="text-xs font-bold text-gray-800 item-title">Donasi Renovasi Atap.jpg</h5>
                            <p class="text-[10px] text-gray-400 mt-0.5">Uploaded 1 day ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-1.5 bg-gray-50 border border-gray-200 px-2.5 py-1 rounded-lg text-xs">
                            <span class="text-gray-400 text-[10px]">Duration:</span>
                            <span class="font-bold text-gray-800">10s</span>
                        </div>
                        <button class="btn-edit-media text-gray-400 hover:text-blue-600 p-1.5 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn-delete-media text-gray-400 hover:text-red-500 p-1.5 transition"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </div>
                
                <!-- Item 3 -->
                <div class="playlist-item border border-gray-100 rounded-xl p-3 flex items-center justify-between bg-white hover:border-[#063f2b]/30 hover:shadow-sm transition">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-grip-vertical text-gray-300 cursor-grab hover:text-gray-500 transition"></i>
                        <div class="w-16 h-10 bg-gray-900 rounded-lg overflow-hidden shrink-0 relative flex items-center justify-center text-white">
                            <i class="fa-solid fa-play text-xs text-amber-400"></i>
                            <span class="absolute bottom-1 right-1 text-[8px] bg-black/60 px-1 rounded">01:45</span>
                        </div>
                        <div>
                            <h5 class="text-xs font-bold text-gray-800 item-title">Video Dokumentasi Qurban.mp4</h5>
                            <p class="text-[10px] text-gray-400 mt-0.5">Uploaded 3 days ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-1.5 bg-green-50 border border-green-100 px-2.5 py-1 rounded-lg text-xs">
                            <span class="text-green-600/70 text-[10px]">Mode:</span>
                            <span class="font-bold text-green-700">FULL VIDEO</span>
                        </div>
                        <button class="btn-edit-media text-gray-400 hover:text-blue-600 p-1.5 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn-delete-media text-gray-400 hover:text-red-500 p-1.5 transition"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Section Bottom: Running Text & Prayer Timing Control -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pt-6 border-t border-gray-100">
            
            <!-- Left: Running Text Editor -->
            <div class="bg-gray-50/70 border border-gray-100 rounded-2xl p-5 flex flex-col h-full space-y-4">
                <div class="flex justify-between items-center shrink-0">
                    <h3 class="font-bold text-gray-900 text-xs">Running Text / Ticker</h3>
                    <span class="bg-green-100 text-[#10b981] text-[9px] font-bold px-2 py-0.5 rounded uppercase">Live Updates On</span>
                </div>
                
                <!-- Area Input Teks (Dibuat Flex-1 agar mengisi ruang kosong) -->
                <div class="flex-1 flex flex-col">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Ticker Announcement</label>
                    <textarea id="ticker-announcement-input" class="w-full flex-1 bg-white border border-gray-200 rounded-xl p-4 text-xs text-gray-800 focus:border-[#063f2b] outline-none transition resize-none font-medium leading-relaxed min-h-[120px]">"Mari bantu donasi renovasi atap masjid, target terkumpul: Rp 12.500.000 / 25.000.000" | "Penerimaan Zakat Fitrah dimulai..."</textarea>
                </div>
                
                <!-- Area Scroll Speed -->
                <div class="shrink-0 pt-2">
                    <div class="flex justify-between text-[11px] font-bold text-gray-600 mb-2">
                        <span>Scroll Speed</span>
                        <span id="scroll-speed-label">Normal (5)</span>
                    </div>
                    <input type="range" id="scroll-speed-input" min="1" max="10" value="5" class="w-full accent-[#063f2b] cursor-pointer">
                    <div class="flex justify-between text-[10px] text-gray-400 mt-1.5">
                        <span>Slow</span>
                        <span>Fast</span>
                    </div>
                </div>
            </div>

            <!-- Right: Prayer & Iqamah Timing Config -->
            <div class="bg-gray-50/70 border border-gray-100 rounded-2xl p-5 space-y-4">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold text-gray-900 text-xs">Prayer & Iqamah Timing</h3>
                    <span class="text-[11px] text-gray-500">Auto-Offset: <strong class="text-[#063f2b]">+2 Min (Kemenag)</strong></span>
                </div>

                <div class="space-y-2.5">
                    <!-- 01 Subuh -->
                    <div class="flex items-center justify-between bg-white border border-gray-100 px-4 py-2.5 rounded-xl">
                        <div class="flex items-center space-x-3">
                            <span class="text-xs font-bold text-gray-400">01</span>
                            <span class="text-xs font-bold text-gray-800">Subuh</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-1 text-xs">
                                <span class="text-[10px] text-gray-400">Iqamah:</span>
                                <input type="number" value="10" class="w-12 bg-gray-50 border border-gray-200 rounded-lg py-1 text-center font-bold text-gray-800 focus:border-[#063f2b] outline-none">
                                <span class="text-[10px] text-gray-400">Min</span>
                            </div>
                            <!-- Toggle Aktif (Hijau) -->
                            <div class="w-8 h-4 bg-green-600 rounded-full relative cursor-pointer shadow-inner">
                                <div class="w-3.5 h-3.5 bg-white rounded-full absolute right-0.5 top-0.5 shadow-sm"></div>
                            </div>
                        </div>
                    </div>

                    <!-- 02 Dzuhur -->
                    <div class="flex items-center justify-between bg-white border border-gray-100 px-4 py-2.5 rounded-xl">
                        <div class="flex items-center space-x-3">
                            <span class="text-xs font-bold text-gray-400">02</span>
                            <span class="text-xs font-bold text-gray-800">Dzuhur</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-1 text-xs">
                                <span class="text-[10px] text-gray-400">Iqamah:</span>
                                <input type="number" value="8" class="w-12 bg-gray-50 border border-gray-200 rounded-lg py-1 text-center font-bold text-gray-800 focus:border-[#063f2b] outline-none">
                                <span class="text-[10px] text-gray-400">Min</span>
                            </div>
                            <!-- Toggle Aktif (Hijau) -->
                            <div class="w-8 h-4 bg-green-600 rounded-full relative cursor-pointer shadow-inner">
                                <div class="w-3.5 h-3.5 bg-white rounded-full absolute right-0.5 top-0.5 shadow-sm"></div>
                            </div>
                        </div>
                    </div>

                    <!-- 03 Ashar -->
                    <div class="flex items-center justify-between bg-white border border-gray-100 px-4 py-2.5 rounded-xl">
                        <div class="flex items-center space-x-3">
                            <span class="text-xs font-bold text-gray-400">03</span>
                            <span class="text-xs font-bold text-gray-800">Ashar</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-1 text-xs">
                                <span class="text-[10px] text-gray-400">Iqamah:</span>
                                <input type="number" value="8" class="w-12 bg-gray-50 border border-gray-200 rounded-lg py-1 text-center font-bold text-gray-800 focus:border-[#063f2b] outline-none">
                                <span class="text-[10px] text-gray-400">Min</span>
                            </div>
                            <!-- Toggle Aktif (Hijau) -->
                            <div class="w-8 h-4 bg-green-600 rounded-full relative cursor-pointer shadow-inner">
                                <div class="w-3.5 h-3.5 bg-white rounded-full absolute right-0.5 top-0.5 shadow-sm"></div>
                            </div>
                        </div>
                    </div>

                    <!-- 04 Maghrib -->
                    <div class="flex items-center justify-between bg-white border border-gray-100 px-4 py-2.5 rounded-xl">
                        <div class="flex items-center space-x-3">
                            <span class="text-xs font-bold text-gray-400">04</span>
                            <span class="text-xs font-bold text-gray-800">Maghrib</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-1 text-xs">
                                <span class="text-[10px] text-gray-400">Iqamah:</span>
                                <input type="number" value="5" class="w-12 bg-gray-50 border border-gray-200 rounded-lg py-1 text-center font-bold text-gray-800 focus:border-[#063f2b] outline-none">
                                <span class="text-[10px] text-gray-400">Min</span>
                            </div>
                            <!-- Toggle Aktif (Hijau) -->
                            <div class="w-8 h-4 bg-green-600 rounded-full relative cursor-pointer shadow-inner">
                                <div class="w-3.5 h-3.5 bg-white rounded-full absolute right-0.5 top-0.5 shadow-sm"></div>
                            </div>
                        </div>
                    </div>

                    <!-- 05 Isya -->
                    <div class="flex items-center justify-between bg-white border border-gray-100 px-4 py-2.5 rounded-xl">
                        <div class="flex items-center space-x-3">
                            <span class="text-xs font-bold text-gray-400">05</span>
                            <span class="text-xs font-bold text-gray-800">Isya</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-1 text-xs">
                                <span class="text-[10px] text-gray-400">Iqamah:</span>
                                <input type="number" value="10" class="w-12 bg-gray-50 border border-gray-200 rounded-lg py-1 text-center font-bold text-gray-800 focus:border-[#063f2b] outline-none">
                                <span class="text-[10px] text-gray-400">Min</span>
                            </div>
                            <!-- Toggle Aktif (Hijau) -->
                            <div class="w-8 h-4 bg-green-600 rounded-full relative cursor-pointer shadow-inner">
                                <div class="w-3.5 h-3.5 bg-white rounded-full absolute right-0.5 top-0.5 shadow-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Apply (Pastikan ID ini tetap ada untuk menjalankan script loading sebelumnya) -->
                <button id="btn-apply-timing" class="w-full bg-[#063f2b] hover:bg-[#042e1f] text-white py-2.5 rounded-xl text-xs font-bold transition shadow-md mt-2">
                    Apply All Timing Changes
                </button>
            </div>

        </div>

    </div>

</div>
        <!-- Modal Upload Media (Drag & Drop) -->
        <div id="upload-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
            <div id="upload-modal-content" class="bg-white rounded-2xl w-full max-w-lg p-6 shadow-2xl transform scale-95 transition-transform duration-300">
                
                <!-- Header Modal -->
                <div class="flex justify-between items-center mb-5">
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Upload New Media</h3>
                        <p class="text-xs text-gray-400">Tambahkan poster atau video ke dalam playlist.</p>
                    </div>
                    <button id="close-upload-modal" class="text-gray-400 hover:text-red-500 bg-gray-50 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <!-- Drag & Drop Area -->
                <div id="drop-zone" class="border-2 border-dashed border-gray-300 rounded-2xl p-8 flex flex-col items-center justify-center bg-gray-50 hover:bg-gray-100 hover:border-[#063f2b] transition-all duration-300 cursor-pointer relative group">
                    
                    <input type="file" id="file-input" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/jpeg, image/png, video/mp4">
                    
                    <div class="w-14 h-14 bg-white shadow-sm border border-gray-100 rounded-full flex items-center justify-center text-amber-500 mb-3 pointer-events-none group-hover:scale-110 group-hover:text-[#063f2b] transition-transform">
                        <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                    </div>
                    <p class="font-bold text-gray-800 text-sm pointer-events-none mb-1">Drag & Drop file Anda di sini</p>
                    <p class="text-xs text-gray-400 pointer-events-none mb-4">atau klik area ini untuk mencari file</p>
                    
                    <div class="flex space-x-2 text-[10px] font-bold text-gray-400 pointer-events-none">
                        <span class="bg-white border border-gray-200 px-2 py-1 rounded-md shadow-sm">JPG</span>
                        <span class="bg-white border border-gray-200 px-2 py-1 rounded-md shadow-sm">PNG</span>
                        <span class="bg-white border border-gray-200 px-2 py-1 rounded-md shadow-sm">MP4</span>
                    </div>
                </div>

                <!-- Preview Area & Input Judul (Muncul setelah file dipilih) -->
                <div id="upload-preview" class="hidden mt-4 bg-white border border-gray-200 rounded-xl p-4 shadow-sm flex flex-col space-y-4 transition-all">
                    
                    <!-- File Terpilih -->
                    <div class="flex items-center space-x-3 overflow-hidden bg-green-50/50 p-2.5 rounded-lg border border-green-100">
                        <i class="fa-solid fa-file-circle-check text-green-600 text-lg shrink-0 pl-1"></i>
                        <div class="overflow-hidden">
                            <p class="text-[9px] font-bold text-green-700 uppercase tracking-wider mb-0.5">File Terpilih</p>
                            <span id="file-name" class="text-xs font-bold text-gray-800 truncate block">filename.jpg</span>
                        </div>
                    </div>

                    <!-- Kolom Input Judul -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Judul Tampilan <span class="text-red-500">*</span></label>
                        <input type="text" id="media-title-input" placeholder="Contoh: Poster Kajian Jumat Malam" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-2.5 text-xs text-gray-800 focus:border-[#063f2b] focus:bg-white outline-none transition font-semibold placeholder-gray-300">
                    </div>

                    <button id="btn-upload-submit" class="w-full bg-[#063f2b] hover:bg-[#042e1f] text-white px-5 py-2.5 rounded-lg text-xs font-bold transition shadow-sm flex justify-center items-center">
                        Upload ke Playlist
                    </button>
                </div>
                
            </div>
        </div>

        <!-- Modal Edit Media -->
        <div id="edit-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
            <div id="edit-modal-content" class="bg-white rounded-2xl w-full max-w-lg p-6 shadow-2xl transform scale-95 transition-transform duration-300">
                
                <!-- Header Modal -->
                <div class="flex justify-between items-center mb-5">
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Edit Media</h3>
                        <p class="text-xs text-gray-400">Ubah judul atau ganti file medianya.</p>
                    </div>
                    <button id="close-edit-modal" class="text-gray-400 hover:text-red-500 bg-gray-50 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <div class="space-y-5">
                    <!-- Kolom Input Judul Baru -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Judul Tampilan <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-media-title" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-2.5 text-xs text-gray-800 focus:border-[#063f2b] focus:bg-white outline-none transition font-semibold">
                    </div>
                    <!-- Kolom Input Durasi Tayang (Dinamis) -->
                    <div class="mb-4">
                        <label id="duration-label" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Durasi Tayang (Detik)</label>
                        
                        <!-- Panel Khusus Video (Akan disembunyikan otomatis jika file adalah gambar) -->
                        <div id="video-options-container" class="hidden mb-3 p-3 bg-blue-50/40 border border-blue-100 rounded-xl space-y-3">
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-1.5 cursor-pointer">
                                    <input type="radio" name="duration_type" id="radio-custom" value="custom" class="w-3.5 h-3.5 text-[#063f2b] focus:ring-[#063f2b]" checked>
                                    <span class="text-xs font-bold text-gray-700">Atur Waktu (Potong)</span>
                                </label>
                                <label class="flex items-center space-x-1.5 cursor-pointer">
                                    <input type="radio" name="duration_type" id="radio-full" value="full" class="w-3.5 h-3.5 text-[#063f2b] focus:ring-[#063f2b]">
                                    <span class="text-xs font-bold text-gray-700">Full Video</span>
                                </label>
                            </div>
                            
                            <!-- Input Mulai Detik (Hanya aktif jika pilih Atur Waktu) -->
                            <div class="flex items-center justify-between border-t border-blue-100/50 pt-2">
                                <span class="text-[10px] text-gray-500 font-semibold">Video dimulai dari detik ke:</span>
                                <input type="number" id="edit-video-start" class="w-16 bg-white border border-gray-200 rounded-md py-1 px-2 text-xs text-center focus:border-[#063f2b] outline-none" value="0" min="0">
                            </div>
                        </div>

                        <input type="number" id="edit-media-duration" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-2.5 text-xs text-gray-800 focus:ring-2 focus:ring-[#063f2b]/20 focus:border-[#063f2b] outline-none transition-all disabled:opacity-50 disabled:cursor-not-allowed" placeholder="Berapa detik tayang? (Contoh: 15)" min="1">
                    </div>
                    <!-- Area Ganti File (Opsional) -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Ganti File (Opsional)</label>
                        <div class="border border-dashed border-gray-300 rounded-xl p-5 flex items-center justify-center bg-gray-50 hover:bg-gray-100 hover:border-[#063f2b] transition-all cursor-pointer relative group">
                            <!-- Input File Tersembunyi (Menutupi seluruh area kotak) -->
                            <input type="file" id="edit-file-input" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/jpeg, image/png, video/mp4">
                            
                            <div class="flex flex-col items-center pointer-events-none text-center">
                                <i class="fa-solid fa-file-arrow-up text-2xl text-gray-300 group-hover:text-[#063f2b] mb-2 transition-colors"></i>
                                <span id="edit-file-name" class="text-xs font-semibold text-gray-600">Klik atau Drag & Drop file baru di sini</span>
                                <span class="text-[10px] text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah file</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <button id="btn-edit-submit" class="w-full bg-[#063f2b] hover:bg-[#042e1f] text-white px-5 py-2.5 rounded-lg text-xs font-bold transition shadow-sm flex justify-center items-center mt-2">
                        Simpan Perubahan
                    </button>
                </div>
                
            </div>
        </div>

        <!-- Modal Konfirmasi Hapus -->
        <div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
            <div id="delete-modal-content" class="bg-white rounded-2xl w-full max-w-sm p-6 shadow-2xl transform scale-95 transition-transform duration-300 text-center">
                
                <!-- Ikon Peringatan (Diperhalus proporsinya) -->
                <div class="w-14 h-14 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                </div>
                
                <h3 class="font-bold text-gray-900 text-lg mb-2">Hapus Media?</h3>
                
                <!-- Teks dirapikan menjadi inline agar mengalir alami (tanpa <br>) -->
                <p class="text-sm text-gray-500 mb-6 leading-relaxed px-2">
                    Apakah Anda yakin ingin menghapus <span id="delete-item-name" class="font-bold text-gray-800">"Nama File"</span> dari playlist? Tindakan ini tidak dapat dibatalkan.
                </p>
                
                <!-- Tombol Aksi (Dibuat lebih modern dengan rounded-xl dan text-sm) -->
                <div class="flex space-x-3">
                    <button id="btn-cancel-delete" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2.5 rounded-xl text-sm font-semibold transition-colors">
                        Batal
                    </button>
                    <button id="btn-confirm-delete" class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2.5 rounded-xl text-sm font-semibold transition-colors shadow-sm flex justify-center items-center">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
<!-- KUMPULAN SCRIPT DIGITAL SIGNAGE -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ==========================================
        // 1. FUNGSI SINKRONISASI STATUS TV
        // ==========================================
        async function syncPreviewWithTV() {
            const syncBadge = document.getElementById('sync-status-badge'); 
            
            if (!syncBadge) return; 

            try {
                const response = await fetch('/api/signage/status'); 
                
                if (response.ok) {
                    syncBadge.className = "bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex items-center";
                    syncBadge.innerHTML = '<span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span> Connected / Sync OK';
                } else {
                    throw new Error('Koneksi TV Terputus');
                }
            } catch (error) {
                syncBadge.className = "bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold flex items-center";
                syncBadge.innerHTML = '<span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span> TV Disconnected';
            }
        }
        setInterval(syncPreviewWithTV, 5000);


        // ==========================================
        // 2. FUNGSI LOADING TOMBOL APPLY TIMING
        // ==========================================
        const btnApply = document.getElementById('btn-apply-timing');
        
        if (btnApply) {
            btnApply.addEventListener('click', function() {
                const originalText = this.innerHTML;
                
                this.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Menyimpan Pengaturan...';
                this.disabled = true;
                this.classList.add('opacity-75', 'cursor-not-allowed');

                setTimeout(() => {
                    if (typeof showToast === "function") showToast(); 
                    
                    this.innerHTML = originalText;
                    this.disabled = false;
                    this.classList.remove('opacity-75', 'cursor-not-allowed');
                }, 1500);
            });
        }


        // ==========================================
        // 3. FUNGSI AUTO-UPDATE TICKER (DEBOUNCE)
        // ==========================================
        let typingTimer;
        const doneTypingInterval = 1000; 
        const tickerInput = document.getElementById('ticker-announcement-input');

        if (tickerInput) {
            tickerInput.addEventListener('input', function () {
                clearTimeout(typingTimer);
                
                typingTimer = setTimeout(function() {
                    const newText = tickerInput.value;
                    console.log("Mengirim teks ini ke TV: ", newText);
                    
                    if (typeof showToast === "function") showToast(); 
                }, doneTypingInterval);
            });
        }

    });

    // Animasi Loading Tombol Refresh
    const btnRefresh = document.getElementById('btn-refresh-screen');
    const iconRefresh = document.getElementById('icon-refresh');

    if (btnRefresh && iconRefresh) {
        btnRefresh.addEventListener('click', function() {
            iconRefresh.classList.add('fa-spin');
            btnRefresh.disabled = true;
            btnRefresh.classList.add('opacity-75', 'cursor-not-allowed');

            setTimeout(() => {
                iconRefresh.classList.remove('fa-spin');
                btnRefresh.disabled = false;
                btnRefresh.classList.remove('opacity-75', 'cursor-not-allowed');
                
                if (typeof showToast === "function") showToast('Layar TV berhasil di-refresh!');
            }, 1500);
        });
    }

    // Interaksi Visual Toggle Mode Khutbah
    const toggleContainer = document.getElementById('toggle-khutbah-container');
    const toggleBg = document.getElementById('toggle-bg');
    const toggleCircle = document.getElementById('toggle-circle');
    let isKhutbahMode = false; 

    if (toggleContainer) {
        toggleContainer.addEventListener('click', function() {
            isKhutbahMode = !isKhutbahMode; 
            
            if (isKhutbahMode) {
                toggleBg.classList.replace('bg-gray-300', 'bg-[#063f2b]');
                toggleCircle.classList.replace('translate-x-0', 'translate-x-5');
                
                if (typeof showToast === "function") showToast('Mode Khutbah aktif. Audio TV disenyapkan.');
            } else {
                toggleBg.classList.replace('bg-[#063f2b]', 'bg-gray-300');
                toggleCircle.classList.replace('translate-x-5', 'translate-x-0');
                
                if (typeof showToast === "function") showToast('Mode Khutbah dimatikan. Audio TV kembali normal.');
            }
        });
    }

    // ==========================================
    // A. LOGIKA POP-UP & DRAG-AND-DROP UPLOAD
    // ==========================================
    const uploadBox = document.getElementById('upload-media-box');
    const uploadModal = document.getElementById('upload-modal');
    const modalContent = document.getElementById('upload-modal-content');
    const closeUploadModal = document.getElementById('close-upload-modal');
    
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const uploadPreview = document.getElementById('upload-preview');
    const fileNameDisplay = document.getElementById('file-name');
    const mediaTitleInput = document.getElementById('media-title-input');
    const btnUploadSubmit = document.getElementById('btn-upload-submit');

    let currentUploadedFile = null; 

    if (uploadBox) {
        uploadBox.addEventListener('click', function() {
            uploadModal.classList.remove('hidden');
            setTimeout(() => {
                uploadModal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
            }, 10);
            
            uploadPreview.classList.add('hidden');
            dropZone.classList.remove('border-green-500', 'bg-green-50');
            dropZone.style.display = 'flex';
            fileInput.value = ''; 
            mediaTitleInput.value = ''; 
            currentUploadedFile = null; 
        });
    }

    function closeModal() {
        uploadModal.classList.add('opacity-0');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            uploadModal.classList.add('hidden');
        }, 300);
    }

    if(closeUploadModal) closeUploadModal.addEventListener('click', closeModal);
    if(uploadModal) uploadModal.addEventListener('click', function(e) {
        if (e.target === uploadModal) closeModal();
    });

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        if(dropZone) dropZone.addEventListener(eventName, preventDefaults, false);
    });
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        if(dropZone) dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('border-green-500', 'bg-green-50');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        if(dropZone) dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('border-green-500', 'bg-green-50');
        }, false);
    });

    if(dropZone) {
        dropZone.addEventListener('drop', function(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }, false);
    }

    if(fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files.length) handleFiles(this.files);
        });
    }

    function handleFiles(files) {
        if (files.length > 0) {
            currentUploadedFile = files[0]; 
            fileNameDisplay.textContent = currentUploadedFile.name;
            
            const fileNameWithoutExtension = currentUploadedFile.name.replace(/\.[^/.]+$/, "");
            mediaTitleInput.value = fileNameWithoutExtension;
            
            dropZone.style.display = 'none';
            uploadPreview.classList.remove('hidden');
        }
    }

    if(btnUploadSubmit) {
        btnUploadSubmit.addEventListener('click', function() {
            if (mediaTitleInput.value.trim() === '') {
                alert('Judul tampilan tidak boleh kosong!');
                mediaTitleInput.focus();
                return;
            }

            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Mengunggah...';
            this.disabled = true;

            setTimeout(() => {
                const newTitle = mediaTitleInput.value;
                let previewElement = '';
                const isVideo = currentUploadedFile && currentUploadedFile.type.startsWith('video/');

                if (isVideo) {
                    previewElement = `
                    <div class="w-16 h-10 bg-gray-900 rounded-lg overflow-hidden shrink-0 relative flex items-center justify-center text-white shadow-inner">
                        <i class="fa-solid fa-play text-xs text-amber-400"></i>
                        <div class="temp-badge absolute inset-0 flex items-center justify-center bg-black/70 transition-opacity duration-500">
                            <span class="text-[9px] font-bold text-white tracking-wider">NEW</span>
                        </div>
                    </div>`;
                } else {
                    const localImageUrl = currentUploadedFile ? URL.createObjectURL(currentUploadedFile) : '';
                    previewElement = `
                    <div class="w-16 h-10 bg-gray-200 rounded-lg overflow-hidden shrink-0 relative bg-cover bg-center shadow-inner" style="background-image: url('${localImageUrl}')">
                        <div class="temp-badge absolute inset-0 flex items-center justify-center bg-black/50 transition-opacity duration-500">
                            <span class="text-[9px] font-bold text-white tracking-wider">NEW</span>
                        </div>
                    </div>`;
                }
                
                const badgeStyle = isVideo ? 'bg-green-50 border-green-100' : 'bg-white border-gray-200';
                const labelText = isVideo ? 'Mode:' : 'Duration:';
                const labelColor = isVideo ? 'text-green-600/70' : 'text-gray-400';
                const valueText = isVideo ? 'FULL VIDEO' : '10s';
                const valueColor = isVideo ? 'text-green-700' : 'text-gray-800';

                const newItemHTML = `
                <div class="playlist-item border border-green-200 rounded-xl p-3 flex items-center justify-between bg-green-50/30 hover:border-[#063f2b]/30 hover:shadow-sm transition-all duration-500 opacity-0 transform -translate-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-grip-vertical text-gray-300 cursor-grab hover:text-gray-500 transition"></i>
                        ${previewElement}
                        <div>
                            <h5 class="text-xs font-bold text-gray-800 item-title">${newTitle}</h5>
                            <p class="text-[10px] text-green-600 font-bold mt-0.5">Uploaded just now</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-1.5 ${badgeStyle} px-2.5 py-1 rounded-lg text-xs shadow-sm">
                            <span class="${labelColor} text-[10px]">${labelText}</span>
                            <span class="font-bold ${valueColor}">${valueText}</span>
                        </div>
                        <button class="btn-edit-media text-gray-400 hover:text-blue-600 p-1.5 transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn-delete-media text-gray-400 hover:text-red-500 p-1.5 transition"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </div>
                `;

                const playlistContainer = document.querySelector('.lg\\:col-span-2.space-y-3');
                const headerElement = playlistContainer.querySelector('.flex.justify-between');
                headerElement.insertAdjacentHTML('afterend', newItemHTML);

                const playlistCount = document.getElementById('playlist-count');
                const remainingItems = document.querySelectorAll('.playlist-item').length;
                if (playlistCount) playlistCount.innerText = `(${remainingItems} items)`;

                setTimeout(() => {
                    const newlyAdded = playlistContainer.querySelectorAll('.playlist-item')[0];
                    newlyAdded.classList.remove('opacity-0', '-translate-y-4');
                    
                    setTimeout(() => {
                        const badge = newlyAdded.querySelector('.temp-badge');
                        if (badge) {
                            badge.classList.add('opacity-0'); 
                            setTimeout(() => badge.remove(), 500); 
                        }
                    }, 2000);
                }, 50);

                if (typeof showToast === "function") showToast(`Media "${newTitle}" berhasil ditambahkan!`);
                
                this.innerHTML = originalText;
                this.disabled = false;
                closeModal();
            }, 1500);
        });
    }


    // ==========================================
    // B. INTERAKSI DELETE & POP-UP EDIT MEDIA
    // ==========================================
    const tabMediaContainer = document.getElementById('tab-media'); 
    const playlistCount = document.getElementById('playlist-count');

    const editModal = document.getElementById('edit-modal');
    const editModalContent = document.getElementById('edit-modal-content');
    const closeEditModalBtn = document.getElementById('close-edit-modal');
    const editTitleInput = document.getElementById('edit-media-title');
    const editDurationInput = document.getElementById('edit-media-duration');
    const videoOptionsContainer = document.getElementById('video-options-container');
    const durationLabel = document.getElementById('duration-label');
    const radioCustom = document.getElementById('radio-custom');
    const radioFull = document.getElementById('radio-full');
    const editVideoStart = document.getElementById('edit-video-start');
    const editFileInput = document.getElementById('edit-file-input');
    const editFileNameDisplay = document.getElementById('edit-file-name');
    const btnEditSubmit = document.getElementById('btn-edit-submit');
    let currentItemToEdit = null; 

    if (radioCustom && radioFull && editDurationInput) {
        radioCustom.addEventListener('change', () => { 
            editDurationInput.disabled = false; 
            if(editVideoStart) editVideoStart.disabled = false;
        });
        radioFull.addEventListener('change', () => { 
            editDurationInput.disabled = true; 
            editDurationInput.value = ''; 
            if(editVideoStart) editVideoStart.disabled = true;
        });
    }

    const deleteModal = document.getElementById('delete-modal');
    const deleteModalContent = document.getElementById('delete-modal-content');
    const deleteItemNameDisplay = document.getElementById('delete-item-name');
    const btnCancelDelete = document.getElementById('btn-cancel-delete');
    const btnConfirmDelete = document.getElementById('btn-confirm-delete');
    let itemToDelete = null;

    if (tabMediaContainer) {
        tabMediaContainer.addEventListener('click', function(e) {
            
            // Tombol Delete
            const deleteBtn = e.target.closest('.btn-delete-media');
            if (deleteBtn) {
                itemToDelete = deleteBtn.closest('.playlist-item');
                const title = itemToDelete.querySelector('.item-title').innerText;
                deleteItemNameDisplay.innerText = `"${title}"`;
                
                deleteModal.classList.remove('hidden');
                setTimeout(() => {
                    deleteModal.classList.remove('opacity-0');
                    deleteModalContent.classList.remove('scale-95');
                }, 10);
            }

            // Tombol Edit
            const editBtn = e.target.closest('.btn-edit-media');
            if (editBtn) {
                currentItemToEdit = editBtn.closest('.playlist-item');
                const currentTitle = currentItemToEdit.querySelector('.item-title').innerText;
                
                // Deteksi cerdas apakah item ini video (berdasarkan ikon play di thumbnail)
                const isVideo = currentItemToEdit.querySelector('.fa-play') !== null;

                editTitleInput.value = currentTitle;
                
                if (isVideo) {
                    videoOptionsContainer.classList.remove('hidden');
                    durationLabel.innerText = 'Berapa Detik Video Ditayangkan?';
                    
                    const durationSpan = Array.from(currentItemToEdit.querySelectorAll('span')).find(s => s.innerText.match(/^(\d+s|Full\s*Video|Full)$/i));
                    const currentDuration = durationSpan ? durationSpan.innerText : 'Full';

                    if (currentDuration.toLowerCase().includes('full')) {
                        radioFull.checked = true;
                        editDurationInput.disabled = true;
                        editDurationInput.value = '';
                        if(editVideoStart) editVideoStart.disabled = true;
                    } else {
                        radioCustom.checked = true;
                        editDurationInput.disabled = false;
                        editDurationInput.value = currentDuration.replace('s', '');
                        if(editVideoStart) editVideoStart.disabled = false;
                    }
                } else {
                    videoOptionsContainer.classList.add('hidden');
                    durationLabel.innerText = 'Durasi Tayang Gambar (Detik)';
                    
                    const durationSpan = Array.from(currentItemToEdit.querySelectorAll('span')).find(s => s.innerText.match(/^\d+s$/));
                    editDurationInput.disabled = false;
                    editDurationInput.value = durationSpan ? durationSpan.innerText.replace('s', '') : '10';
                }

                editFileInput.value = ''; 
                editFileNameDisplay.innerText = 'Klik atau Drag & Drop file baru di sini';
                editFileNameDisplay.classList.remove('text-green-600', 'font-bold');
                
                editModal.classList.remove('hidden');
                setTimeout(() => {
                    editModal.classList.remove('opacity-0');
                    editModalContent.classList.remove('scale-95');
                }, 10);
            }
        });
    }

    function closeDeleteModal() {
        deleteModal.classList.add('opacity-0');
        deleteModalContent.classList.add('scale-95');
        setTimeout(() => {
            deleteModal.classList.add('hidden');
            itemToDelete = null; 
        }, 300);
    }

    if(btnCancelDelete) btnCancelDelete.addEventListener('click', closeDeleteModal);
    if(deleteModal) deleteModal.addEventListener('click', e => { if (e.target === deleteModal) closeDeleteModal() });

    if(btnConfirmDelete) {
        btnConfirmDelete.addEventListener('click', function() {
            if (itemToDelete) {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Menghapus...';
                this.disabled = true;

                setTimeout(() => {
                    itemToDelete.style.opacity = '0';
                    itemToDelete.style.transform = 'scale(0.95)';
                    const itemToRemove = itemToDelete; 
                    closeDeleteModal(); 
                    
                    setTimeout(() => {
                        itemToRemove.remove();
                        const remainingItems = document.querySelectorAll('.playlist-item').length;
                        if (playlistCount) playlistCount.innerText = `(${remainingItems} items)`;
                        if (typeof showToast === "function") showToast('Media berhasil dihapus!');
                    }, 300);

                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 800); 
            }
        });
    }

    function closeEditModal() {
        editModal.classList.add('opacity-0');
        editModalContent.classList.add('scale-95');
        setTimeout(() => editModal.classList.add('hidden'), 300);
    }

    if(closeEditModalBtn) closeEditModalBtn.addEventListener('click', closeEditModal);
    if(editModal) editModal.addEventListener('click', e => { if (e.target === editModal) closeEditModal() });

    if(editFileInput) {
        editFileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                const file = this.files[0];
                editFileNameDisplay.innerText = `File baru siap: ${file.name}`;
                editFileNameDisplay.classList.add('text-green-600', 'font-bold');

                if (file.type.startsWith('video/')) {
                    videoOptionsContainer.classList.remove('hidden');
                    durationLabel.innerText = 'Berapa Detik Video Ditayangkan?';
                    radioFull.checked = true;
                    editDurationInput.disabled = true;
                    editDurationInput.value = '';
                    if(editVideoStart) editVideoStart.disabled = true;
                } else {
                    videoOptionsContainer.classList.add('hidden');
                    durationLabel.innerText = 'Durasi Tayang Gambar (Detik)';
                    editDurationInput.disabled = false;
                    editDurationInput.value = '10';
                }
            }
        });
    }

    // Proses Simpan Edit Media
    if(btnEditSubmit) {
        btnEditSubmit.addEventListener('click', function() {
            if (editTitleInput.value.trim() === '') {
                alert('Judul tampilan tidak boleh kosong!');
                editTitleInput.focus();
                return;
            }

            const isVideoMode = !videoOptionsContainer.classList.contains('hidden');
            const isFullVideo = isVideoMode && radioFull.checked;

            if (!isFullVideo && (editDurationInput.value.trim() === '' || editDurationInput.value < 1)) {
                alert('Masukkan durasi tayang yang valid (minimal 1 detik)!');
                editDurationInput.focus();
                return;
            }

            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Menyimpan...';
            this.disabled = true;

            setTimeout(() => {
                // Gunakan try-catch agar jika ada error kecil, tombol tidak akan nyangkut
                try {
                    if (currentItemToEdit) {
                        // 1. Update Judul
                        currentItemToEdit.querySelector('.item-title').innerText = editTitleInput.value;

                        // 2. Hitung Durasi (Menit/Detik)
                        let newDurationText = 'FULL VIDEO';
                        if (!isFullVideo) {
                            const sec = parseInt(editDurationInput.value);
                            newDurationText = sec >= 60 ? (sec % 60 === 0 ? `${Math.floor(sec/60)}m` : `${Math.floor(sec/60)}m ${sec%60}s`) : `${sec}s`;
                        }

                        // 3. Cari Elemen Teks Durasi di HTML
                        const durationSpan = Array.from(currentItemToEdit.querySelectorAll('span')).find(s => s.innerText.match(/^(\d+s|\d+m|Full|FULL)/i));
                        
                        if (durationSpan) {
                            const labelSpan = durationSpan.previousElementSibling;
                            const badgeContainer = durationSpan.parentElement;

                            if (isFullVideo) {
                                if(labelSpan) labelSpan.innerText = 'Mode:';
                                durationSpan.innerText = 'FULL VIDEO';
                                
                                if(badgeContainer) badgeContainer.className = 'flex items-center space-x-1.5 bg-green-50 border border-green-100 px-2.5 py-1 rounded-lg text-xs shadow-sm';
                                if(labelSpan) labelSpan.className = 'text-green-600/70 text-[10px]';
                                durationSpan.className = 'font-bold text-green-700';
                            } else {
                                if(labelSpan) labelSpan.innerText = 'Duration:';
                                durationSpan.innerText = newDurationText;
                                
                                if(badgeContainer) badgeContainer.className = 'flex items-center space-x-1.5 bg-gray-50 border border-gray-200 px-2.5 py-1 rounded-lg text-xs';
                                if(labelSpan) labelSpan.className = 'text-gray-400 text-[10px]';
                                durationSpan.className = 'font-bold text-gray-800';
                            }
                        }

                        // 4. Update Preview Gambar/Video Baru (Jika pengguna ganti file)
                        if (editFileInput && editFileInput.files.length > 0) {
                            const newFile = editFileInput.files[0];
                            const previewBox = currentItemToEdit.querySelector('.w-16.h-10'); 

                            if (previewBox) {
                                if (newFile.type.startsWith('video/')) {
                                    previewBox.className = 'w-16 h-10 bg-gray-900 rounded-lg overflow-hidden shrink-0 relative flex items-center justify-center text-white shadow-inner';
                                    previewBox.style.backgroundImage = 'none';
                                    previewBox.innerHTML = `<i class="fa-solid fa-play text-xs text-amber-400"></i><div class="temp-badge absolute inset-0 flex items-center justify-center bg-black/70 transition-opacity duration-500"><span class="text-[8px] font-bold text-white tracking-wider">EDITED</span></div>`;
                                } else {
                                    const localImageUrl = URL.createObjectURL(newFile);
                                    previewBox.className = 'w-16 h-10 bg-gray-200 rounded-lg overflow-hidden shrink-0 relative bg-cover bg-center shadow-inner';
                                    previewBox.style.backgroundImage = `url('${localImageUrl}')`;
                                    previewBox.innerHTML = `<div class="temp-badge absolute inset-0 flex items-center justify-center bg-black/50 transition-opacity duration-500"><span class="text-[8px] font-bold text-white tracking-wider">EDITED</span></div>`;
                                }

                                setTimeout(() => {
                                    const badge = previewBox.querySelector('.temp-badge');
                                    if (badge) {
                                        badge.classList.add('opacity-0');
                                        setTimeout(() => badge.remove(), 500); 
                                    }
                                }, 2000);
                            }
                        }
                    }
                    if (typeof showToast === "function") showToast('Perubahan media berhasil disimpan!');
                } catch (err) {
                    console.error("Gagal mengubah tampilan:", err);
                }
                
                // 5. Apapun yang terjadi, tombol pasti kembali normal dan modal tertutup
                this.innerHTML = originalText;
                this.disabled = false;
                closeEditModal();
                
            }, 1200);
        });
    }


    // ==========================================
    // C. LOGIKA DRAG & DROP (SAKLAR PENGAMAN)
    // ==========================================
    const playlistContainer = document.querySelector('.lg\\:col-span-2.space-y-3');
    const btnReorder = document.getElementById('btn-reorder');
    let isReorderMode = false;
    let draggedItem = null;

    if (playlistContainer && btnReorder) {
        btnReorder.addEventListener('click', function() {
            isReorderMode = !isReorderMode; 
            const items = playlistContainer.querySelectorAll('.playlist-item');

            if (isReorderMode) {
                this.innerHTML = '<i class="fa-solid fa-check mr-2"></i> Simpan Urutan';
                this.classList.remove('text-[#063f2b]', 'bg-green-50/50', 'border-green-200', 'hover:bg-green-100', 'hover:text-green-800');
                this.classList.add('text-white', 'bg-[#063f2b]', 'border-[#063f2b]', 'hover:bg-[#042e1f]');
                
                items.forEach(item => {
                    item.setAttribute('draggable', 'true');
                    item.classList.add('cursor-grab', 'border-dashed', 'border-green-400');
                    const gripIcon = item.querySelector('.fa-grip-vertical');
                    if(gripIcon) gripIcon.classList.replace('text-gray-300', 'text-[#063f2b]');
                });
            } else {
                this.innerHTML = '<i class="fa-solid fa-sort mr-2"></i> Reorder All';
                this.classList.add('text-[#063f2b]', 'bg-green-50/50', 'border-green-200', 'hover:bg-green-100', 'hover:text-green-800');
                this.classList.remove('text-white', 'bg-[#063f2b]', 'border-[#063f2b]', 'hover:bg-[#042e1f]');
                
                items.forEach(item => {
                    item.setAttribute('draggable', 'false');
                    item.classList.remove('cursor-grab', 'border-dashed', 'border-green-400');
                    const gripIcon = item.querySelector('.fa-grip-vertical');
                    if(gripIcon) gripIcon.classList.replace('text-[#063f2b]', 'text-gray-300');
                });

                if (typeof showToast === "function") showToast('Urutan baru berhasil dikirim dan disimpan ke layar TV!');
            }
        });

        function handleDragStart(e) {
            if (!isReorderMode) {
                e.preventDefault(); 
                return;
            }
            draggedItem = this;
            setTimeout(() => this.classList.add('opacity-50', 'scale-[0.98]', 'border-2', 'border-[#063f2b]', 'bg-green-50'), 0);
        }

        function handleDragEnd() {
            if (!isReorderMode) return;
            setTimeout(() => {
                this.classList.remove('opacity-50', 'scale-[0.98]', 'border-2', 'border-[#063f2b]', 'bg-green-50');
                draggedItem = null;
            }, 0);
        }

        playlistContainer.addEventListener('dragover', function(e) {
            if (!isReorderMode) return;
            e.preventDefault();
            
            const afterElement = getDragAfterElement(playlistContainer, e.clientY);
            if (draggedItem) {
                if (afterElement == null) {
                    playlistContainer.appendChild(draggedItem);
                } else {
                    playlistContainer.insertBefore(draggedItem, afterElement);
                }
            }
        });

        function getDragAfterElement(container, y) {
            const draggableElements = [...container.querySelectorAll('.playlist-item:not(.opacity-50)')];
            return draggableElements.reduce((closest, child) => {
                const box = child.getBoundingClientRect();
                const offset = y - box.top - box.height / 2;
                if (offset < 0 && offset > closest.offset) {
                    return { offset: offset, element: child };
                } else {
                    return closest;
                }
            }, { offset: Number.NEGATIVE_INFINITY }).element;
        }

        function attachDragEvents(item) {
            item.addEventListener('dragstart', handleDragStart);
            item.addEventListener('dragend', handleDragEnd);
            item.setAttribute('draggable', 'false'); 
        }

        playlistContainer.querySelectorAll('.playlist-item').forEach(attachDragEvents);

        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                mutation.addedNodes.forEach((node) => {
                    if (node.nodeType === 1 && node.classList.contains('playlist-item')) {
                        attachDragEvents(node);
                        
                        if (isReorderMode) {
                            node.setAttribute('draggable', 'true');
                            node.classList.add('cursor-grab', 'border-dashed', 'border-green-400');
                            const gripIcon = node.querySelector('.fa-grip-vertical');
                            if (gripIcon) gripIcon.classList.replace('text-gray-300', 'text-[#063f2b]');
                        }
                    }
                });
            });
        });
        observer.observe(playlistContainer, { childList: true });
    }
    // ==========================================
    // FUNGSI INTERAKSI TOGGLE PENGATURAN SHOLAT
    // ==========================================
    const timingToggles = document.querySelectorAll('.w-8.h-4.rounded-full.relative.cursor-pointer');
    
    timingToggles.forEach(toggle => {
        const innerCircle = toggle.querySelector('div');
        
        // Tambahkan kelas transisi agar efek gesernya mulus
        toggle.classList.add('transition-colors', 'duration-300');
        innerCircle.classList.add('transition-all', 'duration-300');

        toggle.addEventListener('click', function() {
            // Jika sedang aktif (Hijau) -> Matikan (Abu-abu)
            if (this.classList.contains('bg-green-600')) {
                this.classList.replace('bg-green-600', 'bg-gray-300');
                innerCircle.classList.replace('right-0.5', 'left-0.5');
            } 
            // Jika sedang mati (Abu-abu) -> Aktifkan (Hijau)
            else {
                this.classList.replace('bg-gray-300', 'bg-green-600');
                innerCircle.classList.replace('left-0.5', 'right-0.5');
            }
        });
    });
</script>
@endsection