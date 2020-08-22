
@extends('layouts.app')
@section('title','Smart plan')
@section('content')

   <div class="page-content">

        <div class="row justify-content-center">
            <div class="d-flex justify-content-center align-items-center my-3 col-md-9">
                <a href="{{ route('plans') }}" class="text-light">
                    <span data-feather="arrow-left-circle"></span><span style="font-size: 15px" class="mt-1"> Choose plans</span>
                </a>
                <div class="ml-auto">
                    <img src="{{asset('img/logo.png')}}" width="50px" height="50px" alt="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-md-4 col-xl-3 left-wrapper mt-2">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title mb-0">CARD PAYMENTS</h6>
                        </div>
                        <p style="font-size: 12px">PAYMENT FOR INSTAGRAM ADVERT (₦ 600.00 ONLY).</p>
                        <img src="{{ asset('img/sample3.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card mt-2">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-danger" style="font-size: 12px">ENTER REQUIRED INFORMATION TO PROCEED</h6>
                        <form class="forms-sample" method="POST" action="{{route('flutterwave')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1"> Full Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name" autocomplete="off" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Phone number</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Instagram name / handle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username" required>
                                <input type="hidden" class="form-control" name="plan_id" value="1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Confirm instagram name / handle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
                                <input type="hidden" class="form-control" name="plan_id" value="2">
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"  required>
                                    Terms and conditions
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block py-3 mr-2">Continue  <div id="spinner"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>

@endsection

@section('scripts')
<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
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
    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            data: new FormData(this),
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
            }
        })
    });

    const API_publicKey = "FLWPUBK_TEST-a5438ff3183cc3619a0c946625eac5bd-X";

    function payWithRave(e) {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "trybemark@gmail.com",
            amount: 600,
            customer_phone: e.phone,
            customer_fullName: e.name,
            currency: "NGN",
            payment_method: "both",
            txref: "rave-123456",
            payment_plan: 6693,
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.data.txRef; // collect flwRef returned and pass to a                   server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.data.chargeResponseCode == "00" ||
                    response.data.chargeResponseCode == "0"
                ) {
                    // redirect to a success page
                } else {
                    // redirect to a failure page.
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>
@endsection
