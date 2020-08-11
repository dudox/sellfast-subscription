@extends('layouts.app')


@section('contents')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="row  my-3 ml-1">
            <img src="{{asset('img/logo.png')}}" style="width: 70px" alt="">
        </div>
        {{-- <div class="row">
            <div class="col">
                <span class="numberCircle border-success text-success">1</span> <span class="font-weight-bold" style="font-size: 14px">&nbsp;&nbsp;&nbsp;Choose plan</span>
            </div>
            <div class="col">
                <span class="numberCircle text-muted">2</span> <span class="font-weight-bold text-muted" style="font-size: 14px">&nbsp;&nbsp;&nbsp;Payment</span>
            </div>

        </div> --}}

        <div class="row mt-3">
            <div class="col-md-12">
                <p class="font-weight-bolder mb-0" style="font-size: 19px">Choose a plan</p>
                <p class="text-muted">Flexible plans allows you to easily run your business ads with sellfast.ng</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background: #f8fafc; border-radius: 6px">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-empire fa-3x tempColor"></i>

                            </div>
                            <div class="col">
                                <p class="font-weight-bolder p-0 m-0" style="font-size: 14px">Basic Plan</p>
                                <p class="p-0 m-0"><sup style="font-size: 20px" class="text-muted">&#8358;</sup> <span class="tempColor font-weight-bold" style="font-size: 26px">500.00</span> <sub class="text-muted">/ month</sub></p>
                            </div>
                        </div>
                        <hr>
                        <ul>
                            <li><i class="fa fa-check tempColor font-weight-bolder"></i> &nbsp;&nbsp;Promote your  <span class="font-weight-bold">business brand</span></li>
                            <li><i class="fa fa-check tempColor font-weight-bolder"></i> &nbsp;&nbsp;1 business banner <span class="font-weight-bold">promotion</span></li>
                            <li><i class="fa fa-check tempColor font-weight-bolder"></i> &nbsp;&nbsp;1 time payment <span class="font-weight-bold">charges</span></li>
                            <li><i class="fa fa-times text-danger font-weight-bolder"></i> &nbsp;&nbsp;<span class="font-weight-bold">Notification</span> supports reminder</li>

                        </ul>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <a href="{{ route('basic') }}" class="btn btn-success btn-block py-3 font-weight-bolder">Choose Basic Plan <i class="fa fa-long-arrow-right ml-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12">
                <div class="card" style="background: #f8fafc; border-radius: 6px">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-connectdevelop fa-3x tempColor"></i>

                            </div>
                            <div class="col">
                                <p class="font-weight-bolder p-0 m-0" style="font-size: 14px">Subscription Plan</p>
                                <p class="p-0 m-0"><sup style="font-size: 20px" class="text-muted">&#8358;</sup> <span class="tempColor font-weight-bold" style="font-size: 26px">500</span> <sub class="text-muted">/ month</sub></p>
                            </div>
                            <div class="ml-auto">
                                <span class="badge badge-dark badge-pill" style="font-size: 8px">POPULAR <i class="fa fa-check-circle-o tempColor"></i></span>
                            </div>
                        </div>
                        <hr>
                        <ul>
                            <li><i class="fa fa-check tempColor font-weight-bolder"></i> &nbsp;&nbsp;Promote your  <span class="font-weight-bold">business brand</span></li>
                            <li><i class="fa fa-check tempColor font-weight-bolder"></i> &nbsp;&nbsp;2 business banner <span class="font-weight-bold">promotion</span></li>
                            <li><i class="fa fa-check tempColor font-weight-bolder"></i> &nbsp;&nbsp;1 time payment <span class="font-weight-bold">charges</span></li>
                            <li><i class="fa fa-check tempColor font-weight-bolder"></i> &nbsp;&nbsp;<span class="font-weight-bold">Notification</span> supports reminder</li>
                        </ul>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <a href="" class="btn btn-success btn-block py-3 font-weight-bolder">Choose Basic Plan <i class="fa fa-long-arrow-right ml-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="font-weight-bolder">Powered by WorkPride</p>
            </div>
        </div>




    </div>
</div>
@endsection

@section('scripts')

@endsection
