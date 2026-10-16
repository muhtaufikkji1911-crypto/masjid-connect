<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Layar TV Masjid</title>
    <!-- Memanggil Tailwind dari konfigurasi Laravel Anda -->
    @vite('resources/css/app.css')
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body style="background-color: #faf5ed;" class="w-screen h-screen overflow-hidden flex flex-col p-6 space-y-5">
    
    <!-- 1. TV Top Header -->
    <div style="background-color: #ffffff;" class="flex justify-between items-center px-8 py-5 rounded-3xl border border-orange-100 shadow-sm shrink-0">
        <div class="flex items-center space-x-4">
            <div style="background-color: #f59e0b; color: #ffffff;" class="w-14 h-14 rounded-2xl flex items-center justify-center font-bold text-2xl shadow-md shrink-0">
                <i class="fa-solid fa-mosque"></i>
            </div>
            <div>
                <h3 class="font-extrabold text-xl text-gray-900 leading-tight">Masjid Al-Ikhlas</h3>
                <p class="text-[12px] text-gray-400 font-bold tracking-wider uppercase mt-1">KEBON JERUK, JAKARTA BARAT</p>
            </div>
        </div>
        <div class="text-center">
            <p style="color: #d97706;" class="text-sm font-black uppercase tracking-wider">12 Sya'ban 1445 H</p>
            <p class="text-xs text-gray-400 font-medium mt-1">Kamis, 22 Februari 2024</p>
        </div>
        <div class="text-right">
            <!-- Waktu yang bisa dibuat berdetak nantinya -->
            <span style="color: #f59e0b;" class="text-5xl font-black tracking-wider">15:42<span class="text-xl text-gray-400 font-normal ml-2">:18</span></span>
        </div>
    </div>

    <!-- 2. TV Middle Body (Grid 3 Kolom) -->
    <div class="flex-1 flex flex-row gap-5 overflow-hidden">
        
        <!-- Kolom Kiri: JADWAL SHOLAT -->
        <div style="background-color: #ffffff;" class="w-1/4 rounded-3xl p-6 border border-orange-100 shadow-sm flex flex-col justify-between">
            <div>
                <p class="text-xs font-extrabold text-amber-600 uppercase tracking-widest border-b border-gray-100 pb-4 mb-4">JADWAL SHOLAT</p>
                <div class="space-y-3 text-base font-semibold">
                    <div class="flex justify-between text-gray-600 px-2 py-1"><span>Imsak</span><span class="text-gray-900 font-bold">04:28</span></div>
                    <div class="flex justify-between text-gray-600 px-2 py-1"><span>Subuh</span><span class="text-gray-900 font-bold">04:38</span></div>
                    <div class="flex justify-between text-gray-600 px-2 py-1"><span>Terbit</span><span class="text-gray-900 font-bold">05:54</span></div>
                    <div class="flex justify-between text-gray-600 px-2 py-1"><span>Dzuhur</span><span class="text-gray-900 font-bold">12:04</span></div>
                    <!-- Ashar Aktif (Hijau Tua) -->
                    <div style="background-color: #063f2b; color: #ffffff;" class="flex justify-between px-4 py-3 rounded-2xl font-bold shadow-md transform scale-105 transition">
                        <span>Ashar</span>
                        <span>15:18</span>
                    </div>
                    <div class="flex justify-between text-gray-600 px-2 py-1"><span>Maghrib</span><span class="text-gray-900 font-bold">18:12</span></div>
                    <div class="flex justify-between text-gray-600 px-2 py-1"><span>Isya</span><span class="text-gray-900 font-bold">19:21</span></div>
                </div>
            </div>
        </div>

        <!-- Kolom Tengah: Gambar Masjid & Hadis Harian -->
        <div style="background-image: linear-gradient(to top, rgba(0,0,0,0.85) 15%, rgba(0,0,0,0.25) 75%), url('https://images.unsplash.com/photo-1564769625405-49e0950efc93?auto=format&fit=crop&w=1200&q=80'); background-size: cover; background-position: center;" class="w-2/4 rounded-3xl p-8 border border-orange-100 shadow-sm relative flex flex-col justify-between overflow-hidden">
            <div class="flex justify-between items-start relative z-10">
                <span style="background-color: #f59e0b; color: #ffffff;" class="text-xs font-extrabold px-3 py-1.5 rounded-lg uppercase tracking-wider shadow">Hadis Harian</span>
                <div style="background-color: rgba(0,0,0,0.6);" class="px-5 py-3 rounded-2xl text-right border border-white/10 backdrop-blur-sm">
                    <span class="text-[10px] text-gray-300 block uppercase tracking-wider font-semibold mb-1">WAKTU MENUJU MAGHRIB</span>
                    <span style="color: #f59e0b;" class="text-2xl font-black tracking-wide">02:30:14</span>
                </div>
            </div>
            <div class="relative z-10 space-y-2 text-white mt-8">
                <p class="text-2xl italic font-medium leading-relaxed drop-shadow-md">"Sesungguhnya sholat itu mencegah dari perbuatan keji dan munkar."</p>
                <p style="color: #fde047;" class="text-sm font-bold drop-shadow-md">(QS. AL-ANKABUT: 45)</p>
            </div>
        </div>

        <!-- Kolom Kanan: LAPORAN KAS -->
        <div style="background-color: #ffffff;" class="w-1/4 rounded-3xl p-6 border border-orange-100 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                    <p class="text-xs font-extrabold text-amber-600 uppercase tracking-widest">LAPORAN KAS</p>
                    <i class="fa-solid fa-chart-pie text-gray-400 text-lg"></i>
                </div>
                <p class="text-[11px] text-gray-400 font-bold tracking-wider mb-1">TOTAL SALDO KAS</p>
                <p class="text-3xl font-black text-gray-900 mb-6">Rp 42.850.000</p>
                
                <div class="space-y-3">
                    <div style="background-color: #f0fdf4;" class="p-4 rounded-2xl border border-green-100 flex justify-between items-center">
                        <div>
                            <span class="text-[10px] font-extrabold text-green-700 block uppercase mb-1">PEMASUKAN</span>
                            <span class="font-extrabold text-green-900 text-lg">Rp 5.230.000</span>
                        </div>
                    </div>
                    <div style="background-color: #fef2f2;" class="p-4 rounded-2xl border border-red-100 flex justify-between items-center">
                        <div>
                            <span class="text-[10px] font-extrabold text-red-700 block uppercase mb-1">PENGELUARAN</span>
                            <span class="font-extrabold text-red-900 text-lg">Rp 2.150.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="background-color: #fcf8f2;" class="p-4 rounded-2xl text-xs text-center text-gray-700 flex items-center justify-center space-x-2 border border-orange-100 font-semibold mt-4">
                <i style="color: #d97706;" class="fa-solid fa-qrcode text-lg"></i>
                <span>Scan QRIS Infaq melalui Layar Ini</span>
            </div>
        </div>
    </div>

    <!-- 2.5 Kotak Agenda -->
    <div style="background-color: #ffffff;" class="rounded-3xl p-5 border border-orange-100 shadow-sm flex items-center justify-between shrink-0">
        <div class="flex items-center space-x-4 pl-2 w-1/4">
            <div style="background-color: #fef3c7; color: #d97706;" class="w-10 h-10 rounded-xl flex items-center justify-center text-lg font-bold">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <span class="text-xs font-black text-gray-700 uppercase tracking-wider">AGENDA HARI INI</span>
        </div>
        <div class="flex gap-4 w-3/4">
            <div style="background-color: #fcf8f2;" class="flex-1 p-3 rounded-2xl border border-orange-100 flex items-center space-x-3">
                <span class="text-[10px] font-bold bg-amber-100 text-amber-900 px-2.5 py-1 rounded-md shrink-0">18:30 • BAKDA MAGHRIB</span>
                <span class="font-bold text-gray-800 text-sm truncate">Kajian Kitab Riyadhus Shalihin</span>
            </div>
            <div style="background-color: #fcf8f2;" class="flex-1 p-3 rounded-2xl border border-orange-100 flex items-center space-x-3">
                <span class="text-[10px] font-bold bg-amber-100 text-amber-900 px-2.5 py-1 rounded-md shrink-0">16:00 • BAKDA ASHAR</span>
                <span class="font-bold text-gray-800 text-sm truncate">TPA Anak-Anak (Gedung B)</span>
            </div>
        </div>
    </div>

    <!-- 3. TV Bottom Ticker -->
    <div style="background: linear-gradient(to right, #f59e0b, #d97706); color: #ffffff;" class="px-6 py-4 rounded-3xl flex items-center justify-between shadow-sm shrink-0">
        <div class="flex items-center space-x-4 truncate w-full">
            <span style="background-color: #063f2b; color: #ffffff;" class="px-4 py-1.5 rounded-xl text-xs uppercase tracking-wider shadow-sm shrink-0 font-black">INFO MASJID</span>
            
            <!-- Area Ticker Berjalan -->
            <div class="w-full overflow-hidden">
                <div class="whitespace-nowrap text-lg font-semibold tracking-wide">
                    <!-- Gunakan <marquee> sementara untuk simulasi termudah, atau ganti dengan CSS animation nanti -->
                    <marquee scrollamount="8">Jadwal Sholat Jumat tgl 23 Februari 2024: Imam & Khatib Ustadz H. Ahmad Syarifuddin, Lc. &nbsp;&nbsp; | &nbsp;&nbsp; Mohon matikan alat komunikasi selama beribadah.</marquee>
                </div>
            </div>
        </div>
    </div>

</body>
</html>