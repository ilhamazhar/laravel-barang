@extends('layouts.admin')

@section('content')
    
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)    
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm">Selesai</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>

@endsection