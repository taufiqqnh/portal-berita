@extends('layouts.default')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			
		</div>
	</div>
</div> 
<div class="page-inner mt--5">
<div class="row">
    <div class="col-md-12">
        <div class="card full-height">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Edit Kategori <i>{{$kategori -> nama_kategori}}</i></div>
                    <a class="btn btn-warning btn-sm ml-auto" href="{{route('kategori.index')}}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/kategori/{{$kategori->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" value="{{$kategori->nama_kategori}}" name="nama_kategori" id="nama_kategori" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit" >Save Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection