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
            <h4>Rekap Peminjaman</h4>
        </u>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama peminjam</th>
                    <th>Judul</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Durasi</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengembalians as $get)
                    <tr>
                        <td>{{$get->user->name}}</td>
                        <td>{{$get->book->name}}</td>
                        <td>{{$get->tgl_pinjam}}</td>
                        <td>{{$get->tgl_kembali}}</td>
                        <td>{{$get->durasi}}</td>
                        <td>{{$get->denda}}</td>
                    </tr>
                    @empty

                @endforelse
            </tbody>
            <tr>
                <td colspan="5" class=>Jumlah pengembalian : {{count($pengembalians)}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection