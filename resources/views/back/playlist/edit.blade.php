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
                    <div class="card-title">Edit Playlist <i>{{$playlist -> judul_playlist}}</i></div>
                    <a class="btn btn-warning btn-sm ml-auto" href="{{route('playlist.index')}}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/playlist/{{$playlist->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="judul_playlist" class="form-label">Judul Playlist Video</label>
                    <input type="text" value="{{$playlist->judul_playlist}}" name="judul_playlist" id="judul_playlist" placeholder="Enter Judul" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea   name="desc" id="editor1" class="form-control"> {{$playlist->desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{$playlist->is_active == '1' ? 'selected' : ''}}>Publish</option>
                        <option value="0" {{$playlist->is_active == '0' ? 'selected' : ''}}>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar</label> 
                    <input type="file"  name="image"  class="form-control">
                    <br>
                    <label for="image" class="form-label">Gambar saat ini</label> <br>
                    <img src="{{asset('uploads/'.$playlist->image)}}" width="100">
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