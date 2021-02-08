<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        return view('app.data', [
            'judul' => 'Tokko Talk',
            'barang' => Barang::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Pesanan::create([
            'nama' => request('nama'),
            'email' => request('email'),
            'alamat' => request('alamat'),
            'barang' => request('barang'),
            'jumlah' => request('jumlah'),
        ]);

        return redirect()->route('data.pesanan')->with('berhasil', 'Barang telah berhasil dipesan.');
    }

    public function show(Pesanan $pesanan)
    {
        return view('admin.pesanan', [
            'judul' => 'Detail Pesanan',
            'pesanan' => Pesanan::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
