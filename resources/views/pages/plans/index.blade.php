@extends('layouts.app')
@section('title', 'Choose a plan')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb mt-2">
        <div class="row justify-content-center">
            <img src="{{asset('img/logo.png')}}" width="80px" height="80px" alt="">
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-10 mb-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-2 mt-2">Choose a plan</h4>
                    <p class="text-muted text-center mb-2 pb-2">Choose the features and functionality your business need today. Easily to upgrade as your business grows.</p>
                    <div class="container px-0">
                        <div class="row">
                            <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center text-uppercase mt-3 mb-4 font-weight-light">SMART</h4>
                                        <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                        <h3 class="text-center font-weight-light">&#x20A6;600.00</h3>
                                        <p class="text-muted text-center mb-2 font-weight-light">per month</p>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                                            <p>You get two advert post every month</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                                            <p>Your advert remain on our page for 30 days</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                                            <p>You enjoy one instagram story every month</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                                            <p>We let you know when customers request for price if you were not tagged</p>
                                        </div>

                                        <a href="{{ route('subscription') }}" class="btn btn-primary btn-block mt-4 py-3 text-uppercase d-flex"><span class="mx-auto mt-2 font-weight-bolder">Start smart plan</span> <span class="ml-auto" data-feather="arrow-right-circle"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center text-uppercase mt-3 mb-4 font-weight-light">BASIC</h4>
                                        <i data-feather="gift" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                        <h3 class="text-center font-weight-light">&#x20A6;500.00</h3>
                                        <p class="text-muted text-center mb-2 font-weight-light">per month</p>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-danger mr-2"></i>
                                            <p>You get only one advert post </p>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i data-feather="check" class="icon-md text-danger mr-2"></i>
                                            <p>Your advert remain on page for 3 days</p>
                                        </div>
                                        <br><br><br><br>
                                        <a href="{{ route('basic') }}" class="btn btn-primary btn-block mt-4 py-3 text-uppercase d-flex"><span class="mx-auto mt-2 font-weight-bolder">Start basic plan</span> <span class="ml-auto" data-feather="arrow-right-circle"></span></a>
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
