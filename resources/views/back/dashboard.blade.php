@extends('layouts.default')

@section('content')

<div class="panel-header bg-primary-gradient">
	{{-- @if (Session::has('success'))
	<div class="alert alert-primary">
		{{Session('success')}}
	</div>
	@endif --}}	
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Kami sudah mengirimkan link verifikasi ke alamat email anda.
            </div>
		@endif
		
		@if (auth()->user()->email_verified_at == null)
		<div class="alert alert-danger" role="alert">
			Email kamu belum terverifikasi. 
			<form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
				@csrf
				<button type="submit" class="d-inline btn btn-link p-0">
					Verifikasi
				</button>.
			</form>
		</div>
		@endif

	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				<h5 class="text-white op-7 mb-2">Admin Portal Berita</h5>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">User</p>
								<h4 class="card-title">{{$users->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="far fa-newspaper"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Article</p>
								<h4 class="card-title">{{$artikel->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-tags"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Kategori</p>
								<h4 class="card-title">{{$kategori->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-file-video"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Video</p>
								<h4 class="card-title">{{$materi->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card full-height h-100">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Materi Video</div>
					</div>
				</div>
			@forelse ($materivideo as $row)
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row g-0">
				  <div class="col-md-4">
					<img src="{{asset('uploads/' .$row->image)}}" class="img-fluid rounded-start"  alt="...">
				  </div>
				  <div class="col-md-8">
					<div class="card-body">
					  <h5 class="card-title">{{$row->judul_materi}}</h5>
					  <p class="card-text">{{ Str::limit(strip_tags($row->desc), 60) }}</p>
					</div>
				  </div>
				</div>
			  </div>
			  @empty
					<p>Data Masih Kosong</p>
			@endforelse
			{{-- <div class="card full-height h-100">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Materi Video</div>
					</div>
				</div>
					@forelse ($materivideo as $row)		
					<div class="card">
						<img src="{{asset('uploads/' .$row->image)}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">{{$row->judul_materi}}</h5>
						  <p class="card-text">{!!$row->desc!!}</p>
					</div>
					</div>
					@empty
					<p>Data Masih Kosong</p>
				   @endforelse
			</div> --}}
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height h-100">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Playlist Video</div>
					</div>
				</div>
			@forelse ($playlistvideo as $row)
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row g-0">
				  <div class="col-md-4">
					<img src="{{asset('uploads/' .$row->image)}}" class="img-fluid rounded-start"  alt="...">
				  </div>
				  <div class="col-md-8">
					<div class="card-body">
					  <h5 class="card-title">{{$row->judul_playlist}}</h5>
					  <p class="card-text">{{ Str::limit(strip_tags($row->desc), 60) }}</p>
					</div>
				  </div>
				</div>
			  </div>
			  @empty
					<p>Data Masih Kosong</p>
			@endforelse
			{{-- <div class="card full-height h-100">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Playlist Video</div>
					</div>
				</div>
			@forelse ($playlistvideo as $row)		
				<div class="card">
					<img src="{{asset('uploads/' .$row->image)}}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">{{$row->judul_playlist}}</h5>
                  	<p class="card-text">{!!$row->desc!!}</p>
				</div>
				</div>
				@empty
                <p>Data Masih Kosong</p>
           	@endforelse
			</div> --}}
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height h-100">
			<div class="card-header">
				<div class="card-head-row">
					<div class="card-title">Draft Artikel</div>
				</div>
			</div>
			@forelse ($postterbaru as $row)
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row g-0">
				  <div class="col-md-4">
					<img src="{{asset('uploads/' .$row->image)}}" class="img-fluid rounded-start"  alt="...">
				  </div>
				  <div class="col-md-8">
					<div class="card-body">
					  <h5 class="card-title">{{$row->judul}}</h5>
					  <p class="card-text">{{ Str::limit(strip_tags($row->desc), 60) }}</p>
					  <a href="" class="badge bg-warning text-dark" style="text-decoration: none">{{$row->kategori->nama_kategori}}</a>
					{{-- <a href="" class="badge bg-info text-dark" style="text-decoration: none">{{$row->users->name}}</a> --}}
					</div>
				  </div>
				</div>
			  </div>
			  @empty
					<p>Data Masih Kosong</p>
			@endforelse
			{{-- <div class="card full-height h-100">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Draft Artikel</div>
					</div>
				</div>
				@forelse ($postterbaru as $row)		
				<div class="card">
					<img src="{{asset('uploads/' .$row->image)}}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">{{$row->judul}}</h5>
					<p>{{ Str::limit(strip_tags($row->desc), 80) }}</p>
					<a href="" class="badge bg-warning text-dark" style="text-decoration: none">{{$row->kategori->nama_kategori}}</a>
					<a href="" class="badge bg-info text-dark" style="text-decoration: none">{{$row->users->name}}</a>
				</div>
				</div>
				@empty
                <p>Data Masih Kosong</p>
           	@endforelse
			</div> --}}
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card full-height h-100">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Artikel Terpopuler</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table-dark">
								<tr>
									<th>Judul</th>
									<th>Kategori</th>
									<th>Gambar</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($postterbaru as $row)
								<tr>
									<td>{{$row->judul}}</td>
									<td>{{$row->kategori->nama_kategori}}</td>
									<td>
										<img src="{{asset('uploads/'.$row->image)}}" width="100">
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="3" class="text-center">Data Tidak Ada</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push("script")
<script>
     $('.dashboard').addClass("active");
</script>
@endpush
