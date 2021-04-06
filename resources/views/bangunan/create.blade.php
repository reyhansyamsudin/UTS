@extends('bangunan.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Bangunan
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('bangunan.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="nama_toko">nama_toko</label>
                        <input type="text" name="nama_toko" class="form-control" id="nama_toko" aria-describedby="nama_toko">
                    </div>
                    <div class="form-group">
                        <label for="pegawai">pegawai</label>
                        <input type="text" name="pegawai" class="form-control" id="pegawai" aria-describedby="pegawai">
                    </div>
                    <div class="form-group">
                        <label for="jenis_barang">jenis_barang</label>
                        <select name="jenis_barang" id="jenis_barang" class="form-control">
                            <option value="Cat">Cat</option>
                            <option value="Paku">Paku</option>
                            <option value="Semen">Semen</option>

                        </select>
                    </div>
                      
                    <div class="form-group">
                        <label for="Jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="Jumlah" aria-describedby="Jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection