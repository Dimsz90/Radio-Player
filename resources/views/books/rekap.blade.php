@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h3>SDN JATIMULYA 08</h3>
            <p>Jl.K.H.NOER ALI KALIMALANG, JATIMULYA, Kec. Tambun Selatan</p>
            <hr>
        </div>
        <h4>Rekap laporan buku</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Nama Buku</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $buku)
                    <tr>
                        <td>{{$buku->category->first()->name}}</td>
                        <td>{{$buku->name}}</td>
                        <td>{{$buku->penerbit}}</td>
                        <td>{{$buku->tanggal_terbit}}</td>
                        <td>{{$buku->stock}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Jumlah buku: {{count($books)}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
