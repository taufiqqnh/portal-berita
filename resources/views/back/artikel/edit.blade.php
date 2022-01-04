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
                    <div class="card-title">Edit Artikel <i>{{$artikel -> judul}}</i></div>
                    <a class="btn btn-warning btn-sm ml-auto" href="{{route('artikel.index')}}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/artikel/{{$artikel->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" value="{{$artikel->judul}}" name="judul" id="judul" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea  value="{{$artikel->desc}}" name="desc" id="editor1" class="form-control">{{$artikel->desc}} </textarea>
                </div>
                <div class="form-group">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-control">
                        @foreach ($kategori as $row)
                            @if ($row->id == $artikel->kategori_id)
                            <option value="{{$row->id}}" selected='selected'>{{$row->nama_kategori}}</option>
                            @else 
                            <option value="{{$row->id}}">{{$row->nama_kategori}}</option>     
                            @endif
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                    <option value="1" {{$artikel->is_active == '1' ? 'selected' : ''}}>Publish</option>
                    <option value="0" {{$artikel->is_active == '0' ? 'selected' : ''}}>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar</label> 
                    <input type="file"  name="image"  class="form-control">
                    <br>
                    <label for="image" class="form-label">Gambar saat ini</label> <br>
                    <img src="{{asset('uploads/'.$artikel->image)}}" width="100">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit" >Save</button>
                    <button class="btn btn-danger btn-sm" type="reset" >Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push("script")
<script>
      $('.artikel').addClass("active");
</script>
@endpush