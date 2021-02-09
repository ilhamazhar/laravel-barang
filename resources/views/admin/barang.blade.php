@extends('layouts.admin')

@section('content')
    <a href="{{ route('tambah.barang') }}" class="btn btn-primary mb-3">+ Tambah Barang</a>

    <x-alert></x-alert>
    
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)    
                <tr>
                    <td scope="row">{{ $barang->perPage() * ($barang->currentPage() - 1) + $loop->iteration }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kuantitas }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>
                        <div style="height: 90px; width: 70px; overflow: hidden;">
                            <img src="{{ asset('storage/'. $item->gambar) }}" class="w-100 h-100 d-block" style="object-fit: contain;" alt="{{ asset('storage/'. $item->gambar) }}">
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('ubah.barang', $item) }}" class="badge badge-pill badge-success">Ubah</a>
                        <form action="{{ route('hapus.barang', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn badge badge-pill badge-danger" onclick="return confirm('Yakim data ini dihapus ?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
    {{ $barang->links() }}
@endsection