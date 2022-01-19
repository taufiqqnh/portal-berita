@extends('layouts.default')

@section('content')
<div class="bg-light p-5 rounded">
 
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            A fresh verification link has been sent to your email address.
        </div>
    @endif
    <div class="alert alert-danger" role="alert">	
        Kami sudah mengirimkan link verifikasi ke alamat email anda. 
        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="d-inline btn btn-link p-0">
                Kirim Ulang
            </button>.
        </form>
    </div>
</div>
@endsection