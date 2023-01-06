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
                <form action="{{ route('sebaran.update', $sebaran->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Provinsi</label>
                                 <select name="provinsi_id" class="form-control" disabled>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}" {{ $sebaran->provinsi_id == $item->id ? 'selected': '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Dirawat</label>
                                <input type="number" min="0" name="treated" placeholder="Jumlah Dirawat" value="{{ $sebaran->treated }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Terkonfirmasi</label>
                                <input type="number" min="0" name="confirmation" placeholder="Jumlah Terkonfirmasi" value="{{ $sebaran->confirmation }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Sembuh</label>
                                <input type="number" min="0" name="healed" placeholder="Jumlah Sembuh" value="{{ $sebaran->healed }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class=" form-control-label">Meninggal</label>
                                <input type="number" min="0" name="die" placeholder="Jumlah Meninggal" value="{{ $sebaran->die }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="float: right; margin-right: 2px">
                        <button type="submit" class="btn btn-success" style="margin-right: 10px">Simpan</button>
                        <a type="button" href="{{ route('sebaran.index') }}" class="btn btn-danger">Batal</a>
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