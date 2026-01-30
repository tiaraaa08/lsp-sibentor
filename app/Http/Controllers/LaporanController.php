<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\pelanggan;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
   public function index(Request $request)
{
    $query = Transaksi::query();

    if ($request->hariMulai && !$request->hariAkhir) {
        $query->whereDate('tanggal_transaksi', '>=', $request->hariMulai);
    }

    if (!$request->hariMulai && $request->hariAkhir) {
        $query->whereDate('tanggal_transaksi', '<=', $request->hariAkhir);
    }

    if ($request->hariMulai && $request->hariAkhir) {
        $query->whereBetween('tanggal_transaksi', [
            $request->hariMulai,
            $request->hariAkhir
        ]);
    }

    $transaksi = $query->get();

    return view('laporan.main', compact('transaksi'));
}


    public function beranda()
    {
        $transaksi = transaksi::whereDate('tanggal_transaksi', Carbon::today())->get();
        $pelanggan = pelanggan::count();
        $layanan = layanan::count();

        return view('beranda', compact('transaksi', 'layanan', 'pelanggan'));
    }
}
