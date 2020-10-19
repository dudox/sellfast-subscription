
@extends('layouts.dashboard')
@section('title', 'Card payments')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Pending transaction history</h4>
        </div>
        {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control">
            </div>
            <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
                <i class="btn-icon-prepend" data-feather="download"></i>
                Import
            </button>
            <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button>
        </div> --}}
    </div>



    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Payments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pending payments</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Pending payments</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Payment code</th>
                                    <th>Plan name</th>
                                    <th>Amount paid</th>
                                    <th>Payment status</th>
                                    <th>Payment date</th>
                                    <th>Proof</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0;
                                @endphp
                                @if(count($payments) > 0)
                                @foreach($payments as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$item->customer->username}}</td>
                                    <td>#{{$item->token}}</td>
                                    <td>{{ucfirst($item->plans->name ?? '')}} plan</td>
                                    <td>@convert($item->plans->amount ?? 0)</td>
                                    <td><span class="badge badge-warning px-3">{{$item->status}}</span></td>
                                    <td>
                                        {{date("d M, Y",strtotime($item->created_at))}}
                                    </td>
                                    <td>{!! $item->proof ? '<a id="checkProof" data-toggle="modal" data-target="#proof" data-image="'.$item->proof.'" href="#" ><i class="link-icon text-success" width="20" data-feather="image" style="font-size: 1px !important"></i></a>' : '' !!}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('control.search') }}" class="col" method="GET">
                                                @csrf
                                                <input type="hidden" name="data" value="{{ $item->token }}">
                                                <button type="submit" class="btn btn-primary btn-block btn-sm p-0" ><i class="link-icon" width="16" data-feather="arrow-right-circle" style="font-size: 1px !important"></i></button>
                                            </form>
                                            @if($item->status != "approved")
                                            <button data-id="{{$item->id}}" class="btn btn-success btn-block btn-sm p-0 col approve" ><i class="link-icon" width="16" data-feather="check-circle" style="font-size: 1px !important"></i></button>
                                            @endif
                                        </div>
                                     </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="proof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-fluid" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    let url = "{{url('/')}}/";
    $("#proof").on('show.bs.modal', function(e){
        $(this).find('img').attr("src",url+e.relatedTarget.dataset.image)
    })

    $(".approve").on('click', function(e){
        e.preventDefault();
        let _this = $(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('control.payments.approve') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id":e.currentTarget.dataset.id
            },
            success: function(tx){
                toastr.success('Payment has been approved');
                $(_this).closest('tr').fadeOut();

            },
        })

    })
</script>
@endsection
