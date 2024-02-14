@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Form pengembalian buku
        </li>
    </ol>
</nav>
<div class="card card-body border-0">
    <form action="{{route('pengembalian.store', $pengembalian->id)}}" method="post">
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
        @endif

        <div class="form-group">
            <label for="">Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="{{$pengembalian->first()->book->name}}" disabled id="">
        </div>
        <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" name="name" class="form-control" value="{{$pengembalian->first()->user->name}}" disabled id="">
        </div>
        <div class="form-group">
            <label for="">Tangga Pinjam</label>
            <input type="text" name="tgl_pinjm" class="form-control" value="{{$pengembalian->tgl_pinjam}}"  id="">
        </div>
        <div class="form-group">
            <label for="">Tanggal Kembali</label>
            <input type="text" name="tgl_kembali" class="form-control" value="{{$pengembalian->tgl_kembali}}"  id="">
        </div>
        <?php
            $datetime2 = strtotime($date) ;
            $datenow = strtotime($pengembalian->tgl_pinjam);
            $durasi = ($datenow - $datetime2) / 86400 ;
            $durasi2 = ($durasi) + 7;
        ?>
        @if ($durasi < -7 )
            <div class="form-group">
                <label for="">Durasi / Hari</label>
                <input type="text" name="durasi" id="" value="{{ number_format($durasi2) }}" class="form-control">
            </div>
            @else
            <?php $durasi1 = abs($durasi) ?>
            <div class="form-group">
                <label for="">Durasi / Hari</label>
                <input type="text" name="durasi" id="" value="{{ number_format($durasi1) }}" class="form-control">
            </div>
        @endif

        @if ($durasi == -5)
            <div class="form-group">
                <label for="">Denda</label>
                <input type="hidden" name="denda" class="form-control" value="0">
            </div>
            @elseif ($durasi < -7)
            <?php $denda = abs($durasi2) * 1000 ; ?>
            <div class="form-group">
                <label for="">Denda</label>
                <input type="text" name="denda" id="" value="{{ number_format($denda) }}" class="form-control">
            </div>
            @else
            
        @endif
        <div class="form-group">
            <label for="">Jumlah pinjam</label>
            <input type="text" name="jumlah_pinjam" value="{{$pengembalian->jumlah_pinjam}}" id="" class="form-control">
        </div>

        <button type="submit" class="btn btn-info">Kembalikan Buku</button>
    </form>
</div>
@endsection