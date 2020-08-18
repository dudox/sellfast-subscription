
@extends('layouts.dashboard')
@section('title', 'Not found')
@section('content')
<div class="page-content">
    <div class="row h-100 align-items-center justify-content-center ">
        <div class=" text-dark text-muted text-center">
            <h4 class="text-uppercase">No Username or Payment code Found</h4>
            <p>Please check the username or payment code and try again.</p>
            <button data-toggle="modal" data-target="#search" class="btn btn-dark px-5 mt-2"><span data-feather="search"></span> Search</button>
        </div>

    </div>
</div>
@endsection
