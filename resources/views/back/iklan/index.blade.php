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
                    <div class="card-title">Data Iklan</div>
                    <a class="btn btn-primary btn-sm ml-auto" href="{{route('iklan.create')}}"><i class="fas fa-plus"></i> Create Iklan</a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-primary">
                        {{Session('success')}}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul Iklan</th>
                            <th>Link</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($iklan as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->judul_iklan}}</td>
                            <td>{{$row->link}}</td>
                            <td>
                                <img src="{{asset('uploads/'.$row->image)}}" width="100">
                            </td>
                            <td>
                                @if ($row->status == '1')
                                    Active
                                @else
                                    Draft
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm " href="{{route('iklan.edit', $row->id)}}"><i class="far fa-edit"></i></a>
                                <form action="/iklan/{{$row->id}}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Tidak Ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
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