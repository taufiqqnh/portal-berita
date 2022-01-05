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
                    <div class="card-title">My Profile</div>
                    <a class="btn btn-warning btn-sm ml-auto " href="{{route('profile.edit', Auth::user()->id)}}"><i class="far fa-edit"> Edit Profile</i></a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-primary">
                        {{Session('success')}}
                    </div>
                @endif
                    <form>
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" readonly value="{{ Auth::user()->name }}" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" readonly value="{{ Auth::user()->email }}" name="email" id="email" class="form-control">
                        </div>
                    </form>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection