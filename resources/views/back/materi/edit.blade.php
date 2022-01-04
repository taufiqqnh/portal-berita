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
                    <div class="card-title">Edit Materi <i>{{$materi -> judul_materi}}</i></div>
                    <a class="btn btn-warning btn-sm ml-auto" href="{{route('materi.index')}}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/materi/{{$materi->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="judul_materi" class="form-label">Judul Materi Video</label>
                    <input type="text" value="{{$materi->judul_materi}}" name="judul_materi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="link" class="form-label">Link Video</label>
                    <input  value="{{$materi->link}}" name="link" id="link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea  name="desc" id="editor1" class="form-control">{{$materi->desc}} </textarea>
                </div>
                <div class="form-group">
                    <label for="playlist" class="form-label">Playlist</label>
                    <select name="playlist_id" class="form-control">
                        @foreach ($playlist as $row)
                        @if ($row->id == $materi->playlist_id)
                            <option value="{{$row->id}}" selected='selected'>{{$row->judul_playlist}}</option>
                            @else 
                            <option value="{{$row->id}}">{{$row->judul_playlist}}</option>     
                            @endif       
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{$materi->is_active == '1' ? 'selected' : ''}}>Publish</option>
                        <option value="0" {{$materi->is_active == '0' ? 'selected' : ''}}>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file"  name="image"  class="form-control">
                    <br>
                    <label for="image" class="form-label">Gambar saat ini</label> <br>
                    <img src="{{asset('uploads/'.$materi->image)}}" width="100">
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
      $('.materi').addClass("active");
</script>
@endpush