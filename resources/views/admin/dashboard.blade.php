@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard Admin</div>
            <div class="card-body">
                Selamat datang di dasboard admin!
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message}}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection