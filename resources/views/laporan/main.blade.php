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
                            <strong class="align-middle card-title">Laporan Transaksi</strong>
                        </div>
                        <div class="col-4">
                            <div class="input-group float-end">
                                <span class="input-group-text" id="basic-addon1">Tampilkan</span>
                                <input type="date" class="w-auto form-control hariMulai" style="width:20px;" value="{{ request('hariMulai') }}"
                                    onchange="filterTanggal()">
                                <input type="date" class="w-auto form-control hariAkhir" style="width:20px;" value="{{ request('hariAkhir') }}"
                                    onchange="filterTanggal()">
                                <button type="button" class="btn btn-success btn-sm" onclick="printTable()"></i>Cetak</button>
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
                                    <td>{{ $t->layanan->nama_layanan }}</td>
                                    <td>Rp {{ number_format($t->layanan->harga_layanan, 0, ',', '.') }}</td>
                                    <td>{{ Carbon\carbon::parse($t->tanggal_transaksi)->translatedFormat('d F Y') }}</td>
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

        function filterTanggal() {
            const mulai = document.querySelector('.hariMulai')?.value;
            const akhir = document.querySelector('.hariAkhir')?.value;
            let params = [];

            if (mulai) params.push(`hariMulai=${mulai}`);
            if (akhir) params.push(`hariAkhir=${akhir}`);
            const query = params.length ? `?${params.join('&')}` : '';
            window.location.href = query;
        }

        function printTable() {
            const printable = document.getElementById('printTable');
            const originalBody = document.body.innerHTML;

            const table = $('#laporanTable').DataTable();
            table.destroy();

            const hariMulai = document.querySelector('.hariMulai')?.value;
            const hariAkhir = document.querySelector('.hariAkhir')?.value;
            let tanggal = 'Semua Tanggal';

            if (hariMulai && hariAkhir) {
                tanggal = `${hariMulai} sampai ${hariAkhir}`;
            } else if (hariMulai) {
                tanggal = `Mulai ${hariMulai}`;
            } else if (hariAkhir) {
                tanggal = `Sampai ${hariAkhir}`;
            }

            const kopSurat = `
                <div style="text-align:center; margin-bottom:20px;">
                    <h3 style="margin:0;">LAPORAN TRANSAKSI</h3>
                    <p style="margin:5px 0;">Transaksi Tanggal ${tanggal}</p>
                    <hr>
                </div>
            `;

            document.body.innerHTML = kopSurat + printable.innerHTML;

            window.print();

            document.body.innerHTML = originalBody;
        }
    </script>
@endpush