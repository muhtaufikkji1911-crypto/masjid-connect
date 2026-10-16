<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    public function index() 
    {
        $totalKas = 42850000; 
        return view('dashboard', compact('totalKas'));
    }

    public function keuangan()
    {
        return view('keuangan');
    }

    // Tambahkan fungsi baru ini untuk halaman Donasi
    public function donasi()
    {
        return view('donasi');
    }

    // Tambahkan di bawah fungsi donasi()
    public function agenda()
    {
        return view('agenda');
    }

    public function jadwalSalat()
    {
        return view('jadwal-salat');
    }
}