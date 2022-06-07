@extends('front.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 text-center fw-bold">Artikel Berita</h1>
        <hr>
        <div class="row justify-content-center">
            @forelse ($artikel_search as $row)
                <div class="col-md-4 mt-3">
                    <div class="card h-100">
                        <img src="{{ asset('uploads/' . $row->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('detail-artikel', $row->slug) }}" style="text-decoration: none">
                                    {{ $row->judul }}
                                </a>
                            </h5>
                            <p class="card-text">{{ Str::limit(strip_tags($row->desc), 100) }}</p>
                        </div>
                        {{-- <ul class="list-group list-group-flush">
                      <li class="list-group-item">An item</li>
                     <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        </ul> --}}
                        <div class="card-body">
                            <a href="{{ route('detail-artikel', $row->slug) }}" class="btn btn-primary btn-sm">Detail Berita</a>
                        </div>
                        <div class="card-body">
                            <a href="" class="badge bg-info text-dark"
                                style="text-decoration: none">{{ $row->users->name }}</a>
                            <a href="" class="badge bg-warning text-dark"
                                style="text-decoration: none">{{ $row->kategori->nama_kategori }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Data Masih Kosong</p>
            @endforelse
        </div>
    </div>
@endsection