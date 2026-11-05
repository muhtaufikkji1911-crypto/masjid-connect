@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-12">
    
    <!-- Header Page -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-2">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1 tracking-tight">Pengaturan Sistem</h1>
            <p class="text-sm text-gray-500">Kelola profil masjid dan keamanan akun pengelola.</p>
        </div>
    </div>

    <!-- Tabs Navigasi Pengaturan (Hanya 2 Tab) -->
    <div class="flex border-b border-gray-200 space-x-8 text-xs font-bold bg-white px-6 rounded-t-2xl pt-4 shadow-sm overflow-x-auto">
        <button id="btn-tab-profil" onclick="switchTab('profil')" class="tab-btn pb-3 border-b-2 border-[#063f2b] text-[#063f2b] whitespace-nowrap transition">Profil Masjid</button>
        <button id="btn-tab-keamanan" onclick="switchTab('keamanan')" class="tab-btn pb-3 border-b-2 border-transparent text-gray-500 hover:text-gray-800 whitespace-nowrap transition">Keamanan & Akun Masjid</button>
    </div>

    <!-- ============================================== -->
    <!-- TAB 1: PROFIL MASJID                          -->
    <!-- ============================================== -->
    <div id="content-profil" class="tab-content block">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri & Tengah (Span 2) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Box 1: Identitas Masjid -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-5 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                    <h2 class="font-bold text-gray-900 text-sm pl-2">Identitas Masjid</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 pl-2 items-center">
                        <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-2xl p-4 bg-gray-50/50 text-center">
                            <div class="w-14 h-14 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-gray-400 mb-2">
                                <i class="fa-solid fa-mosque text-xl"></i>
                            </div>
                            <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider mb-2">UPLOAD LOGO</span>
                            <button class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-3 py-1.5 rounded-lg text-[11px] font-bold shadow-sm transition">Ubah Foto</button>
                        </div>

                        <div class="sm:col-span-2 space-y-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Nama Masjid</label>
                                <input type="text" value="Masjid Al-Ikhlas" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Nomor ID Masjid (Legal / Kemenag)</label>
                                <input type="text" value="01.2.04.14.05.000123" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Box 2: Lokasi & GPS -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-5 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                    <h2 class="font-bold text-gray-900 text-sm pl-2">Lokasi & GPS</h2>

                    <div class="space-y-4 pl-2">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Alamat Lengkap</label>
                            <input type="text" value="Jl. Perintis Kemerdekaan KM.10, Bumi Tamalanrea Permai (BTP) Blok M, Makassar" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Kota / Kabupaten</label>
                                <input type="text" value="Kota Makassar" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Kecamatan</label>
                                <input type="text" value="Tamalanrea" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Latitude</label>
                                <input type="text" value="-5.133297" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                            <div class="flex space-x-2">
                                <div class="flex-1">
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Longitude</label>
                                    <input type="text" value="119.488342" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                                </div>
                                <button class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-4 py-2.5 rounded-xl text-xs font-bold transition shadow-sm h-[38px] shrink-0 flex items-center space-x-1.5">
                                    <i class="fa-solid fa-location-crosshairs"></i>
                                    <span>Ambil GPS</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Rekening & Donasi -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                    <h2 class="font-bold text-gray-900 text-sm pl-2">Rekening & Donasi</h2>

                    <div class="space-y-3.5 pl-2">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Bank</label>
                            <input type="text" value="Bank Syariah Indonesia (BSI)" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nomor Rekening</label>
                            <input type="text" value="714 889 0012" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nama Pemilik Rekening</label>
                            <input type="text" value="Masjid Al-Ikhlas BTP" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>

                        <div class="pt-2">
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">QRIS Preview</label>
                            <div class="border border-gray-200 rounded-2xl p-5 bg-gray-50/50 flex flex-col items-center justify-center text-center space-y-3">
                                <div class="w-36 h-36 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center p-3">
                                    <i class="fa-solid fa-qrcode text-5xl text-amber-500 mb-1"></i>
                                    <span class="text-[8px] text-gray-400 font-bold uppercase">SCAN TO DONATE</span>
                                </div>
                                <button class="text-xs font-bold text-[#f59e0b] hover:underline">Ganti QRIS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================== -->
    <!-- TAB 2: KEAMANAN & AKUN MASJID                  -->
    <!-- ============================================== -->
    <div id="content-keamanan" class="tab-content hidden space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Ubah Password Form (Span 2) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-5 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                    <h2 class="font-bold text-gray-900 text-sm pl-2">Ubah Kata Sandi Admin</h2>

                    <div class="space-y-4 pl-2">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Kata Sandi Saat Ini</label>
                            <input type="password" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Kata Sandi Baru</label>
                                <input type="password" placeholder="Minimal 8 karakter" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" placeholder="Ketik ulang kata sandi baru" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-gray-800 focus:bg-white focus:border-[#063f2b] outline-none transition">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Log Audit / Riwayat Aktivitas Sesi -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                    <h2 class="font-bold text-gray-900 text-sm pl-2 mb-2">Riwayat Aktivitas Login & Keamanan</h2>

                    <div class="overflow-x-auto pl-2">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-100">
                                    <th class="pb-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Aktivitas</th>
                                    <th class="pb-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Perangkat / IP</th>
                                    <th class="pb-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                <tr class="border-b border-gray-50">
                                    <td class="py-3 font-semibold text-gray-800">Login Berhasil (Super Admin)</td>
                                    <td class="py-3 text-gray-500">Chrome on Windows (180.252.xx.xx)</td>
                                    <td class="py-3 text-gray-400 text-right">Hari ini, 10:45 WITA</td>
                                </tr>
                                <tr class="border-b border-gray-50">
                                    <td class="py-3 font-semibold text-gray-800">Perubahan Jadwal Agenda</td>
                                    <td class="py-3 text-gray-500">Chrome on Android (180.252.xx.xx)</td>
                                    <td class="py-3 text-gray-400 text-right">Kemarin, 19:20 WITA</td>
                                </tr>
                                <tr>
                                    <td class="py-3 font-semibold text-gray-800">Pembaruan Rekening Donasi</td>
                                    <td class="py-3 text-gray-500">Chrome on Windows (180.252.xx.xx)</td>
                                    <td class="py-3 text-gray-400 text-right">02 Mar 2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sesi Aktif & 2FA (Kolom Kanan) -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#f59e0b]"></div>
                    <h2 class="font-bold text-gray-900 text-sm pl-2">Keamanan Ganda (2FA)</h2>

                    <div class="pl-2 space-y-4">
                        <p class="text-xs text-gray-500 leading-relaxed">Tambahkan lapisan keamanan ekstra pada akun admin masjid menggunakan Verifikasi 2 Langkah.</p>
                        
                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-xl bg-gray-50/50">
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-shield-halved text-xl text-[#063f2b]"></i>
                                <div>
                                    <div class="text-xs font-bold text-gray-800">Status 2FA</div>
                                    <div class="text-[10px] text-gray-400">Belum diaktifkan</div>
                                </div>
                            </div>
                            <button class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">Aktifkan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Action Bar -->
    <div class="flex items-center justify-end pt-4 space-x-3">
        <button class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-6 py-2.5 rounded-xl text-xs font-bold transition shadow-sm">
            Batal
        </button>
        <button class="bg-[#063f2b] hover:bg-[#042e1f] text-white px-7 py-2.5 rounded-xl text-xs font-bold transition shadow-md">
            Simpan Perubahan
        </button>
    </div>

</div>

<!-- SCRIPT PINDAH TAB -->
<script>
    function switchTab(tabName) {
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => {
            content.classList.remove('block');
            content.classList.add('hidden');
        });

        const selectedContent = document.getElementById('content-' + tabName);
        if(selectedContent) {
            selectedContent.classList.remove('hidden');
            selectedContent.classList.add('block');
        }

        const buttons = document.querySelectorAll('.tab-btn');
        buttons.forEach(btn => {
            btn.classList.remove('border-[#063f2b]', 'text-[#063f2b]');
            btn.classList.add('border-transparent', 'text-gray-500');
        });

        const selectedBtn = document.getElementById('btn-tab-' + tabName);
        if(selectedBtn) {
            selectedBtn.classList.remove('border-transparent', 'text-gray-500');
            selectedBtn.classList.add('border-[#063f2b]', 'text-[#063f2b]');
        }
    }
</script>
@endsection