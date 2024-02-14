@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <b>
                    <h3>SMK AB
                        <br>
                        LURUS TERUS BELOK KANAN
                    </h3>
                    <hr>
                </P>
        </div>
        <div class="">
            <h4>Rekap peminjaman buku</h4>
            @if (request('tgl_awal'))
            <small>Dari tanggal {{ request('tgl_pinjam') }} sampai tanggal {{ request('tgl_akhir') }}</small>
            @endif
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama peminjam</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrowings as $borrowing)
                    <tr>
                        <td>{{$borrowing->first()->user->name}}</td>
                        <td>{{$borrowing->first()->book->name}}</td>
                        <td>{{$borrowing->first()->book->penerbit}}</td>
                        <td>{{$borrowing->tgl_pinjam}}</td>
                    </tr>
                    @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection