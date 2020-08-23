
@extends('layouts.app')
@section('title','Basic plan')
@section('content')

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
                <div class="card rounded   shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title text-dark mb-0">BANK TRANSFER</h6>
                        </div>
                        <p style="font-size: 12px">TRANSFER DETAILS FOR INSTAGRAM ADVERT (₦ 500.00 ONLY).</p>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Bank Name:</label>
                            <p class="text-dark">Guaranty Trust Bank</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Account Number:</label>
                            <p class="text-dark">0423982249</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Account Name:</label>
                            <p style="font-size: 12px" class="text-dark">WORKPRIDE LIMITED (OWNER OF SELLFAST.NG)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card mt-2">
                <div class="card  shadow-sm border-0">
                    <div class="card-body shadow-sm">
                        <h6 class="mb-2 text-danger" style="font-size: 12px">COMPLETE FORM BELOW AFTER MAKING TRANSFER</h6>
                        <form class="forms-sample" method="POST" action="{{route('basic.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1"> Instagram name / handle</label>
                                <input type="text" class="form-control bg-light border-0 text-dark" id="exampleInputUsername1" name="username" autocomplete="off" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Confirm instagram name / handle</label>
                                <input type="text" class="form-control bg-light border-0 text-dark" id="exampleInputEmail1" placeholder="Username" required>
                                <input type="hidden" class="form-control " name="plan_id" value="1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Phone number</label>
                                <input type="text" class="form-control bg-light border-0 text-dark" id="exampleInputEmail1" name="phone" placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Upload screenshot of payment</label>
                                <input type="file" class="form-control bg-light border-0 text-dark" id="exampleInputPassword1" name="proof" autocomplete="off" placeholder="Password">
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
    })
</script>
@endsection
