@extends('master')
@section('title1', 'Pelanggan')
@section('title2', 'Pelanggan')
@section('content')
    <div class="wrap">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <strong class="card-title">Data Pelanggan</strong>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahPelanggan"><i class="fa fa-plus"></i>&nbsp;
                            Tambah</button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="pelangganTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama_pelanggan}}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>{{$p->no_telepon}}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editPelanggan{{ $p->id }}"><i class="fa fa-pencil"></i>&nbsp;
                                                Edit</button>
                                            <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="konfirmasiHapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i>&nbsp;
                                                    Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @include('pelanggan.edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pelanggan.tambah')
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#pelangganTable').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data pelanggan tidak tersedia</span>'
                }
            });
        });
    </script>
@endpush