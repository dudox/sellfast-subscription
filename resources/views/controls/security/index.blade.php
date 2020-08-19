
@extends('layouts.dashboard')
@section('title', 'Change password')
@section('content')
<div class="page-content">
    <div class="row h-100 align-items-center justify-content-center ">
        <div class="col-md-5">
            @if($errors->any())
            <div class="alert alert-danger"><span data-feather="alert-triangle"></span> {{$errors->first()}}</div>
            @endif
            @if (\Session::has('message'))
                <div class="alert alert-success">
                   <span class="font-weight-bolder" data-feather="bell"></span> {!! \Session::get('message') !!}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Change password</h6>
                    <form class="forms-sample" method="POST" action="{{ route('control.password') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="text-muted">Your old password</label>
                            <input type="password" class="form-control" id="exampleInputUsername1" name="old" autocomplete="off" placeholder="old password" required>
                        </div>
                        <br>
                        <div class="form-group" class="text-muted">
                            <label for="exampleInputEmail1">Your new password</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" name="new" placeholder="new password" required>
                        </div>
                        <div class="form-group" class="text-muted">
                            <label for="exampleInputPassword1">Confirm your new password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="confirm" autocomplete="off" placeholder="confirm new password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
