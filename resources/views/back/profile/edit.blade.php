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
                    <div class="card-title">Edit Profile <i>{{ Auth::user()->name }}</i></div>
                    <a class="btn btn-warning btn-sm ml-auto" href="/profile">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('profile.update', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" value="{{ Auth::user()->name }}" name="name" id="name" class="form-control">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" value="{{ Auth::user()->email }}" name="email" id="email" class="form-control">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password"  name="password_confirmation" id="password_confirmation" class="form-control">
                    {{-- @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif --}}
                </div>
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