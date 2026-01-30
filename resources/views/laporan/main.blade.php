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
                        <div class="col-7">
                            <strong class="align-middle card-title">Laporan Transaksi</strong>
                        </div>
                        <div class="col-5">
                            <div class="input-group float-end d-flex align-items-center">
                                <span class="input-group-text">Tampil</span>
                                <input type="date" class="form-control hariMulai" value="{{ request('hariMulai') }}"
                                    oninput="filterTanggal()">
                                <span class="fw-semibold">–</span>
                                <input type="date" class="form-control hariAkhir" value="{{ request('hariAkhir') }}"
                                    oninput="filterTanggal()">
                                <button type="button" class="btn btn-success" onclick="printTable()">
                                    Cetak
                                </button>
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
            const mulai = document.querySelector('.hariMulai').value;
            const akhir = document.querySelector('.hariAkhir').value;

            const params = new URLSearchParams();

            if (mulai !== '') params.set('hariMulai', mulai);
            if (akhir !== '') params.set('hariAkhir', akhir);

            const query = params.toString();
            window.location.href = query ? `?${query}` : window.location.pathname;
        }

        function formatTanggal(tanggal) {
            if (!tanggal) return '';
            return new Intl.DateTimeFormat('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            }).format(new Date(tanggal));
        }

        function printTable() {
            const printable = document.getElementById('printTable');
            const originalBody = document.body.innerHTML;

            const table = $('#laporanTable').DataTable();
            table.destroy();

            const hariMulai = document.querySelector('.hariMulai')?.value;
            const hariAkhir = document.querySelector('.hariAkhir')?.value;
            let tanggal = 'Keseluruhan';

            if (hariMulai && hariAkhir) {
                tanggal = `${formatTanggal(hariMulai)} sampai ${formatTanggal(hariAkhir)}`;
            } else if (hariMulai) {
                tanggal = `mulai ${formatTanggal(hariMulai)}`;
            } else if (hariAkhir) {
                tanggal = `sampai ${formatTanggal(hariAkhir)}`;
            }

            const kopSurat = `
                <div style="text-align:center; margin-bottom:20px;">
                <img src="{{ asset('logo.png') }}" style="width:40px;"></img>
                    <h4>LAPORAN TRANSAKSI</h4>
                    <h3>Si-Bengkel Motor</h3>
                    <div style="display:flex; justify-content:space-between; margin-top:10px;">
                        <div>Nama : Tiara</div>
                        <div>Transaksi ${tanggal}</div>
                    </div>
                    <hr>
                </div>
            `;
            document.body.innerHTML = kopSurat + printable.innerHTML;
            window.print();
            document.body.innerHTML = originalBody;
        }
    </script>
@endpush