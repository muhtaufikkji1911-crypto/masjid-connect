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
                <button class="px-3 text-gray-400 hover:bg-gray-50 hover:text-gray-600 h-full"><i class="fa-solid fa-chevron-left text-[11px]"></i></button>
                <div class="px-4 text-xs font-bold text-gray-800 border-x border-gray-200 flex items-center h-full">Maret 2024</div>
                <button class="px-3 text-gray-400 hover:bg-gray-50 hover:text-gray-600 h-full"><i class="fa-solid fa-chevron-right text-[11px]"></i></button>
            </div>
            
            <!-- View Toggle (Diperbaiki Ikon & Fungsinya) -->
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
        
        <!-- LEFT AREA: TAMPILAN BISA BERUBAH ANTARA KALENDER DAN DAFTAR -->
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
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-50 text-[#10b981] font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-green-100">
                                <span class="text-[10px] block uppercase">Mar</span>
                                <span class="text-base block leading-none">01</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-blue-50 text-blue-600 text-[9px] font-bold px-2 py-0.5 rounded">PENDIDIKAN TPA</span>
                                    <span class="text-[11px] text-gray-400">• 15:45 - 17:15 WIB</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm">Kelas Tahsin Anak-Anak (Level 1)</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-user-tie mr-1 text-gray-400"></i> Ustadz Zulkifli • Ruang Perpustakaan</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded">Terjadwal</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-50 text-[#10b981] font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-green-100">
                                <span class="text-[10px] block uppercase">Mar</span>
                                <span class="text-base block leading-none">02</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-green-50 text-[#10b981] text-[9px] font-bold px-2 py-0.5 rounded">KAJIAN RUTIN</span>
                                    <span class="text-[11px] text-gray-400">• 18:30 - 20:00 WIB</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm">Kajian Fikih Muamalah: Bab Jual Beli</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-user-tie mr-1 text-gray-400"></i> Ustadz Dr. Abdul Somad, Lc. MA • Ruang Utama</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded">Terjadwal</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-50 text-[#10b981] font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-green-100">
                                <span class="text-[10px] block uppercase">Mar</span>
                                <span class="text-base block leading-none">04</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-amber-50 text-[#f59e0b] text-[9px] font-bold px-2 py-0.5 rounded">JUMAT</span>
                                    <span class="text-[11px] text-gray-400">• 11:30 - Selesai</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm">Persiapan Khutbah & Salat Jumat</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-user-tie mr-1 text-gray-400"></i> KH. Ahmad Dahlan • Ruang Utama</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-green-100 text-[#10b981] text-[10px] font-bold px-2.5 py-1 rounded">Terjadwal</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="border border-gray-100 rounded-xl p-4 hover:border-gray-200 transition bg-gray-50/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex items-start space-x-4">
                            <div class="bg-gray-100 text-gray-500 font-bold px-3 py-2 rounded-xl text-center shrink-0 border border-gray-200">
                                <span class="text-[10px] block uppercase">Mar</span>
                                <span class="text-base block leading-none">09</span>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="bg-gray-100 text-gray-600 text-[9px] font-bold px-2 py-0.5 rounded">SOSIAL</span>
                                    <span class="text-[11px] text-gray-400">• 08:00 - 10:00 WIB</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm">Bersih-bersih Halaman Masjid</h4>
                                <p class="text-xs text-gray-500 mt-0.5"><i class="fa-solid fa-users mr-1 text-gray-400"></i> Tim Kebersihan & Remaja Masjid</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                            <span class="bg-gray-200 text-gray-600 text-[10px] font-bold px-2.5 py-1 rounded">Selesai</span>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-white transition"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Right: Daftar Agenda & Status -->
        <div class="space-y-6">
            
            <!-- Agenda List (Sidebar kanan) -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="font-bold text-gray-900 text-[17px] leading-tight">Agenda Mendatang</h2>
                        <p class="text-[13px] text-gray-500 mt-0.5 font-medium">Senin, 04 Mar</p>
                    </div>
                    <a href="#" class="text-[11px] font-bold text-gray-900 hover:text-[#063f2b] text-right leading-tight">Lihat<br>Semua</a>
                </div>

                <div class="space-y-4">
                    <!-- Event 1 -->
                    <div class="border border-gray-100 rounded-2xl p-4 hover:shadow-md transition-shadow bg-white relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-[#10b981]"></div>
                        <div class="pl-2">
                            <div class="mb-2.5">
                                <span class="bg-green-50 text-[#10b981] text-[9px] font-bold px-2 py-1 rounded uppercase tracking-wider">Kajian Rutin</span>
                            </div>
                            <h3 class="font-bold text-gray-900 text-[14px] mb-2 tracking-tight">Kajian Fikih Muamalah: Bab Jual Beli</h3>
                            <div class="text-[11px] text-gray-500 flex items-center mb-3">
                                <i class="fa-solid fa-user-tie w-4 text-gray-400"></i> Ustadz Dr. Abdul Somad, Lc. MA
                            </div>
                            <div class="flex items-center text-[10px] text-gray-500 space-x-4 mb-4 font-medium">
                                <div class="flex items-center"><i class="fa-regular fa-clock w-4 text-gray-400"></i> 18:30 - 20:00</div>
                                <div class="flex items-center"><i class="fa-solid fa-location-dot w-4 text-gray-400"></i> Ruang Utama</div>
                            </div>
                            <div class="flex justify-between items-center pt-3 border-t border-gray-50">
                                <div class="flex items-center space-x-2">
                                    <span class="bg-gray-100 text-gray-600 text-[9px] font-bold px-2 py-0.5 rounded">UMUM</span>
                                    <span class="text-[9px] text-gray-400 font-medium">120 Terdaftar</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-[9px] font-bold text-gray-500 uppercase">TV Signage</span>
                                    <div class="w-8 h-4 bg-[#063f2b] rounded-full relative cursor-pointer shadow-inner border border-[#063f2b]">
                                        <div class="w-3.5 h-3.5 bg-white rounded-full absolute right-0.5 top-[1px] shadow-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event 2 -->
                    <div class="border border-gray-100 rounded-2xl p-4 hover:shadow-md transition-shadow bg-white relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-[#3b82f6]"></div>
                        <div class="pl-2">
                            <div class="mb-2.5">
                                <span class="bg-blue-50 text-[#3b82f6] text-[9px] font-bold px-2 py-1 rounded uppercase tracking-wider">Pendidikan TPA</span>
                            </div>
                            <h3 class="font-bold text-gray-900 text-[14px] mb-2 tracking-tight">Kelas Tahsin Anak-Anak (Level 1)</h3>
                            <div class="text-[11px] text-gray-500 flex items-center mb-3">
                                <i class="fa-solid fa-user-tie w-4 text-gray-400"></i> Ustadz Zulkifli
                            </div>
                            <div class="flex items-center text-[10px] text-gray-500 space-x-4 mb-4 font-medium">
                                <div class="flex items-center"><i class="fa-regular fa-clock w-4 text-gray-400"></i> 15:45 - 17:15</div>
                                <div class="flex items-center"><i class="fa-solid fa-location-dot w-4 text-gray-400"></i> Ruang Perpustakaan</div>
                            </div>
                            <div class="flex justify-between items-center pt-3 border-t border-gray-50">
                                <div class="flex items-center space-x-2">
                                    <span class="bg-blue-50 text-blue-600 text-[9px] font-bold px-2 py-0.5 rounded">ANAK-ANAK</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-[9px] font-bold text-gray-500 uppercase">TV Signage</span>
                                    <div class="w-8 h-4 bg-gray-200 rounded-full relative cursor-pointer shadow-inner border border-gray-200">
                                        <div class="w-3.5 h-3.5 bg-white rounded-full absolute left-0.5 top-[1px] shadow-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Quick Event Button -->
                    <button onclick="openModal()" class="w-full border-2 border-dashed border-gray-200 text-gray-400 hover:border-[#063f2b] hover:text-[#063f2b] hover:bg-green-50 rounded-xl p-3.5 text-xs font-bold transition flex items-center justify-center space-x-2 mt-2">
                        <i class="fa-regular fa-calendar-plus"></i>
                        <span>Klik untuk Menambahkan di Tanggal Ini</span>
                    </button>
                </div>
            </div>

            <!-- Status Pemateri Box -->
            <div class="bg-[#0a3121] rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
                <h3 class="font-bold text-[15px] mb-1 relative z-10">Status Pemateri</h3>
                <p class="text-[11px] text-green-100/60 mb-5 relative z-10">Konfirmasi kehadiran ustadz minggu ini.</p>
                
                <div class="space-y-4 relative z-10 flex flex-col">
                    <div class="flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2.5">
                            <i class="fa-solid fa-circle-check text-[#10b981] text-lg"></i>
                            <span class="text-gray-200 text-[13px]">Terkonfirmasi</span>
                        </div>
                        <span class="font-bold text-lg text-white">10</span>
                    </div>
                    
                    <div class="flex justify-between items-center text-sm mb-1">
                        <div class="flex items-center space-x-2.5">
                            <i class="fa-solid fa-circle-exclamation text-[#f59e0b] text-lg"></i>
                            <span class="text-gray-200 text-[13px]">Menunggu Balasan</span>
                        </div>
                        <span class="font-bold text-lg text-white">2</span>
                    </div>

                    <!-- Action List -->
                    <div class="mt-2 bg-black/20 rounded-xl p-3 border border-white/5 shadow-inner">
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-3 border-b border-white/10 pb-1.5">Perlu Follow Up:</p>
                        
                        <div class="space-y-3 max-h-[140px] overflow-y-auto pr-1" style="scrollbar-width: thin; scrollbar-color: #063f2b transparent;">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-semibold text-white">Ust. Khalid Basalamah</p>
                                    <p class="text-[10px] text-[#f59e0b] mt-0.5">Kajian Subuh (Jumat)</p>
                                </div>
                                <a href="#" class="min-w-[28px] w-7 h-7 bg-[#25D366] hover:bg-[#128C7E] text-white rounded-full flex items-center justify-center transition shadow-md shadow-green-900/50">
                                    <i class="fa-brands fa-whatsapp text-sm ml-[1px]"></i>
                                </a>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-semibold text-white">Ust. Wijayanto</p>
                                    <p class="text-[10px] text-[#f59e0b] mt-0.5">Tabligh Akbar (Ahad)</p>
                                </div>
                                <a href="#" class="min-w-[28px] w-7 h-7 bg-[#25D366] hover:bg-[#128C7E] text-white rounded-full flex items-center justify-center transition shadow-md shadow-green-900/50">
                                    <i class="fa-brands fa-whatsapp text-sm ml-[1px]"></i>
                                </a>
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
                <p class="text-xs text-gray-500 mt-1">Isi detail kegiatan untuk ditambahkan ke kalender masjid.</p>
            </div>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 w-8 h-8 rounded-full flex items-center justify-center transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <div class="p-7 overflow-y-auto space-y-5" style="scrollbar-width: thin; scrollbar-color: #cbd5e1 transparent;">
            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Judul Kegiatan</label>
                <input type="text" placeholder="Contoh: Kajian Fikih Kontemporer" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Kategori</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg pl-4 pr-10 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition cursor-pointer">
                            <option disabled selected>Pilih Kategori</option>
                            <option>Kajian Rutin</option>
                            <option>Tabligh Akbar</option>
                            <option>Pendidikan TPA</option>
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
                        <input type="text" placeholder="Nama Ustadz/Pemateri" class="w-full bg-gray-50 border border-gray-200 rounded-lg pl-10 pr-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Tanggal</label>
                    <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jam Mulai</label>
                    <input type="time" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Jam Selesai</label>
                    <input type="time" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white transition cursor-text">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Lokasi / Ruangan</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-lg pl-4 pr-10 py-2.5 text-[13px] text-gray-700 font-medium focus:outline-none focus:border-[#063f2b] focus:bg-white focus:ring-1 focus:ring-[#063f2b] transition cursor-pointer">
                            <option>Ruang Utama</option>
                            <option>Lantai 2</option>
                            <option>Aula Masjid</option>
                            <option>Halaman</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Target Audience</label>
                    <div class="flex items-center bg-gray-50 border border-gray-200 rounded-lg p-1">
                        <button class="flex-1 text-[12px] font-bold bg-white text-gray-900 shadow-sm rounded-md py-1.5 text-center transition">Umum</button>
                        <button class="flex-1 text-[12px] font-semibold text-gray-500 hover:text-gray-700 py-1.5 text-center transition">Ikhwan</button>
                        <button class="flex-1 text-[12px] font-semibold text-gray-500 hover:text-gray-700 py-1.5 text-center transition">Akhwat</button>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Poster Kegiatan (Opsional)</label>
                <div class="border-2 border-dashed border-gray-200 rounded-xl bg-gray-50/50 hover:bg-gray-50 p-6 flex flex-col items-center justify-center cursor-pointer transition">
                    <div class="w-10 h-10 bg-white shadow-sm border border-gray-100 rounded-full flex items-center justify-center text-blue-400 mb-3">
                        <i class="fa-solid fa-cloud-arrow-up text-lg"></i>
                    </div>
                    <p class="text-[13px] text-gray-800 font-medium mb-1">Tarik poster ke sini atau <span class="text-[#063f2b] underline">cari file</span></p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-wider">Format: JPG, PNG, WEBP (Maks. 2MB)</p>
                </div>
            </div>

            <div class="bg-amber-50/60 border border-amber-100 rounded-xl p-4 flex items-center space-x-4">
                <div class="w-11 h-6 bg-[#0a3121] rounded-full relative cursor-pointer shadow-inner shrink-0">
                    <div class="w-4 h-4 bg-white rounded-full absolute left-[2px] top-[4px] shadow-sm transform translate-x-5 transition-transform"></div>
                </div>
                <div>
                    <h4 class="text-[13px] font-bold text-gray-900 leading-tight">Sinkron ke TV Signage</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Agenda akan otomatis tampil di layar informasi masjid.</p>
                </div>
            </div>
        </div>

        <div class="px-7 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
            <button onclick="closeModal()" class="text-[13px] font-bold text-gray-600 hover:text-gray-900 transition px-4 py-2">Batal</button>
            <button onclick="closeModal()" class="flex items-center space-x-2 bg-[#063f2b] hover:bg-[#042e1f] text-white px-6 py-2.5 rounded-lg text-[13px] font-bold transition shadow-md">
                <i class="fa-regular fa-floppy-disk text-sm"></i>
                <span>Simpan Agenda</span>
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
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
@endsection