@extends('layouts.app')


@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Cetak Kartu Anggota</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div>
                        <img src="{{asset('images/logo.png')}}" width="50" height="50" alt="">
                    </div>
                    <div class="mx-auto text-center">
                        <h6>KARTU PERPUSTAKAAN</h6>
                        <h4>SMK AB</h4>
                        <h6>Alamat Nanti sebelah sini</h6>
                    </div>
                </div>
                <div class="d-flex pt-3">
                    <div class="mr-3">
                        <h5 class="text-muted">Nama</h5>
                        <h5 class="text-muted">Nis</h5>
                        <h5 class="text-muted">Alamat</h5>
                        <h5 class="text-muted">E-mail</h5>
                        <h5 class="text-muted">No. Hp</h5>
                    </div>
                    <div>
                        <h5 class="text-muted">: {{$user->users->first()->name}}</h5>
                        <h5 class="text-muted">: {{$user->users->first()->nis}}</h5>
                        <h5 class="text-muted">: {{$user->users->first()->alamat}}</h5>
                        <h5 class="text-muted">: {{$user->users->first()->email}}</h5>
                        <h5 class="text-muted">: {{$user->users->first()->no_handphone}}</h5>
                    </div>
                    <div>
                        <a href="{{route('cetak.kartu',$user->id)}}" class="btn btn-danger">Cetak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection