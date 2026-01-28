<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = transaksi::all();
        $pelanggan = pelanggan::all();
        $layanan = layanan::all();

        return view('transaksi.main', compact('transaksi', 'pelanggan', 'layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        transaksi::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_layanan' => $request->id_layanan,
            'tanggal_transaksi' => $request->tanggal_transaksi
        ]);

        return redirect()->back()->with('success', 'Data transaksi telah tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->update([
            'id_pelanggan' => $request->id_pelanggan,
            'id_layanan' => $request->id_layanan,
            'tanggal_transaksi' => $request->tanggal_transaksi
        ]);

        return redirect()->back()->with('success', 'Data transaksi telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->delete();
        
        return redirect()->back()->with('success', 'Data transaksi telah dihapus');
    }
}
