<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Masjid Connect</title>
    @vite('resources/css/app.css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        input::placeholder { color: #9ca3af; }
    </style>
</head>
<body class="bg-white flex h-screen overflow-hidden text-gray-800">

    <!-- Area Kiri: Form Login -->
    <!-- Kita gunakan flex dan justify-center untuk menengahkan kontainer utama di sisi kiri -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-white relative z-10 shadow-[20px_0_30px_-15px_rgba(0,0,0,0.1)]">
        
        <!-- KONTINER UTAMA: Membungkus Logo, Form, dan Footer agar sejajar kiri 100% -->
        <div class="w-full max-w-[400px] px-8 lg:px-0 flex flex-col h-full py-10 lg:py-16">
            
            <!-- Header / Logo -->
            <div class="flex items-center space-x-3 mb-auto">
                <div class="bg-[#f59e0b] w-9 h-9 rounded flex items-center justify-center">
                    <i class="fa-solid fa-mosque text-[#063f2b] text-lg"></i>
                </div>
                <h1 class="font-bold text-xl text-gray-900 tracking-tight">Masjid Connect</h1>
            </div>

            <!-- Bagian Tengah Form -->
            <div class="w-full my-auto">
                <h2 class="text-[28px] font-bold text-gray-900 mb-2 leading-tight">Selamat Datang Kembali</h2>
                <p class="text-[14px] text-gray-500 mb-8 leading-relaxed">
                    Silakan masuk untuk mengelola kas, agenda, dan digital signage masjid Anda.
                </p>

                <form action="#" method="POST" class="space-y-5">
                    <!-- Input Email -->
                    <div>
                        <label class="block text-[13px] font-bold text-gray-800 mb-2">Email atau Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-gray-400"></i>
                            </div>
                            <input type="text" placeholder="admin@alikhlas.com" class="block w-full pl-11 pr-4 py-3.5 bg-[#f8fafc] border border-gray-200 rounded-xl text-[14px] text-gray-900 focus:bg-white focus:ring-2 focus:ring-[#063f2b] focus:border-transparent outline-none transition-all">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="passwordInput" placeholder="••••••••••••" class="block w-full pl-11 pr-11 py-3.5 bg-[#f8fafc] border border-gray-200 rounded-xl text-[14px] text-gray-900 focus:bg-white focus:ring-2 focus:ring-[#063f2b] focus:border-transparent outline-none transition-all">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <i id="eyeIcon" class="fa-regular fa-eye-slash text-gray-400 hover:text-gray-600 transition"></i>
                        </button>
                    </div>

                    <!-- Opsi Tambahan -->
                    <div class="flex items-center justify-between mt-2">
                        <label class="flex items-center space-x-2 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 accent-[#063f2b] cursor-pointer">
                            <span class="text-[13px] text-gray-500 group-hover:text-gray-800 transition">Ingat Saya</span>
                        </label>
                        <a href="/lupa-password" class="text-[13px] font-bold text-gray-800 hover:text-[#063f2b] transition">Lupa Password?</a>
                    </div>

                    <!-- Tombol Submit -->
                <button type="button" onclick="window.location.href='/dashboard'" class="w-full bg-[#063f2b] hover:bg-[#042e1f] text-white font-medium py-3.5 rounded-xl mt-6 flex justify-center items-center space-x-2 transition-all shadow-lg shadow-[#063f2b]/20">
                    <span>Login</span>
                </button>
                </form>
            </div>

            <!-- Footer Form -->
            <div class="flex justify-between items-center text-[11px] text-gray-400 w-full pt-6 mt-auto border-t border-gray-100">
                <p>&copy; 2026 Masjid Connect. All rights reserved.</p>
                <div class="space-x-4">
                    <a href="#" class="hover:text-gray-600 transition">Bantuan</a>
                    <a href="#" class="hover:text-gray-600 transition">Kebijakan Privasi</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Area Kanan: Hero Image & Info -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-cover bg-center overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1572365287895-c1fc3f08c3e6?q=80&w=2070&auto=format&fit=crop');">
        
        <div class="absolute inset-0 bg-gradient-to-t from-[#063f2b] via-[#063f2b]/70 to-transparent"></div>

        <div class="relative z-10 w-full flex flex-col justify-end px-16 pb-16 h-full">
            <div class="mb-8">
                <div class="w-max px-3 py-1.5 bg-[#f59e0b]/20 border border-[#f59e0b]/30 rounded-md flex items-center space-x-2 mb-6">
                    <i class="fa-solid fa-bolt text-[#f59e0b] text-xs"></i>
                    <span class="text-[#f59e0b] text-[11px] font-bold tracking-wider uppercase">Pusat Manajemen Digital</span>
                </div>
                <h1 class="text-[40px] font-bold text-white leading-[1.15] mb-5">
                    Membangun Ekosistem Masjid<br>yang <span class="text-[#f59e0b]">Modern & Transparan</span>
                </h1>
                <p class="text-white/80 text-[15px] leading-relaxed max-w-lg">
                    Solusi terintegrasi untuk pengelolaan keuangan, penjadwalan ibadah, dan penyampaian informasi melalui Digital Signage dalam satu genggaman.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-5 max-w-[520px]">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-5 rounded-2xl shadow-xl">
                    <div class="flex items-center space-x-3 mb-2">
                        <i class="fa-solid fa-wallet text-[#f59e0b] text-lg"></i>
                        <h3 class="text-white font-semibold text-[15px]">Kas Terintegrasi</h3>
                    </div>
                    <p class="text-white/70 text-[13px] leading-tight">Laporan pemasukan & pengeluaran real-time.</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-5 rounded-2xl shadow-xl">
                    <div class="flex items-center space-x-3 mb-2">
                        <i class="fa-solid fa-tv text-[#f59e0b] text-lg"></i>
                        <h3 class="text-white font-semibold text-[15px]">Smart Signage</h3>
                    </div>
                    <p class="text-white/70 text-[13px] leading-tight">Kontrol tayangan informasi secara jarak jauh.</p>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle tipe input antara password dan text
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Toggle ikon mata
        eyeIcon.classList.toggle('fa-eye-slash');
        eyeIcon.classList.toggle('fa-eye');
    });
</script>
</html>