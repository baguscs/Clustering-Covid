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
                    <span class="count">{{ number_format($treated, 2); }}</span>
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
                    <span class="count">{{ number_format($confirmation, 2); }}</span>
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
                    <span class="count">{{ number_format($healed, 2); }}</span>
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
                    <span class="count">{{ number_format($die, 2); }}</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Perkembangan Covid</h4>
                           <center>
                             <div class="flot-container">
                                <div id="flot-pie" class="flot-pie-container">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                           </center>
                        </div>
                    </div><!-- /# card -->
                </div><!-- /# column -->
            </div>
        </div>
    </div>
@endsection
@push('navDashboard')
    {{ $nav }}
@endpush
@push('js')
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
        labels: ['DIRAWAT', 'TERKONFIRMASI', 'SEMBUH', 'MENINGGAL'],
        datasets: [{
            label: 'Hasil Komulatif',
            data: [{{ $treated }}, {{ $confirmation }}, {{ $healed }}, {{ $die }}],
            borderWidth: 1
        }],
        backgroundColor: [
            '#FFC93C',
            '#D6E4E5',
            '#379237',
            '#CD0404',
        ],
        }
    });
   </script>
@endpush