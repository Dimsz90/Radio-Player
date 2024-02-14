@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Data Pengembalian Buku
        </li>
    </ol>
</nav>
<div class="card card-body border-0">
    <form action="{{route('pengembalian.periode')}}" class="mb-3" method="get">
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
                        <a href="{{route('pengembalian.all')}}" class="btn btn-secondary" >Rekap Seluruh Laporan</a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info">Cari laporan</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
<div class="card card-body border-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Buku</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Durasi Peminjaman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($borrowings as $borrowing)
                <tr>
                    <td>{{$borrowing->book->name}}</td>
                    <td>{{$borrowing->user->name}}</td>
                    <td>{{$borrowing->tgl_pinjam}}</td>
                    <td>{{$borrowing->tgl_kembali}}</td>
                    <td>
                        <?php
                            $datetime1 = strtotime($borrowing->tgl_pinjam);
                            $datetime2 = strtotime($borrowing->tgl_kembali);
                            $durasi = ($datetime2 - $datetime1) / 86400 ;
                          
                        ?>
                        @if ($durasi < 0)
                            Terlambat {{ abs($durasi) }} Hari
                        @else
                            {{ $durasi }} Hari
                        @endif
                    </td>
                    <td>
                        <a href="{{route('pengembalian.create', $borrowing->id)}}" class="btn btn-outline-info btn-sm">Kembalikan Buku</a>
                    </td>
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
