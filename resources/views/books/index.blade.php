@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">
    	List Buku
    </li>
  </ol>
</nav>

@role('Admin')
	<div class="row">
	@if(session('error'))
<div class="alert alert-danger">
	{{ session('error')}}
</div>
@endif
		<div class="col-md-12">
			<div class="card border-0">
				<div class="card-body">
					<div class="alert alert-warning" role="alert">
						<h4>Data Buku</h4>
					</div>

					<div class="mt-3 mb-3">
						<a class="btn btn-info" href="{{route('books.create')}}">
							Tambah Stock Buku
						</a>
						<a class="btn btn-outline-secondary" href="{{route('books.rekap')}}">
							Rekap Semua Data Buku
						</a>
					</div>
					<table class="table table-striped">
						<tr>
							<th>Nama Buku</th>
							<th>Penerbit</th>
							<th>Tanggal Terbit</th>
							<th>Stock</th>
							<th>Action</th>
						</tr>
						@forelse($books as $book)
							<tr>
								<td>{{$book->name}}</td>
								<td>{{$book->penerbit}}</td>
								<td>{{$book->tanggal_terbit}}</td>
								<td>
									@if($book->stock <= 0)
										Stock buku habis
									@else
										{{$book->stock}}
									@endif
								</td>
								<td>
									<form type="hidden" method="post" action="{{route('books.destroy', $book->id)}}">
										@csrf
										@method('DELETE')
										<a href="{{route('books.edit', $book)}}" class="btn btn-warning btn-sm">Edit
										</a>
										<button type="submit" class="btn btn-danger btn-sm">
											Delete Buku
										</button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="6" class="text-center">
									Maaf stock buku belum tersedia
									Silahkan input stock buku
								</td>
							</tr>
						@endforelse
					</table>
				</div>
			</div>
		</div>
	</div>

@endrole
@role('Siswa')

	<div class="row">

		<div class="col-md-3">
			<ul class="list-group shadow-sm">
				<li class="list-group-item border-0 active">Rak Buku</li>
				@foreach($raks as $rak)
					<li class="list-group-item border-0 ">{{$rak->name}}</li>
				@endforeach
			</ul>
		</div>
		<div class="col-md-9">
			<div class="row">
			@forelse($books as $book)
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card border-0 mb-3">
            <div class="card-body">
			<img src="{{ asset('uploads/' . $book->images) }}" class="card-img-top" alt="...">

                <h3 class="font-weight-bold pt-3">{{$book->name}}</h3>
                <p class="text-muted">
                    {{$book->description}}
                </p>

                <p> Total stock : {{$book->stock}}</p>

                <div class="mt-3 mb-3">
                    <a href="{{route('peminjaman.create', $book->id)}}" class="btn btn-outline-info btn-block">
                        Pinjam buku
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <h1 class="text-center">Maaf List Buku belum tersedia</h1>
@endforelse
			</div>
			{{$books->links()}}
		</div>
	</div>
@endrole

@endsection
