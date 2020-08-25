<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sellfast - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/demo_2/style.css')}}">
        <link rel='shortcut icon' type='image/png' sizes='32x32' href='{{asset('img/logo.png')}}'>
    </head>


<body  >
    <style>
        body, .card {
            background: #fff !important;
            color: #000 !important
        }
        @keyframes spinner-line-fade-more {
  0%, 100% {
    opacity: 0; /* minimum opacity */
  }
  1% {
    opacity: 1;
  }
}

@keyframes spinner-line-fade-quick {
  0%, 39%, 100% {
    opacity: 0.25; /* minimum opacity */
  }
  40% {
    opacity: 1;
  }
}

@keyframes spinner-line-fade-default {
  0%, 100% {
    opacity: 0.22; /* minimum opacity */
  }
  1% {
    opacity: 1;
  }
}

@keyframes spinner-line-shrink {
  0%, 25%, 100% {
    /* minimum scale and opacity */
    transform: scale(0.5);
    opacity: 0.25;
  }
  26% {
    transform: scale(1);
    opacity: 1;
  }
}
.blink {
    animation: blink 1.2s infinite alternate;
}
@keyframes blink {
   from {
      opacity: 1;
   }
   to {
      opacity: 0;
   }
 }
    </style>
    <main class="container">
        <div class="page-wrapper" >
            @yield('content')
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://www.workpride.net" target="_blank">WorkPride Limited</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">SellfastNG <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
        </div>

    </main>

</body>
<div id="link" data-link="{{route('logout')}}"></div>
<script src="{{asset('assets/vendors/core/core.js')}}"></script>
<script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot.tooltip/0.9.0/jquery.flot.tooltip.min.js"></script>
<script src="https://www.flotcharts.org/flot/source/jquery.flot.categories.js"></script>
<script src="{{asset('assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/ja.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/datepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js"></script>



    @yield('scripts')
</html>
