@extends('dashboard.base')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Hitung Sebaran</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">Hitung Sebaran</li>
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
                            <p class="textNote">Note:</p>
                            <ul class="detailNote">
                                <li>
                                    Data yang gunakan berasal dari data sebaran saat ini <a href="{{ route('sebaran.index') }}" class="linkData">Lihat Data</a>
                                </li>
                                <li>
                                    Terdapat 3 cluster yang akan digunakan, yaitu (Zona Hijau, Zona Kuning, dan Zona Merah)
                                </li>
                                <li>
                                    Nilai awal centroid setiap cluster akan pilih secara random dari data yang sudah ada
                                </li>
                            </ul>
                            <div class="button-action">
                                <a href="{{ route('detailResult') }}" class="btn btn-primary btn-count"><i class="fa fa-search"></i> Hitung</a>
                            </div>
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
    <style>
        .textNote{
            color: red;
        }
        .detailNote{
            margin-left: 20px;
            color: red;
        }
        .linkData{
            color: blue;
            text-decoration: underline;
        }
        .button-action{
            float: right;
        }
        .btn-count{
            border-radius: 10px;
            margin-right: 20px;
        }
    </style>
@endpush