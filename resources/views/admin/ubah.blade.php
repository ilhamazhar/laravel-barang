@extends('layouts.admin')

@section('content')
    
<div class="card">
    <div class="card-header">{{ $judul }}</div>
    <div class="card-body">   
        <form action="{{ route('ubah.barang', $barang) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="">Kode</label>
                    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') ?? $barang->kode }}">
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nama Produk</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $barang->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="">Kuantitas</label>
                    <input type="text" name="kuantitas" class="form-control @error('kuantitas') is-invalid @enderror" value="{{ old('kuantitas') ?? $barang->kuantitas }}">
                    @error('kuantitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Harga</label>
                    <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') ?? $barang->harga }}">
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="">Pilih gambar</label>
                <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" value="{{ old('gambar') ?? $barang->gambar }}">
                <small>{{ $barang->gambar }}</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('data.barang') }}" class="btn btn-secondary">Kembali</a>
            <button class="btn btn-primary" type="submit">Ubah</button>
        </form>
    </div>
</div>

@endsection