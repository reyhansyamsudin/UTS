@extends('bangunan.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah bangunan
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
                <form method="post" action="{{ route('bangunan.update', $bangunan->kode_toko) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="bangunan">Bangunan</label>
                        <input type="text" name="bangunan" class="form-control" id="bangunan" aria-describedby="bangunan" value="{{$bangunan->nama_toko}}">
                    </div>
                    <div class="form-group">
                        <label for="Kategory">Kategori</label>
                        <select name="kategory" id="Kategory" class="form-control">
                            <option value="nama_toko" {{ ( $bangunan->kategory == 'nama_toko') ? 'selected' : '' }}>nama_toko</option>
                            <option value="pegawai" {{ ( $bangunan->kategory == 'Pegawai') ? 'selected' : '' }}>Pegawai</option>
                            <option value="jenis_barang" {{ ( $bangunan->kategory == 'Jenis_barang') ? 'selected' : '' }}>Jenis_barang</option>
                            <option value="jumlah" {{ ( $bangunan->kategory == 'Jumlah') ? 'selected' : '' }}>Jumlah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="Jumlah" aria-describedby="Jumlah" value="{{$barang->qty}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection