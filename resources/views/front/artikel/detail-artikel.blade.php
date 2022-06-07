@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-4">
            <div>
                <img src="{{asset('uploads/' .$artikel->image)}}" alt="" class="img-fluid">
            </div>
                <div class="detail-content mt-2 p-4">
                    <div class="detail-badge">
                        <a href="" class="badge bg-warning text-dark" style="text-decoration: none">{{$artikel->kategori->nama_kategori}}</a>
                        <a href="" class="badge bg-info text-dark" style="text-decoration: none">{{$artikel->users->name}}</a>
                        <a href="" class="badge bg-success text-dark" style="text-decoration: none">{{$artikel->created_at}}</a>
                    </div>
                        <h2>{{$artikel->judul}}</h2>
                    <div class="detail-desc">
                        <p>
                            {!!$artikel->desc!!}
                        </p>
                    </div>
                </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="detail-sidebar-iklan">
                @foreach ($iklanA as $row) 
                <h4>{{$row->judul_iklan}}</h4> 
                <hr>
                <a href="">
                    <img src="{{asset('uploads/' .$row->image)}}" width="350" alt="">
                </a>
                @endforeach
            </div>
            <div class="detail-sidebar-kategori">
                <h4 class="mt-4">Kategori</h4>
                <hr>
                @foreach ($kategori as $row)         
                <div class="sidebar-kategori d-flex flex-wrap">
                    <a href="" style="text-decoration: none;">
                        <p>{{$row->nama_kategori}}</p>
                    </a>
                    <p class="ml-auto text-right">
                        <span class="badge bg-dark">{{$row->artikel->count()}}</span>
                    </p>
                </div>
                @endforeach
            </div>
            
            <div class="detail-artikel-terbaru">
                <h4 class="mt-4">Artikel Terbaru</h4>
                <hr>
                @foreach ($postterbaru as $row)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('uploads/' .$row->image)}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{$row->judul}}</h5>
                          <a href="" class="badge bg-info text-dark" style="text-decoration: none">{{$row->users->name}}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach 
            </div>
        </div>
    </div>
</div>
@endsection