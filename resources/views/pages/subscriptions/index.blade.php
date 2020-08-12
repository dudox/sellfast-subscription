
@extends('layouts.app')

@section('contents')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="row justify-content-center mt-2">
                <img src="{{asset('img/logo.png')}}" style="width: 50px; height: 50px" alt="">
            </div>
            <div class="col-md-12 text-center">
                <h4 class="text-uppercase font-weight-bolder mt-3">
                    payment for instagram advert
                </h4>
            </div>


            <h5 class="text-uppercase">1. Select your payment method</h5>
            <div class="d-flex">
                <a class="col shadow-sm py-2 text-center option " data-type="credit card"  rel="#card">
                    <div class="icon text-center">
                        <i class="fa fa-credit-card fa-3x font-weight-light" aria-hidden="true"></i>
                    </div>
                    <div class=" text-center ">
                        <p class="param">CARD PAYMENT</p>
                    </div>
                </a>
                {{-- <a class="col shadow-sm py-2 text-center option" data-type="bank transfer" rel="#bank" >
                    <div class="icon text-center">
                        <i class="fa fa-bank fa-3x" aria-hidden="true"></i>
                    </div>
                    <div class="param text-center ">BANK TRANSFER</div>
                </a> --}}
                {{-- <a class="col shadow py-2 text-center option">
                    <div class="icon text-center">
                        <i class="fa fa-hashtag fa-lg" aria-hidden="true"></i>
                    </div>
                    <div class="param text-center ">USSD</div>
                </a> --}}
            </div>
            <hr class="shadow-lg">
            <div class="d-flex shadow-sm selected-results my-2">

                <label class="my-2 text-uppercase" style="font-size: 13px"><i class="fa fa-check-circle-o text-success" aria-hidden="true"></i> <span class="font-weight-bolder">Method:</span> <span class="type"></span></label>
            </div>
            <header class="credit tab_contents" id="card">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('img/sample3.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-12" style="margin-top: -120px">
                        <h5 class="mb-3">2. REQUIRED INFORMATION </h5>
                        <form method="POST" class="mt-2" id="bank" action="{{ route('flutterwave') }}" data-type="card">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-user-o"></i> FULL NAME</label>
                                    <input type="text" name="fullname" class="form-control bg-gray" placeholder="" value="" required>
                                </div>
                                {{-- <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-envelope"></i> EMAIL ADDRESS</label>
                                    <input type="text" name="email_address" class="form-control bg-gray" required>
                                </div> --}}
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-phone"></i> PHONE NUMBER</label>
                                    <input type="text" name="phone" class="form-control bg-gray" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-instagram"></i> INSTAGRAM NAME / HANDLE</label>
                                    <input type="text" name="username" class="form-control bg-gray" required>
                                </div>
                            </div>
                            <div class="d-flex align-items-bottom">
                                <div class="">
                                    <div class="badge badge-white text-uppercase">Total Amount</div><br/>
                                    <label class="" style="font-size: 30px">$ 500.00</label>
                                </div>
                                <button type="submit" class="btn ml-auto button text-center py-2 px-5 border-0">CONTINUE</button>
                            </div>
                        </form>
                    </div>
                </div>

            </header>
            {{-- <header class="bank tab_contents" id="bank" style="display: none;">
                <div class="row">
                    <div class="col-6">
                        <img src="https://images.africanfinancials.com/ng-guaran-logo.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-6">

                        <label class="pt-2"><span class="font-weight-bold">BANK NAME:</span><br/> GUARANTEE TRUST</label>
                        <label><span class="font-weight-bold">ACCOUNT NUMBER:</span><br/> 0423982249</label>
                        <label><span class="font-weight-bold">ACCOUNT NAME:</span><br/> WORKPRIDE LIMITED</label>
                        <label style="font-size: 7px; color: #f26f24;" class="font-weight-bolder">POWERED BY SELLFAST.NG</label>
                    </div>
                    <div class="col-md-12">
                        <h5>2. PLEASE ENTER YOUR INFORMATION</h5>
                        <form method="" >
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-user-o"></i> ACCOUNT FULL NAME</label>
                                    <input type="text" class="form-control bg-gray" placeholder="" value="" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-bank"></i> BANK NAME</label>
                                    <select type="text" class="form-control " name="bank_name" id="bank">
                                        <option selected>Choose</option>
                                        <option value="access">Access Bank</option>
                                        <option value="citibank">Citibank</option>
                                        <option value="diamond">Diamond Bank</option>
                                        <option value="ecobank">Ecobank</option>
                                        <option value="fidelity">Fidelity Bank</option>
                                        <option value="fcmb">First City Monument Bank (FCMB)</option>
                                        <option value="fsdh">FSDH Merchant Bank</option>
                                        <option value="gtb">Guarantee Trust Bank (GTB)</option>
                                        <option value="heritage">Heritage Bank</option>
                                        <option value="Keystone">Keystone Bank</option>
                                        <option value="rand">Rand Merchant Bank</option>
                                        <option value="skye">Skye Bank</option>
                                        <option value="stanbic">Stanbic IBTC Bank</option>
                                        <option value="standard">Standard Chartered Bank</option>
                                        <option value="sterling">Sterling Bank</option>
                                        <option value="suntrust">Suntrust Bank</option>
                                        <option value="union">Union Bank</option>
                                        <option value="uba">United Bank for Africa (UBA)</option>
                                        <option value="unity">Unity Bank</option>
                                        <option value="wema">Wema Bank</option>
                                        <option value="zenith">Zenith Bank</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-phone"></i> PHONE NUMBER</label>
                                    <input type="text" class="form-control bg-gray" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-instagram"></i> INSTAGRAM NAME / HANDLE</label>
                                    <input type="text" class="form-control bg-gray" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-camera"></i> EVIDENCE OF PAYMENT</label>
                                    <input type="file" class="form-control bg-gray" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-end">
                                <div class="">
                                    <div class="badge badge-white text-uppercase">Total Amount</div><br/>
                                    <label class="" style="font-size: 30px">500.00</label>
                                </div>
                                <div class="ml-auto button text-center py-2 px-5 mb-4">CONTINUE <i class="fa fa-long-arrow-right"></i></div>
                            </div>
                        </form>
                    </div>
                </div>

            </header> --}}

        </div>
    </div>

@endsection

@section('scripts')
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    let logo = <?php json_encode(asset('img/logo.png')) ?>
   $(document).ready(function(){
    let tabs = $('a');
    let result = document.getElementsByTagName('header');
    $(tabs).on('click', function(e) {
        let type = e.currentTarget.dataset.type;
        var target = $(this.rel);
        $('.tab_contents').not(target).hide();
        $(this.rel +'.tab_contents').show();
        $('a.option.active').removeClass('active');
        $(this).addClass('active');
        $(this.rel).addClass('active');
        $('.type').html(type);

        $(this.rel+ ' form').on('submit', function(e){
            e.preventDefault();
            let type = e.currentTarget.dataset.type;
            var values = {};
            $.each($('form').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });
            if(type == "card"){
                makePayment(values);
                //console.log(values)
            }

        })
    });
   })

   function makePayment(e) {
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
      tx_ref: "hooli-tx-1920bbtyt",
      amount: 500,
      currency: "NGN",
      payment_options: "card",
      redirect_url: // specified redirect URL
        "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: e.email_address,
        phone_number: e.phone,
        name: e.fullname,
      },
      callback: function (data) {
        console.log(data);
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "Sellfast.ng Subscription",
        description: "Payment for items in cart",
        logo: logo,
      },
    });
  }





</script>
@endsection
