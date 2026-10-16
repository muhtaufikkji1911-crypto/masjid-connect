<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Connect - Admin Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#063f2b] text-white flex flex-col justify-between shadow-xl z-20 h-full relative">
        <div>
            <!-- Logo Masjid Connect -->
            <div class="p-6 pt-8 flex items-center space-x-3 mb-4">
                <div class="bg-[#f59e0b] w-10 h-10 rounded-lg flex items-center justify-center shadow-lg text-[#063f2b]">
                    <i class="fa-solid fa-mosque text-lg"></i>
                </div>
                <div>
                    <h1 class="font-bold text-xl tracking-wide leading-tight">Masjid Connect</h1>
                    <p class="text-[10px] text-green-100/80 uppercase tracking-widest mt-0.5 font-semibold">Masjid Al-Ikhlas</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-2 px-3 space-y-1">
                <a href="/dashboard" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('dashboard') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-5"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
                <a href="/keuangan" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('keuangan') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-solid fa-wallet w-5"></i>
                    <span class="text-sm">Kas & Keuangan</span>
                </a>
                <a href="/donasi" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('donasi') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-solid fa-hand-holding-heart w-5"></i>
                    <span class="text-sm">Donasi & Infaq</span>
                </a>
                <a href="/agenda" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('agenda') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-regular fa-calendar-check w-5"></i>
                    <span class="text-sm">Agenda Kegiatan</span>
                </a>
                <a href="/jadwal-salat" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('jadwal-salat') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-regular fa-clock w-5"></i>
                    <span class="text-sm">Jadwal Salat</span>
                </a>
                <a href="/digital-signage" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('digital-signage') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-solid fa-tv w-5"></i>
                    <span class="text-sm">Digital Signage</span>
                </a>
                <a href="/inventaris" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('inventaris') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-solid fa-boxes-stacked w-5"></i>
                    <span class="text-sm">Inventaris</span>
                </a>
                <a href="/pengaturan" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition border-l-4 {{ request()->is('pengaturan') ? 'bg-[#0a4d36] text-[#f59e0b] border-[#f59e0b] font-medium shadow-md' : 'border-transparent text-gray-300 hover:bg-[#0a4d36] hover:text-white' }}">
                    <i class="fa-solid fa-gear w-5"></i>
                    <span class="text-sm">Pengaturan</span>
                </a>
            </nav>
        </div>

        <!-- Server Status (Bottom) -->
        <div class="p-4 mx-4 mb-6 bg-[#042e1f] rounded-xl flex flex-col justify-center border border-white/5 shadow-inner">
            <div class="flex items-center space-x-2 mb-1">
                <span class="w-2 h-2 bg-[#10b981] rounded-full animate-pulse shadow-[0_0_5px_#10b981]"></span>
                <p class="font-bold text-[11px] uppercase tracking-wider text-green-50">Server Status: OK</p>
            </div>
            <p class="text-[9px] text-gray-400 pl-4">Versi 2.4.1 - Sync Otomatis Aktif</p>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- Topbar -->
        <header class="bg-white px-8 py-3.5 border-b border-gray-100 flex justify-between items-center z-50 sticky top-0 shadow-sm">
            
            <!-- Search (Left/Center) -->
            <div class="relative flex-1 max-w-xl">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-2.5 text-gray-400 text-sm"></i>
                <input type="text" placeholder="Cari agenda, pemateri, atau lokasi..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-100 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-[#063f2b] focus:border-transparent outline-none transition-all shadow-inner">
            </div>
            
            <div class="flex items-center space-x-6 ml-6">
                <!-- Date Info -->
                <div class="text-right hidden md:block">
                    <p class="text-xs text-gray-800 font-bold uppercase tracking-wide">24 Sya'ban 1445 H</p>
                    <p class="text-[11px] text-gray-400">Senin, 04 Maret 2024</p>
                </div>
                
                <!-- Notification -->
                <!-- Container Notifikasi -->
