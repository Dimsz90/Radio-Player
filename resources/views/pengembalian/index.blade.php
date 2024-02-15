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
    <td>
                        <a href="{{route('pengembalian.show')}}" class="btn btn-outline-info btn-sm" methode="post">history pengembalian Buku</a>
                    </td>
</div>

@endsection
