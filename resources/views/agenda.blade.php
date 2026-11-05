@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-10">
    
    <!-- Header Page -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1 tracking-tight">Manajemen Agenda & Kajian Masjid</h1>
            <p class="text-sm text-gray-500">Kelola semua kegiatan ibadah, kajian, dan sosial dalam satu tempat.</p>
        </div>
        
        <div class="flex flex-wrap items-center gap-3">
            <!-- Month Navigation -->
            <div class="flex items-center bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm h-10">
                <button onclick="prevMonth()" class="px-3 text-gray-400 hover:bg-gray-50 hover:text-gray-600 h-full transition">
                    <i class="fa-solid fa-chevron-left text-[11px]"></i>
                </button>
                <!-- Tambahkan ID currentMonthDisplay dan set min-width agar layout tidak goyang saat teks berubah -->
                <div id="currentMonthDisplay" class="px-4 text-xs font-bold text-gray-800 border-x border-gray-200 flex items-center justify-center h-full min-w-[120px]">
                    Maret 2024
                </div>
                <button onclick="nextMonth()" class="px-3 text-gray-400 hover:bg-gray-50 hover:text-gray-600 h-full transition">
                    <i class="fa-solid fa-chevron-right text-[11px]"></i>
                </button>
            </div>
            
            <!-- View Toggle -->
            <div class="flex items-center bg-white border border-gray-200 rounded-lg p-1 shadow-sm h-10">
                <button id="btnCalendar" onclick="switchView('calendar')" class="flex items-center justify-center space-x-2 bg-[#063f2b] text-white px-4 rounded-md h-full transition font-semibold text-xs">
                    <i class="fa-solid fa-calendar-days text-xs"></i>
                    <span>Kalender</span>
                </button>
                <button id="btnDaftar" onclick="switchView('daftar')" class="flex items-center justify-center space-x-2 text-gray-500 hover:bg-gray-50 px-4 rounded-md h-full transition font-semibold text-xs">
                    <i class="fa-solid fa-list text-xs"></i>
                    <span>Daftar</span>
                </button>
            </div>

            <!-- Add Button -->
            <button onclick="openModal()" class="flex items-center justify-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-5 rounded-lg text-sm font-semibold transition-colors shadow-md h-10">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Tambah Agenda Baru</span>
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-lg bg-gray-50 flex items-center justify-center text-[#063f2b] text-xl border border-gray-100">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
            <div>
                <div class="text-gray-500 text-[11px] font-medium mb-0.5">Total Agenda Bulan Ini</div>
                <div class="text-2xl font-bold text-gray-900 leading-none">24 <span class="text-[11px] font-normal text-gray-400 ml-1">Kegiatan</span></div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-lg bg-orange-50 flex items-center justify-center text-[#f59e0b] text-xl border border-orange-100/50">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </div>
            <div>
                <div class="text-gray-500 text-[11px] font-medium mb-0.5">Agenda Mendatang Minggu Ini</div>
                <div class="text-2xl font-bold text-gray-900 leading-none">8 <span class="text-[11px] font-normal text-gray-400 ml-1">Terjadwal</span></div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-500 text-xl border border-blue-100/50">
                <i class="fa-solid fa-microphone"></i>
            </div>
            <div>
                <div class="text-gray-500 text-[11px] font-medium mb-0.5">Pemateri Terjadwal</div>
                <div class="text-2xl font-bold text-gray-900 leading-none">12 <span class="text-[11px] font-normal text-gray-400 ml-1">Ustadz</span></div>
            </div>
        </div>
    </div>

    <!-- Main Content Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- LEFT AREA -->
        <div class="lg:col-span-2 flex flex-col h-full">
            
            <!-- 1. VIEW KALENDER (Default) -->
            <div id="calendarView" class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex flex-col flex-1 min-h-[500px]">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-bold text-gray-900 text-[17px]">Kalender Kegiatan</h2>
                    <div class="flex space-x-4 text-[11px] font-bold text-gray-500">
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-[#10b981] mr-1.5"></span>Kajian</div>
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-[#f59e0b] mr-1.5"></span>Jumat</div>
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-[#3b82f6] mr-1.5"></span>TPA</div>
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-gray-400 mr-1.5"></span>Sosial</div>
                    </div>
                </div>

                <!-- Calendar Grid -->
                <div class="flex-1 flex flex-col mt-2">
                    <div class="grid text-[10px] font-bold text-gray-400 text-center uppercase tracking-widest mb-3" style="grid-template-columns: repeat(7, minmax(0, 1fr));">
                        <div class="py-1">Min</div><div class="py-1">Sen</div><div class="py-1">Sel</div><div class="py-1">Rab</div><div class="py-1 text-[#3b82f6]">Kam</div><div class="py-1">Jum</div><div class="py-1">Sab</div>
                    </div>
                    
                    <div class="grid gap-px bg-gray-100 border border-gray-100 rounded-xl overflow-hidden flex-1" style="grid-template-columns: repeat(7, minmax(0, 1fr));">
                        <div class="bg-white min-h-[85px] p-2 flex flex-col"></div>
                        <div class="bg-white min-h-[85px] p-2 flex flex-col"></div>
                        <div class="bg-white min-h-[85px] p-2 flex flex-col"></div>
                        <div class="bg-white min-h-[85px] p-2 flex flex-col"></div>
                        
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col">
                            <span class="text-[13px] font-bold text-[#3b82f6] mb-1.5">1</span>
                            <div class="w-full h-1 bg-[#3b82f6] rounded-full"></div>
                        </div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col">
                            <span class="text-[13px] font-bold text-gray-700 mb-1.5">2</span>
                            <div class="space-y-1.5">
                                <div class="w-full h-1 bg-[#10b981] rounded-full"></div>
                                <div class="w-full h-1 bg-[#f59e0b] rounded-full"></div>
                            </div>
                        </div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col text-center">
                            <span class="text-[13px] font-semibold text-gray-400 mb-1.5">3</span>
                        </div>

                        <div class="bg-gray-50 min-h-[85px] p-2 flex flex-col border-2 border-gray-300 relative shadow-inner">
                            <div class="flex justify-between items-center mb-1.5">
                                <span class="text-[14px] font-bold text-gray-900 ml-1">4</span>
                                <span class="text-[7px] bg-[#063f2b] text-white px-1.5 py-0.5 rounded font-bold uppercase tracking-wider mr-1">Hari Ini</span>
                            </div>
                            <div class="space-y-1.5 px-1">
                                <div class="w-full h-1 bg-[#10b981] rounded-full"></div>
                                <div class="w-full h-1 bg-[#3b82f6] rounded-full"></div>
                            </div>
                        </div>
                        
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col">
                            <span class="text-[13px] font-bold text-gray-700 mb-1.5">5</span>
                            <div class="w-full h-1 bg-gray-400 rounded-full"></div>
                        </div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col">
                            <span class="text-[13px] font-bold text-gray-700 mb-1.5">6</span>
                            <div class="w-full h-1 bg-[#10b981] rounded-full"></div>
                        </div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-gray-700 mb-1.5">7</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-gray-700 mb-1.5">8</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col">
                            <span class="text-[13px] font-bold text-gray-700 mb-1.5">9</span>
                            <div class="w-full h-1 bg-[#f59e0b] rounded-full"></div>
                        </div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col">
                            <span class="text-[13px] font-bold text-gray-700 mb-1.5">10</span>
                            <div class="space-y-1.5">
                                <div class="w-full h-1 bg-[#10b981] rounded-full"></div>
                                <div class="w-full h-1 bg-[#3b82f6] rounded-full"></div>
                            </div>
                        </div>

                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-gray-700 mb-1.5">11</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-gray-700 mb-1.5">12</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-gray-700 mb-1.5">13</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-gray-700 mb-1.5">14</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-gray-700 mb-1.5">15</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-bold text-[#f59e0b] mb-1.5">16</span></div>
                        <div class="bg-white min-h-[85px] p-2.5 flex flex-col"><span class="text-[13px] font-semibold text-gray-400 mb-1.5 text-center">17</span></div>
                    </div>
                </div>
            </div>

            <!-- 2. VIEW DAFTAR (Muncul saat tombol 'Daftar' diklik) -->
            <div id="listView" class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hidden flex-col flex-1">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h2 class="font-bold text-gray-900 text-[17px]">Daftar Seluruh Agenda & Kegiatan</h2>
                        <p class="text-xs text-gray-400 mt-0.5">Rekapitulasi kegiatan masjid bulan Maret 2024</p>
                    </div>
                    <div class="flex items-center space-x-3 w-full sm:w-auto">
                        <select class="bg-gray-50 border border-gray-200 text-gray-700 text-xs rounded-lg px-3 py-2 outline-none focus:border-[#063f2b]">
                            <option>Semua Kategori</option>
                            <option>Kajian Rutin</option>
                            <option>Pendidikan TPA</option>
                            <option>Sosial</option>
                        </select>
                        <input type="text" placeholder="Cari kegiatan..." class="bg-gray-50 border border-gray-200 text-gray-800 text-xs rounded-lg px-3 py-2 outline-none focus:border-[#063f2b] w-full sm:w-48">
                    </div>
                </div>

                <!-- List Agenda Items -->
                <div class="space-y-3.5 flex-1 overflow-y-auto max-h-[550px] pr-1">
                    
                    <!-- Item 1 -->
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 agenda-item">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-50 text-[#10b981] font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-green-100 min-w-[55px]">
                                <span class="text-[10px] block uppercase text-bulan">Mar</span>
                                <span class="text-base block leading-none text-tanggal">01</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-blue-50 text-blue-600 text-[9px] font-bold px-2 py-0.5 rounded text-kategori">Pendidikan TPA</span>
                                    <span class="text-[11px] text-gray-400 text-waktu">15:45 - 17:15 WIB</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm text-judul">Kelas Tahsin Anak-Anak (Level 1)</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-user-tie mr-1 text-gray-400"></i> <span class="text-narasumber">Ustadz Zulkifli</span> • <span class="text-lokasi">Ruang Perpustakaan</span></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded text-status">Terjadwal</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition btn-edit-agenda"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 agenda-item">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-50 text-[#10b981] font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-green-100 min-w-[55px]">
                                <span class="text-[10px] block uppercase text-bulan">Mar</span>
                                <span class="text-base block leading-none text-tanggal">02</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-green-50 text-[#10b981] text-[9px] font-bold px-2 py-0.5 rounded text-kategori">Kajian Rutin</span>
                                    <span class="text-[11px] text-gray-400 text-waktu">18:30 - 20:00 WIB</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm text-judul">Kajian Fikih Muamalah: Bab Jual Beli</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-user-tie mr-1 text-gray-400"></i> <span class="text-narasumber">Ustadz Dr. Abdul Somad, Lc. MA</span> • <span class="text-lokasi">Ruang Utama</span></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded text-status">Terjadwal</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition btn-edit-agenda"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 agenda-item">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-50 text-[#10b981] font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-green-100 min-w-[55px]">
                                <span class="text-[10px] block uppercase text-bulan">Mar</span>
                                <span class="text-base block leading-none text-tanggal">04</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-amber-50 text-[#f59e0b] text-[9px] font-bold px-2 py-0.5 rounded text-kategori">Jumat</span>
                                    <span class="text-[11px] text-gray-400 text-waktu">11:30 - 13:00 WIB</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm text-judul">Persiapan Khutbah & Salat Jumat</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-user-tie mr-1 text-gray-400"></i> <span class="text-narasumber">KH. Ahmad Dahlan</span> • <span class="text-lokasi">Ruang Utama</span></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded text-status">Terjadwal</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition btn-edit-agenda"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 agenda-item">
                        <div class="flex items-start space-x-4">
                            <div class="bg-gray-100 text-gray-500 font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-gray-200 min-w-[55px]">
                                <span class="text-[10px] block uppercase text-bulan">Mar</span>
                                <span class="text-base block leading-none text-tanggal">09</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-gray-100 text-gray-600 text-[9px] font-bold px-2 py-0.5 rounded text-kategori">Sosial</span>
                                    <span class="text-[11px] text-gray-400 text-waktu">08:00 - 10:00 WIB</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm text-judul">Bersih-bersih Halaman Masjid</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-users mr-1 text-gray-400"></i> <span class="text-narasumber">Tim Kebersihan & Remaja Masjid</span> • <span class="text-lokasi">Halaman</span></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-gray-200 text-gray-600 text-[10px] font-bold px-2.5 py-1 rounded text-status">Selesai</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition btn-edit-agenda"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right: Daftar Agenda & Status -->
        <div class="space-y-6">
            <!-- Sidebar (Dibiarkan tetap sama) -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="font-bold text-gray-900 text-[17px] leading-tight">Agenda Mendatang</h2>
                        <p class="text-[13px] text-gray-500 mt-0.5 font-medium">Senin, 04 Mar</p>
                    </div>
                    <a href="#" class="text-[11px] font-bold text-gray-900 hover:text-[#063f2b] text-right leading-tight">Lihat<br>Semua</a>
                </div>

                <div class="space-y-4">
                    <div class="border border-gray-100 rounded-2xl p-4 hover:shadow-md transition-shadow bg-white relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-[#10b981]"></div>
                        <div class="pl-2">
                            <div class="mb-2.5"><span class="bg-green-50 text-[#10b981] text-[9px] font-bold px-2 py-1 rounded uppercase tracking-wider">Kajian Rutin</span></div>
                            <h3 class="font-bold text-gray-900 text-[14px] mb-2 tracking-tight">Kajian Fikih Muamalah: Bab Jual Beli</h3>
                            <div class="text-[11px] text-gray-500 flex items-center mb-3"><i class="fa-solid fa-user-tie w-4 text-gray-400"></i> Ustadz Dr. Abdul Somad, Lc. MA</div>
                            <div class="flex items-center text-[10px] text-gray-500 space-x-4 mb-4 font-medium">
                                <div class="flex items-center"><i class="fa-regular fa-clock w-4 text-gray-400"></i> 18:30 - 20:00</div>
                                <div class="flex items-center"><i class="fa-solid fa-location-dot w-4 text-gray-400"></i> Ruang Utama</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-100 rounded-2xl p-4 hover:shadow-md transition-shadow bg-white relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-[#3b82f6]"></div>
                        <div class="pl-2">
                            <div class="mb-2.5"><span class="bg-blue-50 text-[#3b82f6] text-[9px] font-bold px-2 py-1 rounded uppercase tracking-wider">Pendidikan TPA</span></div>
                            <h3 class="font-bold text-gray-900 text-[14px] mb-2 tracking-tight">Kelas Tahsin Anak-Anak (Level 1)</h3>
                            <div class="text-[11px] text-gray-500 flex items-center mb-3"><i class="fa-solid fa-user-tie w-4 text-gray-400"></i> Ustadz Zulkifli</div>
                            <div class="flex items-center text-[10px] text-gray-500 space-x-4 mb-4 font-medium">
                                <div class="flex items-center"><i class="fa-regular fa-clock w-4 text-gray-400"></i> 15:45 - 17:15</div>
                                <div class="flex items-center"><i class="fa-solid fa-location-dot w-4 text-gray-400"></i> Ruang Perpustakaan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL TAMBAH AGENDA BARU -->
<!-- ========================================== -->
<div id="agendaModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="bg-white rounded-2xl w-full max-w-[640px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="modalBox">
        <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100">
            <div>
                <h2 class="text-xl font-bold text-gray-900 tracking-tight">Tambah Agenda Baru</h2>
            </div>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 w-8 h-8 rounded-full flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        <!-- (Form Tambah Agenda Dibiarkan Sama) -->
        <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin; scrollbar-color: #cbd5e1 transparent;">
            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Judul Kegiatan</label>
                <input type="text" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Tanggal</label>
                    <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                </div>
                <!-- ... Sisa Form Tambah -->
            </div>
        </div>
        <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
            <button onclick="closeModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
            <button onclick="closeModal()" class="flex items-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">Simpan Agenda</button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT AGENDA (SUDAH DITAMBAHKAN TANGGAL) -->
<!-- ========================================== -->
<div id="editAgendaModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeEditModal()"></div>
    <div class="bg-white rounded-2xl w-full max-w-[640px] shadow-2xl relative z-10 flex flex-col max-h-[90vh] mx-4 transform scale-95 transition-transform duration-300" id="editModalBox">
        
        <div class="px-7 py-5 flex justify-between items-start border-b border-gray-100 bg-blue-50/50 rounded-t-2xl">
            <div>
                <h2 class="text-xl font-bold text-gray-900 tracking-tight">Edit Agenda Kegiatan</h2>
                <p class="text-xs text-gray-500 mt-1">Perbarui detail jadwal, tanggal, atau status kegiatan masjid.</p>
            </div>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin; scrollbar-color: #cbd5e1 transparent;">
            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Judul Kegiatan</label>
                <input type="text" id="edit-agenda-judul" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-800 font-semibold focus:outline-none focus:border-[#063f2b] focus:bg-white transition">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Kategori</label>
                    <div class="relative">
                        <select id="edit-agenda-kategori" class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg pl-4 pr-10 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-pointer">
                            <option value="Kajian Rutin">Kajian Rutin</option>
                            <option value="Tabligh Akbar">Tabligh Akbar</option>
                            <option value="Pendidikan TPA">Pendidikan TPA</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Narasumber / Penceramah</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <i class="fa-solid fa-user-tie text-gray-400 text-[13px]"></i>
                        </div>
                        <input type="text" id="edit-agenda-narasumber" class="w-full bg-gray-50 border border-gray-200 rounded-lg pl-10 pr-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#063f2b] focus:bg-white transition">
                    </div>
                </div>
            </div>

            <!-- Input Tanggal & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Tanggal Kegiatan</label>
                    <input type="date" id="edit-agenda-tanggal" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Status Kegiatan</label>
                    <div class="relative">
                        <select id="edit-agenda-status" class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg pl-4 pr-10 py-2.5 text-[13px] text-gray-700 font-semibold focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-pointer">
                            <option value="Terjadwal">📅 Terjadwal</option>
                            <option value="Selesai">✅ Selesai</option>
                            <option value="Dibatalkan">❌ Dibatalkan</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Jam -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jam Mulai</label>
                    <input type="time" id="edit-agenda-mulai" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jam Selesai</label>
                    <input type="time" id="edit-agenda-selesai" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Lokasi / Ruangan</label>
                <div class="relative">
                    <select id="edit-agenda-lokasi" class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg pl-4 pr-10 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-pointer">
                        <option value="Ruang Utama">Ruang Utama</option>
                        <option value="Lantai 2">Lantai 2</option>
                        <option value="Aula Masjid">Aula Masjid</option>
                        <option value="Halaman">Halaman</option>
                        <option value="Ruang Perpustakaan">Ruang Perpustakaan</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
            <button onclick="closeEditModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
            <button id="btn-simpan-edit-agenda" class="flex items-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">
                <i class="fa-solid fa-check text-sm"></i>
                <span>Simpan Perubahan</span>
            </button>
        </div>
    </div>
</div>

<!-- Script Kontrol Interaktif (Switch View & Modal) -->
<script>
    // Fungsi Switch View (Kalender <-> Daftar)
    function switchView(view) {
        const calendarView = document.getElementById('calendarView');
        const listView = document.getElementById('listView');
        const btnCalendar = document.getElementById('btnCalendar');
        const btnDaftar = document.getElementById('btnDaftar');

        if (view === 'calendar') {
            calendarView.classList.remove('hidden');
            calendarView.classList.add('flex');
            listView.classList.add('hidden');
            listView.classList.remove('flex');

            btnCalendar.className = "flex items-center justify-center space-x-2 bg-[#063f2b] text-white px-4 rounded-md h-full transition font-semibold text-xs";
            btnDaftar.className = "flex items-center justify-center space-x-2 text-gray-500 hover:bg-gray-50 px-4 rounded-md h-full transition font-semibold text-xs";
        } else {
            listView.classList.remove('hidden');
            listView.classList.add('flex');
            calendarView.classList.add('hidden');
            calendarView.classList.remove('flex');

            btnDaftar.className = "flex items-center justify-center space-x-2 bg-[#063f2b] text-white px-4 rounded-md h-full transition font-semibold text-xs";
            btnCalendar.className = "flex items-center justify-center space-x-2 text-gray-500 hover:bg-gray-50 px-4 rounded-md h-full transition font-semibold text-xs";
        }
    }

    // Fungsi Modal Tambah Agenda
    function openModal() {
        const modal = document.getElementById('agendaModal');
        const box = document.getElementById('modalBox');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            box.classList.remove('scale-95');
            box.classList.add('scale-100');
        }, 10);
    }
    function closeModal() {
        const modal = document.getElementById('agendaModal');
        const box = document.getElementById('modalBox');
        modal.classList.add('opacity-0');
        box.classList.remove('scale-100');
        box.classList.add('scale-95');
        setTimeout(() => { modal.classList.add('hidden'); }, 300);
    }

    // Fungsi Modal Edit Agenda
    function openEditModal() {
        const modal = document.getElementById('editAgendaModal');
        const box = document.getElementById('editModalBox');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            box.classList.remove('scale-95');
            box.classList.add('scale-100');
        }, 10);
    }
    function closeEditModal() {
        const modal = document.getElementById('editAgendaModal');
        const box = document.getElementById('editModalBox');
        modal.classList.add('opacity-0');
        box.classList.remove('scale-100');
        box.classList.add('scale-95');
        setTimeout(() => { modal.classList.add('hidden'); }, 300);
    }

    // Logika Edit Agenda (Ambil Data & Simpan)
    document.addEventListener('DOMContentLoaded', function() {
        let currentAgendaRow = null;

        // 1. Saat tombol Edit (Ikon Pensil) ditekan
        const editButtons = document.querySelectorAll('.btn-edit-agenda');
        editButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Cari container item agenda terdekat
                currentAgendaRow = this.closest('.agenda-item');
                
                if (currentAgendaRow) {
                    // Ekstrak data teks dari HTML
                    const judul = currentAgendaRow.querySelector('.text-judul').innerText.trim();
                    const kategori = currentAgendaRow.querySelector('.text-kategori').innerText.trim();
                    const narasumber = currentAgendaRow.querySelector('.text-narasumber').innerText.trim();
                    const lokasi = currentAgendaRow.querySelector('.text-lokasi').innerText.trim();
                    const status = currentAgendaRow.querySelector('.text-status').innerText.trim();
                    
                    // Ekstrak Tanggal & Bulan
                    const tglAngka = currentAgendaRow.querySelector('.text-tanggal').innerText.trim();
                    const blnTeks = currentAgendaRow.querySelector('.text-bulan').innerText.trim().toUpperCase();
                    
                    // Konversi nama bulan ke format angka agar cocok dengan input type="date"
                    const arrBulan = {"JAN":"01","FEB":"02","MAR":"03","APR":"04","MEI":"05","JUN":"06","JUL":"07","AGU":"08","SEP":"09","OKT":"10","NOV":"11","DES":"12"};
                    const blnAngka = arrBulan[blnTeks] || "01";
                    const formatTanggal = `2024-${blnAngka}-${tglAngka.padStart(2, '0')}`; // Asumsi tahun 2024
                    
                    // Pisahkan waktu (Misal: "15:45 - 17:15 WIB")
                    const waktuFull = currentAgendaRow.querySelector('.text-waktu').innerText.trim();
                    let jamMulai = "", jamSelesai = "";
                    if(waktuFull.includes('-')) {
                        const parts = waktuFull.replace('WIB', '').split('-');
                        jamMulai = parts[0].trim();
                        jamSelesai = parts[1].trim();
                    }

                    // Masukkan data ke dalam form Edit
                    document.getElementById('edit-agenda-judul').value = judul;
                    document.getElementById('edit-agenda-narasumber').value = narasumber;
                    document.getElementById('edit-agenda-mulai').value = jamMulai;
                    document.getElementById('edit-agenda-selesai').value = jamSelesai;
                    document.getElementById('edit-agenda-tanggal').value = formatTanggal;
                    
                    // Set Dropdown Kategori, Lokasi, Status
                    document.getElementById('edit-agenda-kategori').value = kategori;
                    document.getElementById('edit-agenda-lokasi').value = lokasi;
                    
                    if (status.includes('Terjadwal')) document.getElementById('edit-agenda-status').value = 'Terjadwal';
                    else if (status.includes('Selesai')) document.getElementById('edit-agenda-status').value = 'Selesai';
                    else document.getElementById('edit-agenda-status').value = 'Dibatalkan';
                }
                
                openEditModal();
            });
        });

        // 2. Saat tombol Simpan ditekan
        const btnSimpan = document.getElementById('btn-simpan-edit-agenda');
        if (btnSimpan) {
            btnSimpan.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentAgendaRow) {
                    // Ambil nilai baru dari form
                    const judulBaru = document.getElementById('edit-agenda-judul').value;
                    const narasumberBaru = document.getElementById('edit-agenda-narasumber').value;
                    const mulaiBaru = document.getElementById('edit-agenda-mulai').value;
                    const selesaiBaru = document.getElementById('edit-agenda-selesai').value;
                    const kategoriBaru = document.getElementById('edit-agenda-kategori').value;
                    const lokasiBaru = document.getElementById('edit-agenda-lokasi').value;
                    const statusBaru = document.getElementById('edit-agenda-status').value;
                    const tanggalBaru = document.getElementById('edit-agenda-tanggal').value;

                    // Perbarui tampilan teks biasa
                    currentAgendaRow.querySelector('.text-judul').innerText = judulBaru;
                    currentAgendaRow.querySelector('.text-narasumber').innerText = narasumberBaru;
                    currentAgendaRow.querySelector('.text-lokasi').innerText = lokasiBaru;
                    currentAgendaRow.querySelector('.text-waktu').innerText = `${mulaiBaru} - ${selesaiBaru} WIB`;
                    currentAgendaRow.querySelector('.text-kategori').innerText = kategoriBaru;
                    
                    // Perbarui Bulan & Tanggal yang ditarik dari format Date
                    if (tanggalBaru) {
                        const tglObj = new Date(tanggalBaru);
                        if (!isNaN(tglObj)) {
                            const namaBulanSingkat = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
                            currentAgendaRow.querySelector('.text-bulan').innerText = namaBulanSingkat[tglObj.getMonth()];
                            currentAgendaRow.querySelector('.text-tanggal').innerText = String(tglObj.getDate()).padStart(2, '0');
                        }
                    }
                    
                    // Update Warna Status Menggunakan Inline Style
                    const statusSpan = currentAgendaRow.querySelector('.text-status');
                    if (statusBaru === 'Terjadwal') {
                        statusSpan.outerHTML = `<span class="bg-green-100 text-[10px] font-bold px-2.5 py-1 rounded text-status" style="color: #10b981;">Terjadwal</span>`;
                    } else if (statusBaru === 'Selesai') {
                        statusSpan.outerHTML = `<span class="bg-gray-200 text-[10px] font-bold px-2.5 py-1 rounded text-status" style="color: #4b5563;">Selesai</span>`;
                    } else if (statusBaru === 'Dibatalkan') {
                        statusSpan.outerHTML = `<span class="bg-red-100 text-[10px] font-bold px-2.5 py-1 rounded text-status" style="color: #dc2626;">Dibatalkan</span>`;
                    }

                    closeEditModal();

                    // Panggil notifikasi
                    if (typeof showToast === "function") {
                        showToast('Agenda berhasil diperbarui.');
                    }
                }
            });
        }
    });

    // --- LOGIKA NAVIGASI BULAN (HEADER) ---
    const namaBulanHeader = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    let currentDateNav = new Date(); // Jika ingin default mulai dari Maret 2024, gunakan: new Date(2024, 2);

    function updateMonthDisplay() {
        const bulan = namaBulanHeader[currentDateNav.getMonth()];
        const tahun = currentDateNav.getFullYear();
        document.getElementById('currentMonthDisplay').innerText = `${bulan} ${tahun}`;
        
        // Opsional: Di sini Anda bisa memanggil fungsi AJAX/fetch untuk memuat data agenda 
        // kalender dari database berdasarkan variabel 'bulan' dan 'tahun' yang baru dipilih.
    }

    function prevMonth() {
        currentDateNav.setMonth(currentDateNav.getMonth() - 1);
        updateMonthDisplay();
    }

    function nextMonth() {
        currentDateNav.setMonth(currentDateNav.getMonth() + 1);
        updateMonthDisplay();
    }

    // Inisialisasi tampilan bulan saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', function() {
        updateMonthDisplay();
    });
</script>
@endsection