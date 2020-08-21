
@extends('layouts.dashboard')
@section('title', 'Customers phones')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Extracted phone numbers</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block" id="downloadPDF">
                <i class="btn-icon-prepend" data-feather="download"></i>
                Export to pdf
            </button>
            <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0" id="downloadEXCEL">
                <i class="btn-icon-prepend" data-feather="paperclip"></i>
                Export to excel
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" id="downloadCSV">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download handles csv
            </button>
        </div>
    </div>



    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Phone numbers</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Phone numbers</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0;
                                @endphp
                                @if(count($customers) > 0)
                                @foreach($customers as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$item->phone}}</td>
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
