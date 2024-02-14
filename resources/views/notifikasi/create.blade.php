@extends('layouts.app')

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card border-0">
            <div class="card-body">
                <div class="alert alert-info" role="alert">
                    Informasi Notifikasi Sms
                </div>
                <form action="{{route('notifikasi.denda', $borrowing->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="username" value="{{$borrowing->user->name}}" class="form-control" >
                    </div>
                        <?php
                            $datetime2 = strtotime($borrowing->tgl_kembali) ;
                            $datenow = strtotime($borrowing->tgl_pinjam);
                            $durasi = ($datenow - $datetime2) / 86400 ;
                            $durasi2 = ($durasi) + 7;
                        ?>

                        @if ($durasi < -12) <?php $denda = 5000 ; ?>
                            <div class="form-group">
                                <label for="">Denda</label>
                                <input type="text" name="denda" class=form-control value="{{$denda}}"  id="">
                            </div>
                            @elseif ($durasi < -7)
                            <?php $denda = abs($durasi2) * 1000 ; ?> {{ $denda }}
                            @else
                            0
                        @endif
                        @if ($durasi < -7 )
                                <span class="text-danger">
                                    Durasi Habis / {{ $durasi2 }} Hari
                                </span>
                            @else
                            <?php $durasi1 = abs($durasi) ?> {{ $durasi1 }} Hari
                        @endif
                        <div>
                            <button type="submit" class="btn btn-info">Send Denda</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection