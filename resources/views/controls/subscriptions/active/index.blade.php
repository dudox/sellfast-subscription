
@extends('layouts.dashboard')
@section('title', 'Active subsscription ')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Active customers subscriptions</h4>
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
            <li class="breadcrumb-item"><a href="#">Active subscription</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lists</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">subscription Lists</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Subscription status</th>
                                    <th>Active plan</th>
                                    <th>Expire on</th>
                                    <th>Auto renewal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0;
                                @endphp
                                @if(count($subscriptions) > 0)
                                @foreach($subscriptions as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$item->customer->username}}</td>
                                    <td>
                                        <span class="badge badge-success px-3">
                                            {{$item->subscription_status}}
                                        </span>
                                    </td>
                                    <td>{{ ucfirst($item->plan->name ?? 'No ') }} plan</td>
                                    <td>@if(!empty($item->due_on)) {{date("D M, Y",strtotime($item->due_on))}} @else ... @endif</td>
                                    <td>{{$item->auto_renewal ?? '...'}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#options" data-subscriptionID="{{$item->id}}" class="btn btn-primary btn-block btn-sm p-0" ><i class="link-icon" width="20" data-feather="arrow-right-circle" style="font-size: 1px !important"></i></button>
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
<div id="options" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $("#options").on("show.bs.modal", function(e) {
            console.log(e.relatedTarget.dataset.subscriptionid);
        });
    </script>
@endsection
