<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Masjid Connect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white rounded-3xl w-full max-w-[420px] shadow-xl p-8 space-y-6 relative overflow-hidden border border-gray-100">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-[#f59e0b]"></div>

        <a href="/" class="w-10 h-10 bg-gray-50 hover:bg-gray-100 rounded-full flex items-center justify-center text-gray-500 transition mb-4">
            <i class="fa-solid fa-arrow-left text-sm"></i>
        </a>

        <div>
            <h1 class="text-xl font-bold text-gray-900 tracking-tight mb-1.5">Lupa Password?</h1>
            <p class="text-[11px] text-gray-500 leading-relaxed">Masukkan alamat email yang terdaftar. Kami akan mengirimkan instruksi untuk mereset kata sandi Anda.</p>
        </div>

        <form action="#" method="POST" class="space-y-5">
            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400"><i class="fa-regular fa-envelope text-xs"></i></span>
                    <input type="email" placeholder="admin@alikhlas.com" required class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-xs text-gray-800 font-medium focus:outline-none focus:border-[#f59e0b] focus:bg-white transition">
                </div>
            </div>

            <button type="button" class="w-full bg-[#063f2b] hover:bg-[#042e1f] text-white py-3 rounded-xl text-xs font-bold transition shadow-lg mt-2">
                Kirim Tautan Reset
            </button>
        </form>
    </div>

</body>
</html>