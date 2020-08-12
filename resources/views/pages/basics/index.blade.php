
@extends('layouts.app')

@section('contents')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="d-flex p-2 align-items-center">
                <a href="{{ route('plans') }}" class="border py-1 px-4 m-0" style="border-radius: 5px">
                    <i class="fa fa-long-arrow-left fa-lg m-0 p-0  tempColor font-weight-light"></i>
                </a>
                <div class="ml-auto">
                    <img src="{{asset('img/logo.png')}}" style="width: 50px; height: 50px" alt="">                </div>
            </div>
            <div class="col-md-12 text-center">
                <h4 class="text-uppercase font-weight-bolder mt-3 " style="font-size: 9px">
                    transfer details for instagram advert (&#8358; 500.00 only)
                </h4>
            </div>
            {{-- <div class="d-flex">

                <a class="col shadow-sm py-2 text-center option active" data-type="bank transfer" rel="#bank" >
                    <div class="icon text-center">
                        <i class="fa fa-bank fa-3x" aria-hidden="true"></i>
                    </div>
                    <div class="param text-center ">BANK TRANSFER</div>
                </a>

            </div> --}}
            {{-- <hr class="shadow-lg">
            <div class="d-flex shadow-sm selected-results my-2">

                <label class="my-2 text-uppercase" style="font-size: 13px"><i class="fa fa-check-circle-o text-success" aria-hidden="true"></i> <span class="font-weight-bolder">Method:</span> Bank Transfer</label>
            </div> --}}

            <header class="bank tab_contents" id="bank" >
                <div class="row">
                    <div class="col-6">
                        <img src="https://images.africanfinancials.com/ng-guaran-logo.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-6">

                        <label class="pt-2"><span class="font-weight-bold">BANK NAME:</span><br/> GTBANK</label>
                        <label><span class="font-weight-bold">ACCOUNT NUMBER:</span><br/> 0423982249</label>
                        <label><span class="font-weight-bold">ACCOUNT NAME:</span><br/> WORKPRIDE LIMITED <span style="font-size: 7px" class="font-weight-bolder">(OWNER OF SELLFAST.NG)</span></label>
                    </div>
                    <div class="col-md-12">
                        <h5 class="mb-3 text-center text-danger font-weight-bolder" style="font-size: 8px">COMPLETE FORM BELOW AFTER MAKING TRANSFER</h5>
                        <form method="post" action="{{ route('basic.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-user-o"></i> ACCOUNT FULL NAME</label>
                                    <input type="text" class="form-control bg-gray" name="name" placeholder="" value="" required>
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
                                    <input type="text" class="form-control bg-gray" name="phone" required>
                                </div> --}}
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-instagram"></i> INSTAGRAM NAME / HANDLE</label>
                                    <input type="text" class="form-control bg-gray" name="username" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-instagram"></i> CONFIRM INSTAGRAM NAME / HANDLE</label>
                                    <input type="text" class="form-control bg-gray" name="username" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""><i class="fa fa-camera"></i> UPLOAD SCREENSHOT OF PAYMENT</label>
                                    <input type="file" class="form-control bg-gray" name="proof">
                                </div>
                            </div>
                            <div class="d-flex align-items-end">
                                {{-- <div class="mb-0">
                                    <div class="badge badge-white text-uppercase">Total Amount</div><br/>
                                    <label class="mb-0 tempColor" style="font-size: 30px; letter-spacing: 0px">&#8358; 500.00</label>
                                </div> --}}
                                <button type="submit" class="btn btn-success btn-block ml-auto  text-center px-4 mb-2 border-0">CONTINUE <i class="fa fa-long-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </header>
            <hr>
            <div class="row mt-2">
                <div class="col-md-12 text-center">
                    <p class="font-weight-bolder">Powered by WorkPride Limited</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var spinner = new jQuerySpinner({
        parentId: 'container'
    });
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
                spinner.show();
            },
            success: function(res){
                spinner.hide();
                $('main').html(res.message);
            }
        })
    })
</script>
@endsection
