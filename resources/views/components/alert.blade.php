@if (session('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <b>{{ session('berhasil') }}</b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('hapus'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <b>{{ session('hapus') }}</b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif