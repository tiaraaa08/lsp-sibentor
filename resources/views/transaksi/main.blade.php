@extends('master')
@section('title1', 'Transaksi')
@section('title2', 'Transaksi')
@section('content')
    <div class="wrap">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <strong class="card-title">Data Transaksi</strong>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahTransaksi"><i class="fa fa-plus"></i>&nbsp;
                            Tambah</button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="transaksiTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Nominal</th>
                                <th>Tanggal Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->pelanggan->nama_pelanggan }}</td>
                                    <td>{{$t->layanan->nama_layanan}}</td>
                                    <td>Rp {{number_format($t->layanan->harga_layanan, 0, ',', '.')}}</td>
                                    <td>{{ $t->tanggal_transaksi }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editTransaksi{{ $t->id }}"><i class="fa fa-pencil"></i>&nbsp;
                                                Edit</button>
                                            <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST"
                                                class="konfirmasiHapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="delete" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i>&nbsp;
                                                    Hapus</button>
                                            </form>
                                            <a href="{{ route('struk', $t->id) }}">
                                                <button type="button" class="btn btn-success"><i
                                                        class="fa-solid fa-print"></i></button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @include('transaksi.edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('transaksi.tambah')
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#transaksiTable').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data transaksi tidak tersedia</span>'
                }
            });
        });
    </script>
@endpush