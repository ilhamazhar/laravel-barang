<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        return view('admin.barang', [
            'judul' => 'Detail Barang',
            'barang' => Barang::paginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.tambah', [
            'judul' => 'Tambah Data Barang'
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'kode' => 'required|unique:barangs',
            'nama' => 'required|unique:barangs',
            'kuantitas' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar' => 'required'
        ]);

        $str = request()->file('gambar')->getClientOriginalName();
        $pattern = "/.(jpg|jpeg|png|gif)$/i";
        $namaGambar = preg_replace($pattern, "", $str) . '-' . time() . '.' . request()->file('gambar')->extension();
        // dd($namaGambar);
        Barang::create([
            'kode' => request('kode'),
            'slug' => Str::slug(request('nama')),
            'nama' => request('nama'),
            'kuantitas' => request('kuantitas'),
            'harga' => request('harga'),
            'gambar' => request()->file('gambar')->storeAs('gambar', $namaGambar, 'public')
        ]);

        return redirect()->route('data.barang')->with('berhasil', 'Barang telah berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('admin.ubah', [
            'judul' => "Ubah barang : {$barang->nama}",
            'barang' => $barang
        ]);
    }

    public function update(Barang $barang)
    {
        request()->validate([
            'kode' => 'required|unique:barangs,kode,' . $barang->id,
            'nama' => 'required|unique:barangs,nama,' . $barang->id,
            'kuantitas' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar' => ''
        ]);


        // Ketika dia ga update gambar dia jalanin barang->gambar
        // Ketika dia update (  !hasFile('gambar'))
        if (request('gambar')) {
            // $image_path = public_path('storage') . '/' . $barang->gambar;
            // unlink($image_path);

            $str = request()->file('gambar')->getClientOriginalName();
            $pattern = "/.(jpg|jpeg|png|gif)$/i";
            $namaGambar = preg_replace($pattern, "", $str) . '-' . time() . '.' . request()->file('gambar')->extension();

            $gambar = request()->file('gambar')->storeAs('gambar', $namaGambar, 'public');
        } elseif ($barang->gambar) {
            $gambar = $barang->gambar;
        } else {
            $gambar = null;
        }

        $barang->update([
            'kode' => request('kode'),
            'slug' => Str::slug(request('nama')),
            'nama' => request('nama'),
            'kuantitas' => request('kuantitas'),
            'harga' => request('harga'),
            'gambar' => $gambar
        ]);

        return redirect()->route('data.barang')->with('berhasil', 'Barang telah berhasil diubah.');
    }

    public function destroy(Barang $barang)
    {
        $image_path = public_path('storage') . '/' . $barang->gambar;
        unlink($image_path);

        $barang->delete();

        return back()->with('hapus', 'Barang telah berhasil dihapus.');
    }
}