<div class="relative" id="notification-container">
    
    <!-- Tombol Lonceng -->
    <button onclick="toggleNotification()" class="relative p-2 text-gray-400 hover:text-gray-600 transition focus:outline-none rounded-full hover:bg-gray-100">
        <i class="fa-regular fa-bell text-xl"></i>
        <!-- Titik Merah Notifikasi -->
        <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
    </button>

    <!-- Dropdown Pop-up Notifikasi -->
    <div id="notification-dropdown" class="absolute right-0 mt-3 w-80 bg-white rounded-2xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.15)] border border-gray-100 transform transition-all duration-200 origin-top-right scale-95 opacity-0 invisible z-50">
        
        <!-- Header Dropdown -->
        <div class="px-4 py-3 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-sm font-bold text-gray-800">Notifikasi</h3>
            <span class="bg-red-100 text-red-600 text-[10px] font-bold px-2 py-0.5 rounded-full">2 Baru</span>
        </div>
        
        <!-- Isi Notifikasi -->
        <div class="max-h-80 overflow-y-auto">
            <!-- Item Notifikasi 1 -->
            <a href="#" class="flex items-start px-4 py-3.5 hover:bg-gray-50 transition border-b border-gray-50">
                <div class="bg-green-100 text-green-600 w-8 h-8 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fa-solid fa-wallet text-xs"></i>
                </div>
                <div class="ml-3">
                    <p class="text-xs font-bold text-gray-800">Pemasukan Kas Baru</p>
                    <p class="text-[11px] text-gray-500 mt-0.5">Kotak amal Jumat bertambah Rp 2.500.000</p>
                    <p class="text-[10px] text-gray-400 mt-1.5 font-medium">10 menit yang lalu</p>
                </div>
            </a>
            
            <!-- Item Notifikasi 2 -->
            <a href="#" class="flex items-start px-4 py-3.5 hover:bg-gray-50 transition">
                <div class="bg-blue-100 text-blue-600 w-8 h-8 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fa-solid fa-calendar-check text-xs"></i>
                </div>
                <div class="ml-3">
                    <p class="text-xs font-bold text-gray-800">Perubahan Agenda</p>
                    <p class="text-[11px] text-gray-500 mt-0.5">Kajian Fiqih dipindahkan ke ba'da Maghrib</p>
                    <p class="text-[10px] text-gray-400 mt-1.5 font-medium">2 jam yang lalu</p>
                </div>
            </a>
        </div>
        
        <!-- Footer Dropdown -->
        <a href="#" class="block text-center px-4 py-2.5 text-[11px] font-bold text-[#063f2b] hover:bg-gray-50 rounded-b-2xl transition border-t border-gray-100">
            Tandai semua dibaca
        </a>
    </div>
</div>
                
                <!-- Profile -->
                <button class="flex items-center space-x-3 hover:bg-gray-50 p-1.5 rounded-lg transition">
                    <div class="text-right hidden sm:block">
                        <p class="text-[11px] font-bold text-gray-800">Admin Masjid</p>
                        <p class="text-[9px] text-gray-400 uppercase tracking-wider font-bold">Super Admin</p>
                    </div>
                    <img src="https://i.pravatar.cc/150?img=11" alt="Profile" class="w-8 h-8 rounded-full border border-gray-200">
                </button>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-8 bg-gray-50/80">
            @yield('content')
        </main>
        
    </div>
    <!-- Toast Container (Anti Scroll: dibungkus dengan lebar tetap dan overflow-hidden) -->
