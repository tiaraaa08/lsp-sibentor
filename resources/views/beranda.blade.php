@extends('master')
@section('top-card')
    <div class="col-sm-4 col-lg-4">
        <div class="card text-white border border-primary border-top-0 bg-primary-subtle">
            <div class="card-body">
                <h3 class="mb-0">
                    <span class="count text-primary">{{$layanan}}</span>
                </h3>
                <h3 class="text-primary">Jumlah Layanan</h3>

            </div>

        </div>
    </div>
    <div class="col-sm-4 col-lg-4 px-3">
        <div class="card border text-success border-success border-top-0 bg-success-subtle">
            <div class="card-body">
                <h3 class="mb-0">
                    <span class="count">{{$pelanggan}}</span>
                </h3>
                <h3 class="">Jumlah Pelanggan</h3>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-lg-4">
        <div class="card text-warning border border-warning border-top-0 bg-warning-subtle">
            <div class="card-body">
                <h3 class="mb-0">
                    <span class="count">{{$transaksi->count()}}</span>
                </h3>
                <h3 class="">Transaksi Service</h3>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="wrap">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Transaksi Service Hari Ini</strong>
                </div>
                <div class="card-body table-responsive">
                    <table id="mainTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Pelanggan</th>
                                <th>Layanan Service</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->tanggal_transaksi }}</td>
                                    <td>{{$t->pelanggan->nama_pelanggan}}</td>
                                    <td>{{ $t->layanan->nama_layanan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#mainTable').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data transaksi tidak tersedia</span>'
                }
            });
        });
    </script>
@endpush