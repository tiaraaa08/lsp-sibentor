@extends('master')
@section('title1', 'Layanan')
@section('title2', 'Layanan')
@section('content')
    <div class="wrap">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <strong class="card-title">Data Layanan</strong>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahLayanan"><i class="fa fa-plus"></i>&nbsp;
                            Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="layananTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Layanan</th>
                                    <th>Deskripsi Layanan</th>
                                    <th>Harga Layanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layanan as $l)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $l->nama_layanan }}</td>
                                        <td>
                                            <ul class="ms-4">
                                                @foreach ($l->desk_layanan as $desk)
                                                    <li>{{ $desk }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>Rp {{ number_format($l->harga_layanan, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editLayanan{{ $l->id }}"><i class="fa fa-pencil"></i>&nbsp;
                                                    Edit</button>
                                                <form action="{{ route('layanan.destroy', $l->id) }}" method="POST" class="konfirmasiHapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i>&nbsp;
                                                        Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('layanan.edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layanan.tambah')
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#layananTable').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data layanan tidak tersedia</span>'
                }
            });
        });

        document.addEventListener('shown.bs.modal', function (e) {
            const harga = e.target.querySelectorAll('.hargaLayanan');

            harga.forEach((input) => {
                let mentah = input.value.replace(/\D/g, '');

                if (mentah !== '') {
                    input.value = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(Number(mentah));
                }

                input.addEventListener('input', function () {
                    let val = this.value.replace(/\D/g, '');

                    this.value = val ?
                        new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        }).format(Number(val)) : '';
                });
            });
        });
    </script>
@endpush