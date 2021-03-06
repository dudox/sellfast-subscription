@extends('layouts.app')
@section('title', 'Choose a plan')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb mt-2">
        <div class="row justify-content-center">
            <img src="{{asset('img/logo.png')}}" width="80px" height="80px" alt="">
        </div>
    </nav>
    <style>
        .blink {
            animation: arrow 1.2s infinite !important;

        }

        @keyframes arrow {
            0% {
                display: none !important;
            }

            50% {

                display: block !important;
            }

            90% {
                opacity: none !important;
            }
        }

    </style>
    <div class="row justify-content-center">
        <div class="col-md-10 mb-2">
            <div class="">
                <div class="card-b">
                    <h4 class="text-center mb-2 mt-2">Choose a plan</h4>
                    <p class="text-dark text-center mb-2 pb-2">Select the right plan to advertise your products or services on our Instagram page.</p>
                    <div class="container px-0">
                        <div class="row">

                            {{-- <div class="col-md-6 stretch-card grid-margin grid-margin-md-0 mt-0">
                                <div class="card   shadow-sm border-0">
                                    <div class="card-body">
                                        <a href="{{ route('subscription') }}" class="btn btn-warning btn-block mt-4 py-3 text-uppercase d-flex"><span class="ml-auto pl-4 text-center mt-2 font-weight-bolder">Starter pack ( Online Payment )</span> <span class="ml-auto blink" data-feather="arrow-right-circle"></span></a>
                                        <i data-feather="star" class="text-warning icon-xxl d-block mx-auto my-3"></i>
                                        <h3 class="text-center font-weight-light mb-3">&#x20A6;1000.00</h3>
                                        <p class="text-dark text-center mb-2 font-weight-bolder">per month</p>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>You get two advert post</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>Your advert remain on our page for <span class="font-weight-bolder"> 14 days </span></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>You enjoy one instagram story</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>We let you know when customers request for price if you were not tagged</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>High conversion rate</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                                <div class="card card  shadow-sm">
                                    <div class="card-body">
                                        <h4 class="text-center mb-0">Premium pack</h4>
                                        <p class="text-center">Bank Transfer Only</p>
                                        <i data-feather="award" class="text-warning icon-xxl d-block mx-auto my-3"></i>
                                        <h3 class="text-center font-weight-light mb-3"><sup>&#x20A6;</sup> 1500.00</h3>
                                        {{-- <p class="text-dark text-center mb-2 font-weight-bolder">per month</p> --}}
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>You get two advert post for <span class="font-weight-bolder">30 days</span></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>Your advert remain on our page for <span class="font-weight-bolder">30 days</span></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>You enjoy one instagram story</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>We let you know when customers request for price if you were not tagged</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-warning mr-2"></i>
                                            <p>High conversion rate</p>
                                        </div>
                                        <a href="{{ route('starterpack') }}" class="btn btn-danger btn-block mt-4 py-3 text-uppercase d-flex"><span class="ml-auto pl-4 text-center mt-2 font-weight-bolder"> Choose plan</span> <span class="ml-auto blink" data-feather="arrow-right-circle"></span></a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                                <div class="card card  shadow-sm">
                                    <div class="card-body">
                                        <h4 class="text-center mb-0">VIP pack</h4>
                                        <p class="text-center">Bank Transfer Only</p>
                                        <i data-feather="award" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                        <h3 class="text-center font-weight-light mb-3"><sup>&#x20A6;</sup> 2000.00</h3>
                                        {{-- <p class="text-dark text-center mb-2 font-weight-bolder">per month</p> --}}
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-success mr-2"></i>
                                            <p>You get four advert post per month for <span class="font-weight-bolder">60 days</span></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-success mr-2"></i>
                                            <p>Your advert remain on our page for <span class="font-weight-bolder">60 days</span></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-success mr-2"></i>
                                            <p>You enjoy four instagram story  for <span class="font-weight-bolder">60 days</span></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-success mr-2"></i>
                                            <p>We let you know when customers request for price if you were not tagged</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-success mr-2"></i>
                                            <p>High conversion rate</p>
                                        </div>
                                        <a href="{{ route('smartonline') }}" class="btn btn-success btn-block mt-4 py-3 text-uppercase d-flex"><span class="ml-auto pl-4 text-center mt-2 font-weight-bolder">Choose plan</span> <span class="ml-auto blink" data-feather="arrow-right-circle"></span></a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card grid-margin grid-margin-0 mb-0">
                                <div class="card card  shadow-sm mb-0">
                                    <div class="card-body mb-0">
                                        <h4 class="text-center mb-0">Basic pack</h4>
                                        <p class="text-center">Bank Transfer Only</p>
                                        <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                        <h3 class="text-center font-weight-light mb-3"><sup>&#x20A6;</sup> 500.00</h3>
                                        {{-- <p class="text-dark text-center mb-2 font-weight-bolder">per month</p> --}}
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                                            <p>You get only one advert post </p>
                                        </div>
                                        <div class="d-flex align-items-center mb-">
                                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                                            <p>Your advert remain on page for <span class="font-weight-bolder">1 day</span></p>
                                        </div>
                                        <a href="{{ route('basic') }}" class="btn btn-primary btn-block mt-4 py-3 text-uppercase d-flex"><span class="ml-auto pl-4 text-center mt-2 font-weight-bolder">Choose plan</span> <span class="ml-auto blink" data-feather="arrow-right-circle"></span></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- partial:../../partials/_footer.html -->

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
