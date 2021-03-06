@extends('bangunan.layout')
@section('content')
<div class="row m-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2 mb-3">
            <h2>Bangunan</h2>
        </div>
        <form class="float-right form-inline" id="searchForm" method="get" action="{{ route('bangunan.index') }}" role="search">
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" id="Keyword" aria-describedby="Keyword" placeholder="Keyword" value="{{request()->query('keyword')}}">
            </div>
            <button type="submit" class="btn btn-primary mx-2">Cari</button>
            <a href="{{ route('bangunan.index') }}">
                <button type="button" class="btn btn-danger">Reset</button>
            </a>
        </form>
        <div class="my-2">
            <a class="btn btn-success" href="{{ route('bangunan.create') }}"> Input Barang </a>
        </div>
    </div>

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>nama_toko</th>
            <th>pegawai</th>
            <th>jenis_barang</th>
            <th>Jumlah</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($list_bangunan as $bangunan)
        <tr>
            <td>{{$bangunan->nama_toko}}</td>
            <td>{{$bangunan->pegawai}}</td>
            <td>{{$bangunan->jenis_barang}}</td>
            <td>{{$bangunan->jumlah}}</td>
            <td>
                <form action="{{route('bangunan.destroy', $bangunan->id_bangunan) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('bangunan.show', $bangunan->id_bangunan) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('bangunan.edit', $bangunan->id_bangunan) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex">
        {{ $list_bangunan->links('pagination::bootstrap-4') }}
    </div>
</div>