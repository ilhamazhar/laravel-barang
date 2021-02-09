@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Selamat belanja di Toko Talk</h2><hr class="mb-5 border-info">
    
    <x-alert></x-alert>
    <div class="row">
        @foreach ($barang as $item)  
        <div class="col-md-3">
            <div class="card mb-3">
                <div style="height: 180px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-100 h-100 d-block" style="object-fit: contain;">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h5 class="">{{ Str::limit($item->nama, 12) }}</h5>
                        <p>Rp.{{ $item->harga }}</p>   
                    </div>
                    <a href="row justify-content-end" class="btn btn-primary btn-block" data-toggle="modal" data-target="#data">Beli</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Modal --}}

<div class="modal fade" id="data" tabindex="-1" aria-labelledby="dataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataLabel">Formulir Pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('data.beli') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat pengiriman:</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="form-group">
                        <label for="barang" class="col-form-label">Pilih barang:</label>
                        <select class="form-control" name="barang" id="barang">
                            @foreach ($barang as $item)
                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="col-form-label">Jumlah barang:</label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Beli barang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection