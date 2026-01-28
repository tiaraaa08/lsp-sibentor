@extends('master')
@push('styles')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .card,
            .card * {
                visibility: visible;
            }

            .card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
@endpush
@section('title1', 'Laporan')
@section('title2', 'Laporan')
@section('content')
    <div class="wrap">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong class="card-title align-middle">Laporan Transaksi</strong>
                        </div>
                        <div class="col-4">
                            <div class="input-group float-end">
                                <span class="input-group-text" id="basic-addon1">Tampilkan</span>
                                <input type="date" class="form-control w-auto hariCetak" value="{{ request('tanggal') }}"
                                    onchange="filterTanggal(this.value)">
                                <button type="button" class="btn btn-success btn-sm" onclick="printTable()"></i>&nbsp;
                                    Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive" id="printTable">
                    <table id="laporanTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Harga Layanan</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->pelanggan->nama_pelanggan }}</td>
                                    <td>{{$t->layanan->nama_layanan}}</td>
                                    <td>Rp {{ number_format($t->layanan->harga_layanan, 0, ',', '.') }}</td>
                                    <td>{{ $t->tanggal_transaksi }}</td>
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
            $('#laporanTable').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data transaksi tidak tersedia pada waktu</span>'
                }
            });
        });

        function filterTanggal(tanggal) {
            if (tanggal === '') {
                window.location.href = "{{ route('laporan.main') }}";
            } else {
                window.location.href = `?tanggal=${tanggal}`;
            }
        }

        function printTable() {
            const printable = document.getElementById('printTable');
            const element = document.getElementById('laporanTable');
            const originalBody = document.body.innerHTML;

            document.body.innerHTML = printable.innerHTML;

            if (element) {
                element.id = '';
            }
            window.print();
            document.body.innerHTML = originalBody;
        }
    </script>
@endpush