@extends('layouts.app')


@section('contents')
<div class="row justify-content-center vh-100">
    <div class="col-md-5">
        <div class="row  my-3 ml-1">
            <img src="{{asset('img/logo.png')}}" style="width: 70px; height: 70px" alt="">
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <p class="font-weight-bolder mb-0" style="font-size: 19px">Choose a plan</p>
                <p class="text-muted">Flexible plans allows you to easily run your business ads with sellfast.ng</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 bg-back" data-link="{{ route('subscription') }}" >
                    <div class="card-body card2" style=" border-radius: 20px !important">
                        <div class="row text-white">
                            <div class="col-md-12">
                                <h4 class="mb-0 param">SMART PLAN</h4>
                                <p class="mt-0 mb-0 font-weight-bolder text-uppercase" style="font-size: 13px;">Get two adverts every month</p>
                                <p class="badge px-0 text-uppercase" style="font-size: 13px;">Enjoy one Insta Story every month</p>
                            </div>
                        </div>
                        <div class="d-flex mt-4 text-white align-items-end">
                            <div class="amount">
                                <h6 class="mb-0">TOTAL AMOUNT</h6>
                                <p class="mt-0 font-weight-bolder mb-0" style="font-size: 20px">NGN 500.00</p>
                            </div>
                            <div class="ml-auto justify-content-end">
                                <a  class="btn  rounded-pill text-white" style="font-size: 12px">PROCEED <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12">
                <div class="card border-0 bg-back" data-link="{{ route('basic') }}" >
                    <div class="card-body card1" style=" border-radius: 20px !important">
                        <div class="row text-white">
                            <div class="col-md-12">
                                <h4 class="param">BASIC PLAN</h4>
                                <p class="mt-0 font-weight-bolder text-uppercase" style="font-size: 13px;">Manage only one advert forever</p>
                            </div>
                        </div>
                        <div class="d-flex mt-4 text-white align-items-end">
                            <div class="amount">
                                <h6 class="mb-0">TOTAL AMOUNT</h6>
                                <p class="mt-0 font-weight-bolder mb-0" style="font-size: 20px">NGN 500.00</p>
                            </div>
                            <div class="ml-auto justify-content-end">
                                <a class="btn  rounded-pill text-white" style="font-size: 12px">PROCEED <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div style="position: absolute; width:100%; bottom: 5px" class="row mt-2">
            <div class="col-md-12 text-center">
                <p class="font-weight-bolder">Powered by WorkPride</p>
            </div>
        </div>

    </div>
</div>
<div id="basicTC" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Content</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.bg-back').on('click', function(e){
        if(e.currentTarget.dataset.link != undefined){
            window.location.href = e.currentTarget.dataset.link;
        }
    });
</script>
@endsection
