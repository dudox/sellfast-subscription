
@extends('layouts.app')
@section('title','Smart plan')
@section('content')
<style>
    .form-error {
        color: #ff3366;
    }
</style>
   <div class="page-content">

        <div class="row justify-content-center">
            <div class="d-flex justify-content-center align-items-center my-3 col-md-9">
                <a href="{{ route('plans') }}" class="text-dark">
                    <span data-feather="arrow-left-circle"></span><span style="font-size: 15px" class="mt-1"> Choose plans</span>
                </a>
                <div class="ml-auto">
                    <img src="{{asset('img/logo.png')}}" width="50px" height="50px" alt="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-md-4 col-xl-3 left-wrapper mt-2">
                <div class="card shadow-sm border-0 ">
                    <div class="card-body">
                        {{-- <div class="d-flex align-items-center ">
                            <h6 class="card-title mb-0 text-dark">CARD PAYMENT</h6>
                        </div> --}}
                        <p style="font-size: 17px " class="text-center">HOW TO PAY WITH CARD</p>
                        <img src="{{ asset('img/sample3.png') }}" class="img-fluid">
                        <p class="text-danger text-center">Note: Your bank will ask you to confirm transaction with an OTP SMS</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card mt-2">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="mb-2 text-danger text-center" style="font-size: 12px">ENTER REQUIRED INFORMATION TO PROCEED</h6>
                        <form class="forms-sample" id="form" method="POST" action="{{route('flutterwave')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1"> Full Name</label>
                                <input type="text" class="form-control bg-light border-0 text-dark"  id="exampleInputUsername1" name="name" autocomplete="off" placeholder="" data-validation="required" data-validation-error-msg="Full name is required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Phone number</label>
                                <input type="text" class="form-control bg-light border-0 text-dark" id="exampleInputEmail1" name="phone" placeholder="" data-validation="required" data-validation-error-msg="Phone number is required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Instagram name / handle</label>
                                <input type="text" class="form-control bg-light border-0 text-dark" name="username_confirmation" data-validation="required"   placeholder="" data-validation-error-msg="Instagram name / handle is required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Confirm instagram name / handle</label>
                                <input type="text" class="form-control bg-light border-0 text-dark"  name="username" data-validation="confirmation" placeholder="" data-validation-error-msg="Instagram name / handle does not match<br/>Ensure there is no space after typing your handle">
                                <input type="hidden" class="form-control" name="plan_id" value="2">
                            </div>
                            <div class="form-check form-check-flat form-check-primary d-flex">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"  required>

                                </label>
                                <a href="#" data-toggle="modal" data-target="#terms">Terms and conditions</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block py-3 mr-2">Continue  <div id="spinner"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div id="terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content bg-white text-dark">
               <div class="modal-body">
                   <h5 class="text-center">Terms and conditions</h5>
                   <br>
                   <p><span class="badge badge-dark">1</span> You get two advert post every month</p>
                   <p><span class="badge badge-dark">2</span> Your advert remain on our page for 30 days</p>
                   <p><span class="badge badge-dark">3</span> You enjoy one instagram story every month</p>
                   <p><span class="badge badge-dark">4</span> High conversion rate</p>
                   <p><span class="badge badge-dark">5</span> We alert you to respond to customers who request for price if you were not tagged when they asked</p>
                   <p><span class="badge badge-dark">6</span> You get billed N700 every month to enjoy 1,2,3,4,5 above</p>
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
   let opts = {
        lines: 13,
        length: 11,
        width: 7,
        radius: 42,
        scale: .5,
        corners: 1,
        color: '#FFF',
        opacity: 0.25,
        rotate: 0,
        direction: 1,
        speed: 1,
        trail: 60,
        fps: 20,
        zIndex: 2e9,
        className: 'spinner',
        top: '50%',
        left: '50%',
        shadow: true,
        hwaccel: false,
        position: 'absolute',
    },
    target = document.getElementById('spinner'),
    spinner = new Spinner(opts);
    $.validate({
        modules: 'security',
        onSuccess: function($form){
            let _data = new FormData(document.getElementById('form'));
            $.ajax({
                type: 'post',
                url: $("#form").attr('action'),
                data: _data,
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('button.btn').attr("disabled","disabled");
                    $('button.btn').html("Processing. Please be patient");
                    spinner.spin(target);
                },
                success: function(res){
                    spinner.stop(target);
                    $('main').html(res.message);
                    payWithRave(res);
                }
            })

            return false;

        }


    })


    const API_publicKey = "FLWPUBK-f994141084671a0e0b40fe387e57527c-X";

    function payWithRave(e) {
        FlutterwaveCheckout({
            public_key: API_publicKey,
            tx_ref: e.token,
            amount: 1000,
            currency: "NGN",
            payment_method: "both",
            payment_plan:21672,
            // redirect_url: // specified redirect URL
            //     "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
            meta: {
                consumer_id: e.customer_id,
                consumer_mac: "92a3-912ba-1192a",
            },
            customer: {
                email: "info@sellfast.ng",
                phone_number: e.phone,
                name: e.name,
            },
            callback: function(data) {
                $.ajax({
                    type:'POST',
                    url: 'flutterwave/validate',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'customer_id':e.customer_id,
                        'plan_id':e.plan_id,
                        'payment_id':e.payment_id,
                        'phone':e.phone
                    },
                    success: function(tx){

                    }
                });
            },
            onclose: function() {
            },
            customizations: {
                title: "SellfastNG",
                description: "Smart Plan",
                logo: "https://payment.sellfast.ng/img/logo.png",
            },
        });
    }
</script>
@endsection
