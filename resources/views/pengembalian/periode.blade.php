@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Laporan Pengembalian
        </li>
    </ol>
</nav>

<div class="card card-body border-0">
    <form action="{{route('pengembalian.periode')}}" class="mb-3" method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Dari Tanggal</label>
                    <input type="date" name="tgl_awal" id="" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Dari Tanggal</label>
                    <input type="date" name="tgl_akhir" id="" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="mr-auto">
                        <a href="{{route('pengembalian.all')}}" class="btn btn-secondary">Rekap Seluruh Laporan</a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info">Cari laporan</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Buku</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Durasi Peminjaman</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengembalians as $pengembalian)
                <tr>
                    <td>{{$pengembalian->book->name}}</td>
                    <td>{{$pengembalian->user->name}}</td>
                    <td>{{$pengembalian->tgl_pinjm}}</td>
                    <td>{{$pengembalian->tgl_kembali}}</td>
                    <td>{{$pengembalian->durasi}} Hari</td>
                    <td>{{$pengembalian->denda}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Maaf data Pengembalian belum tersedia</td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>

@endsection