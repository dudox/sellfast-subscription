@extends('layouts.dashboard')
@section('title','Invoice '.$payment->token)


@section('content')
<div class="page-content ">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Payment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
    </nav>

    <div class="row justify-content-center ">
        <div class="col-md-5 " id="content">
            @if(\Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong><span data-feather="bell" width="17px"></span></strong>  {!! \Session::get('message') !!}
            </div>

            <script>
              $(".alert").alert();
            </script>
            @endif
            <div class="card html-content">
                <div class="card-body ">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-5 pl-0">
                            <a href="#" class="noble-ui-logo logo-light d-block mt-3">Sellfast<span>NG</span></a>
                            <p class="mt-1 mb-1"><b>Sellfast.ng Invoice</b></p>
                            <p></p><br><br>
                            <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                            <p><span data-feather="user" width="15px"></span> {{$payment->customer->username}},<br> <span data-feather="phone" width="15px"></span> {{$payment->customer->phone}}</p>
                        </div>
                        <div class="col-lg-7 pr-0">
                            <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
                            <h6 class="text-right mb-5 pb-4"># INV-{{$payment->token}}</h6>
                            <p class="text-right mb-1">Amount Paid</p>
                            <h4 class="text-right font-weight-normal">@convert($payment->plans->amount)</h4>
                            <p class="mb-0 mt-4 text-right font-weight-normal mb-2"><span class="text-muted"> Date :</span> {{ date("d M, Y", strtotime($payment->created_at)) }}</p>
                            {{-- <h6 class="text-right font-weight-normal"><span class="text-muted">Due Date :</span> 12th Jul 2020</h6> --}}
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>PLAN</th>
                                        <th class="text-right">Validity</th>
                                        <th class="text-right">Unit cost</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-right">
                                        <td class="text-left">1</td>
                                        <td class="text-left">{{ucfirst($payment->plans->name)}}</td>
                                        <td>@if($payment->plans->validity != 3) 1 month @else 3 days @endif</td>
                                        <td>@convert($payment->plans->amount)</td>
                                        <td>
                                            @if($payment->status == 'approved')
                                            <span class="badge badge-success px-3">
                                                {{$payment->status}}
                                            </span>
                                            @else
                                            <span class="badge badge-warning px-3">
                                                {{$payment->status}}
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <div class="row">
                            <div class="col-md-6 ml-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-right">@convert($payment->plans->amount)</td>
                                            </tr>
                                            <tr>
                                                <td>TAX (0%)</td>
                                                <td class="text-right">@convert(0)</td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-800">Total</td>
                                                <td class="text-bold-800 text-right text-success">@convert($payment->plans->amount)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid w-100 mb-4 mr-5 pr-0">
                @if($payment->status == "pending")
                <form action="{{ route('control.payments.approve') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $payment->id }}">
                    <button type="submit" class="btn btn-primary float-right mt-4 ml-2"><i data-feather="check" class="mr-3 icon-md"></i>Approve payment</button>
                </form>
                @endif
                <a href="#" class="btn btn-outline-primary float-right mt-4" onclick="CreatePDFfromHTML()"><i data-feather="download" class="mr-2 icon-md"></i>Download Invoice</a>
                @if($payment->proof != null)
                <a href="#" data-target="#proof" data-toggle="modal" class="btn btn-light float-right mt-4 mr-2"><i data-feather="image" class="mr-2 icon-md"></i> Check proof</a>
                @endif
            </div>
        </div>
    </div>
</div>
<style>
    .modal-content {
        width: val()
    }
</style>
<div id="proof" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width: auto !important">
            <div class="modal-body p-2 m-0">
                <div class="">
                    <img src="{{ asset($payment->proof) }}" id="proofImage" class="img-fluid" alt="">
                </div>
                <button data-dismiss="modal" class="btn btn-primary mt-1 py-0 float-right"><span data-feather="x" width="15px"></span> close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script >
   function CreatePDFfromHTML() {
        var HTML_Width = $(".html-content").width();
        var HTML_Height = $(".html-content").height();
        var top_left_margin = 50;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($(".html-content")[0]).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save("Your_PDF_Name.pdf");
            // $(".html-content").hide();
        });
    }
</script>
@endsection
