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
                    <div class="card-title">Form Playlist</div>
                    <a class="btn btn-warning btn-sm ml-auto" href="{{route('playlist.index')}}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/playlist" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_playlist" class="form-label">Judul Playlist Video</label>
                    <input type="text" value="{{old('judul_playlist')}}" name="judul_playlist" id="judul_playlist" placeholder="Enter Judul" class="form-control">
                    @if ($errors->has('judul_playlist'))
                    <span class="text-danger">{{ $errors->first('judul_playlist') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea  value="{{old('desc')}}" name="desc" id="editor1" class="form-control"> </textarea>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file"  name="image"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                    <option value="1">Publish</option>
                    <option value="0">Draft</option>
                    </select>
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
      $('.playlist').addClass("active");
</script>
@endpush