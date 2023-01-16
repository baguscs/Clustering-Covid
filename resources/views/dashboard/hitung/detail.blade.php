@extends('dashboard.base')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Hasi Perhitungan Sebaran</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">Hasil Perhitungan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Iterasi dilakukan sebanyak : {{ $count }}</p>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>CLUSTER</th>
                                        <th>PROVINSI</th>
                                        <th>DIRAWAT</th>
                                        <th>TERKONFIRMASI</th>
                                        <th>SEMBUH</th>
                                        <th>MENINGGAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->cluster->name }}</td>
                                            <td>{{ $item->provinsi->name }}</td>
                                            <td>{{ $item->treated }}</td>
                                            <td>{{ $item->confirmation }}</td>
                                            <td>{{ $item->healed }}</td>
                                            <td>{{ $item->die }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p>Grafik Orang Terkonfirmasi Pada Cluster 1 (Zona Hijau)</p>
                            <canvas id="chartCluster1" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p>Grafik Orang Terkonfirmasi Pada Cluster 2 (Zona Kuning)</p>
                            <canvas id="chartCluster2" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Grafik Orang Terkonfirmasi Pada Cluster 3 (Zona Merah)</p>
                            <canvas id="chartCluster3" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('navResult')
    {{ $nav }}
@endpush
@push('css')
        <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        var cluster1 = document.getElementById('chartCluster1').getContext('2d');
        var cluster2 = document.getElementById('chartCluster2').getContext('2d');
        var cluster3 = document.getElementById('chartCluster3').getContext('2d');

        const backgroundColor = [
            '#FF8B13', '#820000', '#4E6C50', '#3D1766', '#0081B4', '#6C00FF',
            '#579BB1', '#3C2A21', '#227C70', '#6D67E4', '#C147E9', '#2A3990',
            '#285430', '#735F32', '#4FA095', '#7FBCD2', '#E3C770', '#553939', 
            '#6FEDD6', '#C55300', '#781C68', '#C21010', '#FFE898', '#31087B',
            '#0096FF', '#B2A4FF', '#A47E3B', '#1F4690', '#F37878', '#2146C7', 
            '#9A1663', '#00ABB3', '#FF6E31', '#B08BBB', '#F5EA5A', '#4E6C50', 
            '#6F1AB6', '#1687A7'
        ];

        new Chart(cluster1, {
            type: 'bar',
            data: {
                labels: {!!json_encode($provinsisC1)!!},
                datasets: [{
                    label: 'Jumlah terkonfirmasi',
                    data: {!!json_encode($resultC1)!!},
                    backgroundColor: backgroundColor,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        new Chart(cluster2, {
            type: 'bar',
            data: {
                labels: {!!json_encode($provinsisC2)!!},
                datasets: [{
                    label: 'Jumlah terkonfirmasi',
                    data: {!!json_encode($resultC2)!!},
                    backgroundColor: backgroundColor,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        new Chart(cluster3, {
            type: 'bar',
            data: {
                labels: {!!json_encode($provinsisC3)!!},
                datasets: [{
                    label: 'Jumlah terkonfirmasi',
                    data: {!!json_encode($resultC3)!!},
                    backgroundColor: backgroundColor,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
@endpush