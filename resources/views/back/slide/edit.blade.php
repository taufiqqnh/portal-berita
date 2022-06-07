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
                    <div class="card-title">Edit Slide Banner <i>{{$slide -> judul_slide}}</i></div>
                    <a class="btn btn-warning btn-sm ml-auto" href="{{route('slide.index')}}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/slide/{{$slide->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="judul_slide" class="form-label">Judul Slide</label>
                    <input type="text" value="{{$slide->judul_slide}}" name="judul_slide" id="judul_slide" class="form-control">
                </div>
                <div class="form-group">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" value="{{$slide->link}}" name="link" id="link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file"  name="image"  class="form-control">
                    <br>
                    <label for="image" class="form-label">Gambar saat ini</label> <br>
                    <img src="{{asset('uploads/'.$slide->image)}}" width="100">
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{$slide->status == '1' ? 'selected' : ''}}>Publish</option>
                        <option value="0" {{$slide->status == '0' ? 'selected' : ''}}>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit" >Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push("script")
<script>
      $('.slide').addClass("active");
</script>
@endpush