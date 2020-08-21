
@extends('layouts.dashboard')
@section('title', 'Card payments')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Bank transfer history</h4>
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
            <li class="breadcrumb-item active" aria-current="page">Bank transfer</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Bank transfer payments</h6>
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
                                    <td>@if($item->status == "approved") <span class="badge badge-success">{{$item->status}}</span> @else <span class="badge badge-warning">{{$item->status}}</span> @endif</td>
                                    <td>
                                        {{date("d M, Y",strtotime($item->created_at))}}
                                    </td>
                                    <td>
                                        <form action="{{ route('control.search') }}" method="GET">
                                            @csrf
                                            <input type="hidden" name="data" value="{{ $item->token }}">
                                            <button type="submit" class="btn btn-primary btn-block btn-sm p-0" ><i class="link-icon" width="20" data-feather="arrow-right-circle" style="font-size: 1px !important"></i></button>
                                        </form>
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
@endsection

