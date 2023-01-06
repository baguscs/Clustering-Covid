@extends('dashboard.base')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="social-box treated">
            <i class="fa fa-wheelchair"></i>
            <ul>
                <li>
                    <span>DIRAWAT</span>
                </li>
                <li>
                    <span class="count">50</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->

    <div class="col-lg-3 col-md-6">
        <div class="social-box confirmed">
            <i class="fa fa-ambulance"></i>
            <ul>
                <li>
                    <span>KONFIRMASI</span>
                </li>
                <li>
                    <span class="count">450</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->

    <div class="col-lg-3 col-md-6">
        <div class="social-box healed">
            <i class="fa fa-users"></i>
            <ul>
                <li>
                    <span>SEMBUH</span>
                </li>
                <li>
                    <span class="count">250</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->

    <div class="col-lg-3 col-md-6">
        <div class="social-box die">
            <i class="fa fa-flag"></i>
            <ul>
                <li>
                    <span>MENINGGAL</span>
                </li>
                <li>
                    <span class="count">92</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->
@endsection
@push('navDashboard')
    {{ $nav }}
@endpush