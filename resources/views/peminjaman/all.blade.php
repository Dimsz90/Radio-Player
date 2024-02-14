@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <b>
                    <h3>SDN JATIMULYA 08
                        <br>
                        Jl.K.H.NOER ALI KALIMALANG, JATIMULYA, Kec. Tambun Selatan,
                    </h3>
                    <hr>
                </b>
            </P>
        </div>
        <u>
            <h4>Rekap laporan peminjaman buku</h4>
        </u>
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