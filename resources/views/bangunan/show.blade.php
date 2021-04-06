@extends('bangunan.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Bangunan
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>nama_toko: </b>{{$bangunan->nama_toko}}</li>
                    <li class="list-group-item"><b>pegawai: </b>{{$bangunan->pegawai}}</li>
                    <li class="list-group-item"><b>jenis_barang: </b>{{$bangunan->jenis_barang}}</li>
                    <li class="list-group-item"><b>Jumlah: </b>{{$bangunan->jumlah}}</li>
                </ul>
            </div>
            <a class="btn btn-success mx-3" href="{{ route('bangunan.index') }}">Kembali</a>
            <div class="d-flex justify-content-between">
                <a class="btn m-3 {{isset($prev->id_bangunan) ? 'btn-outline-primary' : 'disabled' }}" href="{{ isset($prev->id_bangunan) ? route('bangunan.show', $prev->id_bangunan) : '' }}"><i class="fas fa-chevron-left"></i> Sebelumnya</i></a>
                <a class="btn m-3 {{isset($next->id_bangunan) ? 'btn-outline-primary' : 'disabled' }}" href="{{ isset($next->id_bangunan) ? route('bangunan.show', $next->id_bangunan) : '' }}">Selanjutnya <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection