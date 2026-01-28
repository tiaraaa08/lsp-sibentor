<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // $transaksi = transaksi::all();
        $query = transaksi::with(['layanan', 'pelanggan']);

        if ($request->tanggal) {
            $query->whereDate('tanggal_transaksi', $request->tanggal);
        }

        $transaksi = $query->get();
        return view('laporan.main', compact('transaksi'));
    }

    public function beranda()
    {
        $transaksi = transaksi::all();
        $pelanggan = pelanggan::count();
        $layanan = layanan::count();

        return view('beranda', compact('transaksi', 'layanan', 'pelanggan'));
    }
}
