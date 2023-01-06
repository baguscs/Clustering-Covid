@extends('dashboard.base')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah Data Sebaran</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="javascript::void(0);">Sebaran</a></li>
                        <li class="active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body card-block">
                <form action="" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Provinsi</label>
                                <select data-placeholder="Pilih Provinsi" class="standardSelect form-control" tabindex="1" required>
                                    <option selected disabled hidden></option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Dirawat</label>
                                <input type="number" min="0" placeholder="Jumlah Dirawat" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Terkonfirmasi</label>
                                <input type="number" min="0" placeholder="Jumlah Terkonfirmasi" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Sembuh</label>
                                <input type="number" min="0" placeholder="Jumlah Sembuh" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Meninggal</label>
                                <input type="number" min="0" placeholder="Jumlah Meninggal" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="float: right; margin-right: 2px">
                        <button type="submit" class="btn btn-success" style="margin-right: 10px">Tambah</button>
                        <button type="button" class="btn btn-danger">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('navSebaran')
    {{ $nav }}
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('vendors/chosen/chosen.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('vendors/chosen/chosen.jquery.min.js') }}"></script>

    <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endpush