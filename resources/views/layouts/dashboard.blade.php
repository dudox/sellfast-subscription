<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel='shortcut icon' type='image/png' sizes='32x32' href='{{asset('img/logo.png')}}'>
</head>

<body>
    <style>
        .buttons-csv, .buttons-pdf, .buttons-excel {
            display: none !important;
        }
    </style>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('dashboard') }}" class="sidebar-brand">
                    Sellfast<span>NG</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Details</li>
                    <li class="nav-item">

                        <a class="nav-link"  href="{{ route('customers') }}" >
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">Customers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.handles') }}"  class="nav-link">
                            <i class="link-icon" data-feather="instagram"></i>
                            <span class="link-title">Instagram handles</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('customers.phones') }}"  class="nav-link">
                            <i class="link-icon" data-feather="phone"></i>
                            <span class="link-title">Customers phone</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" data-toggle="modal" data-target="#search" class="nav-link">
                            <i class="link-icon" data-feather="search"></i>
                            <span class="link-title">Search</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Transactions</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('control.payments.card') }}">
                            <i class="link-icon" data-feather="square"></i>
                            <span class="link-title">Card payments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('control.payments.bank') }}">
                            <i class="link-icon" data-feather="home"></i>
                            <span class="link-title">Bank transfer</span>
                        </a>
                    </li>
                    <li class="nav-item"  >
                        <a class="nav-link" href="{{ route('control.payments.pending') }}">
                            <i class="link-icon" data-feather="stop-circle"></i>
                            <span class="link-title">Pending transactions</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Plans</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('control.subscription.active') }}">
                            <i class="link-icon" data-feather="zap"></i>
                            <span class="link-title">Active subscription</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('control.subscription.expired') }}">
                            <i class="link-icon" data-feather="zap-off"></i>
                            <span class="link-title">Expired subscription</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Security</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('control.password') }}">
                            <i class="link-icon" data-feather="lock"></i>
                            <span class="link-title">Change password</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="pages/apps/chat.html" class="nav-link">
                            <i class="link-icon" data-feather="message-square"></i>
                            <span class="link-title">Chat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/apps/calendar.html" class="nav-link">
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Transactions</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                            <i class="link-icon" data-feather="feather"></i>
                            <span class="link-title">UI Kit</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="uiComponents">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/badges.html" class="nav-link">Badges</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/breadcrumbs.html" class="nav-link">Breadcrumbs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/buttons.html" class="nav-link">Buttons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/button-group.html" class="nav-link">Button group</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/cards.html" class="nav-link">Cards</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/carousel.html" class="nav-link">Carousel</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/collapse.html" class="nav-link">Collapse</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/dropdowns.html" class="nav-link">Dropdowns</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/list-group.html" class="nav-link">List group</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/media-object.html" class="nav-link">Media object</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/modal.html" class="nav-link">Modal</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/navs.html" class="nav-link">Navs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/navbar.html" class="nav-link">Navbar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/pagination.html" class="nav-link">Pagination</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/popover.html" class="nav-link">Popovers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/progress.html" class="nav-link">Progress</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/scrollbar.html" class="nav-link">Scrollbar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/scrollspy.html" class="nav-link">Scrollspy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/spinners.html" class="nav-link">Spinners</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/ui-components/tooltips.html" class="nav-link">Tooltips</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="anchor"></i>
                            <span class="link-title">Advanced UI</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="advancedUI">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">Sweet Alert</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
                            <i class="link-icon" data-feather="inbox"></i>
                            <span class="link-title">Forms</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/forms/basic-elements.html" class="nav-link">Basic Elements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/forms/advanced-elements.html" class="nav-link">Advanced Elements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/forms/editors.html" class="nav-link">Editors</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/forms/wizard.html" class="nav-link">Wizard</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
                            <i class="link-icon" data-feather="pie-chart"></i>
                            <span class="link-title">Charts</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/charts/apex.html" class="nav-link">Apex</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/chartjs.html" class="nav-link">ChartJs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/flot.html" class="nav-link">Flot</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/morrisjs.html" class="nav-link">Morris</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/peity.html" class="nav-link">Peity</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/sparkline.html" class="nav-link">Sparkline</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
                            <i class="link-icon" data-feather="layout"></i>
                            <span class="link-title">Table</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/tables/basic-table.html" class="nav-link">Basic Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/tables/data-table.html" class="nav-link">Data Table</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
                            <i class="link-icon" data-feather="smile"></i>
                            <span class="link-title">Icons</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Pages</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
                            <i class="link-icon" data-feather="book"></i>
                            <span class="link-title">Special pages</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/faq.html" class="nav-link">Faq</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/profile.html" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
                            <i class="link-icon" data-feather="unlock"></i>
                            <span class="link-title">Authentication</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="authPages">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/auth/login.html" class="nav-link">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/auth/register.html" class="nav-link">Register</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
                            <i class="link-icon" data-feather="cloud-off"></i>
                            <span class="link-title">Error</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="errorPages">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/error/404.html" class="nav-link">404</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/error/500.html" class="nav-link">500</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Docs</li>
                    <li class="nav-item">
                        <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                            <i class="link-icon" data-feather="hash"></i>
                            <span class="link-title">Documentation</span>
                        </a>
                    </li> --}}

                </ul>
            </div>
        </nav>

        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <div class="theme-wrapper">
                    <h6 class="text-muted mb-2">Homepage</h6>
                    <a class="theme-item" href="{{ route('plans') }}">
                        <img src="{{asset('assets/images/screenshots/home.png')}}" alt="light theme">
                    </a>
                    <h6 class="text-muted mb-2">Dashboard:</h6>
                    <a class="theme-item active" href="{{ route('dashboard')}}">
                        <img src="{{asset('assets/images/screenshots/control.png')}}" alt="light theme">
                    </a>
                </div>
            </div>
        </nav>
        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <form class="search-form" method="GET" action="{{ route('control.search') }}">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="search"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="data" id="navbarForm" placeholder="Search here...">
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us" id="us"></i> <span class="font-weight-medium ml-1 mr-1">English</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-apps">
                            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="grid"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="appsDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">Apps Shortcuts</p>
                                </div>
                                <div class="dropdown-body">
                                    <div class="d-flex align-items-center apps">
                                        <a href="{{ route('dashboard') }}"><i data-feather="home" class="icon-lg"></i>
                                            <p>Dashboard</p>
                                        </a>
                                        <a href="{{ route('customers') }}"><i data-feather="users" class="icon-lg"></i>
                                            <p>Customers</p>
                                        </a>
                                        <a href="{{ route('customers.handles') }}"><i data-feather="instagram" class="icon-lg"></i>
                                            <p>Instagram</p>
                                        </a>
                                        <a data-toggle="modal" data-target="#search"><i data-feather="search" class="icon-lg"></i>
                                            <p>Search</p>
                                        </a>
                                    </div>
                                </div>
                                {{-- <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div> --}}
                            </div>
                        </li>
                        {{-- <li class="nav-item dropdown nav-messages">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="mail"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="messageDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">9 New Messages</p>
                                    <a href="javascript:;" class="text-muted">Clear all</a>
                                </div>
                                <div class="dropdown-body">
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="../assets/images/faces/face2.jpg" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Leonardo Payne</p>
                                                <p class="sub-text text-muted">2 min ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Project status</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="../assets/images/faces/face3.jpg" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Carl Henson</p>
                                                <p class="sub-text text-muted">30 min ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Client meeting</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="../assets/images/faces/face4.jpg" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Jensen Combs</p>
                                                <p class="sub-text text-muted">1 hrs ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Project updates</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="../assets/images/faces/face5.jpg" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Amiah Burton</p>
                                                <p class="sub-text text-muted">2 hrs ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Project deadline</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="../assets/images/faces/face6.jpg" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Yaretzi Mayo</p>
                                                <p class="sub-text text-muted">5 hr ago</p>
                                            </div>
                                            <p class="sub-text text-muted">New record</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-notifications">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i>
                                <div class="indicator">
                                    <div class="circle"></div>
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">6 New Notifications</p>
                                    <a href="javascript:;" class="text-muted">Clear all</a>
                                </div>
                                <div class="dropdown-body">
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="icon">
                                            <i data-feather="user-plus"></i>
                                        </div>
                                        <div class="content">
                                            <p>New customer registered</p>
                                            <p class="sub-text text-muted">2 sec ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="icon">
                                            <i data-feather="gift"></i>
                                        </div>
                                        <div class="content">
                                            <p>New Order Recieved</p>
                                            <p class="sub-text text-muted">30 min ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="icon">
                                            <i data-feather="alert-circle"></i>
                                        </div>
                                        <div class="content">
                                            <p>Server Limit Reached!</p>
                                            <p class="sub-text text-muted">1 hrs ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="icon">
                                            <i data-feather="layers"></i>
                                        </div>
                                        <div class="content">
                                            <p>Apps are ready for update</p>
                                            <p class="sub-text text-muted">5 hrs ago</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="icon">
                                            <i data-feather="download"></i>
                                        </div>
                                        <div class="content">
                                            <p>Download completed</p>
                                            <p class="sub-text text-muted">6 hrs ago</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png" alt="">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">{{Auth::user()->name}}</p>
                                        <p class="email text-muted mb-3">{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="{{ route('control.password') }}" class="nav-link">
                                                <i data-feather="key"></i>
                                                <span>Change password</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('logout') }}" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-apps">
                            <a class="nav-link " href="{{ route('logout') }}"  aria-haspopup="true" aria-expanded="false">
                                <i data-feather="power"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->
            @yield('content')
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright ?? 2020 <a href="https://workpride.net" target="_blank">Workpride</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">SellfastNG <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->
        </div>
    </div>

    <div id="search" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Search <i style="width: 15px" data-feather="instagram"></i> username / payment code</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('control.search') }}" method="GET">
                        @csrf
                        <input type="text" class="form-control form-control-lg" name="data" id="" required>
                        <button type="submit" class="btn btn-dark px-5 mt-2"><span data-feather="search"></span> Find</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{asset('assets/js/template.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/datepicker.js')}}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script>
        $(function() {
            'use strict';

            $(function() {
                var table =$('#dataTableExample').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',

                    },
                    {
                        extend: 'pdf',

                    },
                    {
                        extend: 'excel',

                    },


                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
                });

                $("#downloadCSV").on("click", function() {
                    table.button( '.buttons-csv' ).trigger();
                });
                $("#downloadEXCEL").on("click", function() {
                    table.button( '.buttons-excel' ).trigger();
                });
                $("#downloadPDF").on("click", function() {
                    table.button( '.buttons-pdf' ).trigger();
                });
                $('#dataTableExample').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');


                });

            });
        });


    </script>
    @yield('scripts')
</body>

</html>

