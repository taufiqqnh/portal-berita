@extends('front.layouts.app')

@section('content')

      {{-- Slider --}}
      <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            @foreach ($slide as $key => $row)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
              <img src="{{asset('uploads/' .$row->image)}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <a href="{{$row->link}}" target="__blank" class="badge bg-warning text-dark" style="text-decoration: none">Klik disini</a>
              </div>        
            </div>           
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      {{-- EndSlider --}}

      {{-- Card Artikel --}}
  
      <div class="container" id="artikel">
      <h1 class="mt-4 text-center fw-bold">Artikel Berita</h1>
      <hr>
      <div class="row justify-content-center">
        @forelse ($artikel as $row)
        <div class="col-md-4 mt-3">
          <div class="card h-100">
            <img src="{{asset('uploads/' .$row->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title fw-bold">
                <a href="{{route('detail-artikel', $row->slug)}}" style="text-decoration: none">
                  {{$row->judul}}
                </a>
              </h5>
              <p class="card-text">{{ Str::limit(strip_tags($row->desc), 100) }}</p>
            </div>
            <div class="card-body">
              <a href="{{route('detail-artikel', $row->slug)}}" class="btn btn-primary btn-sm">Detail berita</a>
            </div>
            <div class="card-body">
              <a href="" class="badge bg-info text-dark" style="text-decoration: none">{{$row->users->name}}</a>
              <a href="/search?kategori={{$row->kategori->nama_kategori}}" class="badge bg-warning text-dark" style="text-decoration: none">{{$row->kategori->nama_kategori}}</a>
            </div>
          </div>
        </div>
        @empty
            <p>Data Masih Kosong</p>
        @endforelse
      </div>
    </div>

        {{-- Card Playlist--}}
        {{-- <div class="container">
          <h1 class="mt-4 text-center fw-bold">Playlist</h1>
          <hr>
          <div class="row justify-content-center">
              @forelse ($playlist as $row)
              <div class="col-sm-3">
                <div class="card h-100">
                  <img src="{{asset('uploads/' .$row->image)}}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{$row->judul_playlist}}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($row->desc), 100) }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              @empty
                  <p>Data Masih Kosong</p>
              @endforelse
          </div>
        </div> --}}

        {{-- Card Materi--}}
      {{-- <div class="container">
          <h1 class="mt-4 text-center fw-bold">Materi</h1>
          <hr>
          <div class="row justify-content-center">
          @forelse ($materi as $row)
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{asset('uploads/' .$row->image)}}" class="img-fluid img-thumbnail" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$row->judul_materi}}</h5>
                  <p class="card-text">{{ Str::limit(strip_tags($row->desc), 100) }}</p>
                  <p class="card-text"><small class="text-muted">{{$row->created_at}}</small></p>
                </div>
              </div>
            </div>
          </div>
          @empty
            <p>Data Masih Kosong</p>
          @endforelse
      </div> --}}
@endsection