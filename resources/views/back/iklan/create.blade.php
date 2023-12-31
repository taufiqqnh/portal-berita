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
                    <div class="card-title">Form Iklan</div>
                    <a class="btn btn-warning btn-sm ml-auto" href="{{route('iklan.index')}}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/iklan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_iklan" class="form-label">Judul Iklan</label>
                    <input type="text" value="{{old('judul_iklan')}}" name="judul_iklan" id="judul_iklan" class="form-control">
                    @if ($errors->has('judul_iklan'))
                    <span class="text-danger">{{ $errors->first('judul_iklan') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" value="{{old('link')}}" name="link" id="link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file"  name="image"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control">
                    <option value="1">Publish</option>
                    <option value="0">Draft</option>
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
      $('.iklan').addClass("active");
</script>
@endpush