<div id="toast-container" class="fixed top-6 right-0 z-[100] w-[400px] overflow-hidden pointer-events-none flex flex-col gap-3 py-4 pl-4 pr-6">
    
    <!-- Toast Sukses -->
    <div id="toast-success" class="bg-white border-l-4 border-green-500 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.2)] rounded-xl p-4 flex items-center space-x-3 transform transition-all duration-300 translate-x-[120%] opacity-0 hidden">
        <div class="bg-green-100 text-green-600 w-8 h-8 rounded-full flex items-center justify-center shrink-0">
            <i class="fa-solid fa-check text-sm font-bold"></i>
        </div>
        <div class="pr-4">
            <p class="text-xs font-bold text-gray-800">Berhasil!</p>
            <p class="text-[11px] text-gray-500 mt-0.5">Tindakan Anda berhasil disimpan.</p>
        </div>
    </div>

    <!-- Toast Gagal -->
    <div id="toast-error" class="bg-white border-l-4 border-red-500 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.2)] rounded-xl p-4 flex items-center space-x-3 transform transition-all duration-300 translate-x-[120%] opacity-0 hidden">
        <div class="bg-red-100 text-red-600 w-8 h-8 rounded-full flex items-center justify-center shrink-0">
            <i class="fa-solid fa-xmark text-sm font-bold"></i>
        </div>
        <div class="pr-4">
            <p class="text-xs font-bold text-gray-900">Gagal Memproses!</p>
            <p class="text-[11px] text-gray-500 mt-0.5">Pastikan form terisi dengan benar atau cek koneksi Anda.</p>
        </div>
    </div>

</div>

    <script>
    function showToast() {
        const toast = document.getElementById('toast-success');
        toast.classList.remove('hidden');
        
        setTimeout(() => {
            toast.classList.remove('translate-x-[120%]', 'opacity-0');
            toast.classList.add('translate-x-0', 'opacity-100');
        }, 10);

        setTimeout(() => {
            toast.classList.remove('translate-x-0', 'opacity-100');
            toast.classList.add('translate-x-[120%]', 'opacity-0');
            setTimeout(() => { toast.classList.add('hidden'); }, 300);
        }, 3000);
    }

    function showErrorToast() {
        const errorToast = document.getElementById('toast-error');
        errorToast.classList.remove('hidden');
        
        setTimeout(() => {
            errorToast.classList.remove('translate-x-[120%]', 'opacity-0');
            errorToast.classList.add('translate-x-0', 'opacity-100');
        }, 10);

        setTimeout(() => {
            errorToast.classList.remove('translate-x-0', 'opacity-100');
            errorToast.classList.add('translate-x-[120%]', 'opacity-0');
            setTimeout(() => { errorToast.classList.add('hidden'); }, 300);
        }, 3000);
    }
    // ==== SENSOR OTOMATIS UNTUK BACKEND ====
    document.addEventListener('DOMContentLoaded', function() {
        // Jika backend mengirim sinyal 'success'
        @if(session()->has('success'))
            showToast();
        @endif

        // Jika backend mengirim sinyal 'error'
        @if(session()->has('error'))
            showErrorToast();
        @endif
    });

    // Fungsi Toggle Notifikasi
    function toggleNotification() {
        const dropdown = document.getElementById('notification-dropdown');
        
        if (dropdown.classList.contains('invisible')) {
            // Munculkan menu
            dropdown.classList.remove('invisible', 'scale-95', 'opacity-0');
            dropdown.classList.add('scale-100', 'opacity-100');
        } else {
            // Sembunyikan menu
            dropdown.classList.remove('scale-100', 'opacity-100');
            dropdown.classList.add('scale-95', 'opacity-0', 'invisible');
        }
    }

    // Fungsi untuk menutup notifikasi saat user mengklik area luar dropdown
    document.addEventListener('click', function(event) {
        const container = document.getElementById('notification-container');
        const dropdown = document.getElementById('notification-dropdown');
        
        // Jika klik terjadi di luar container lonceng DAN menu sedang terbuka
        if (!container.contains(event.target) && !dropdown.classList.contains('invisible')) {
            dropdown.classList.remove('scale-100', 'opacity-100');
            dropdown.classList.add('scale-95', 'opacity-0', 'invisible');
        }
    });

</script>

</body>
</html>