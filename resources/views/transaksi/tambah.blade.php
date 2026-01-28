<div class="modal fade" id="tambahTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="">Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" class="form-control" required>
                        </div>
                        <div class="col-8">
                            <label for="">Nama Pelanggan</label>
                            <select name="id_pelanggan" class="form-select" required>
                                <option selected> Pilih pelanggan</option>
                                @foreach ($pelanggan as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Nama Layanan</label>
                        <select name="id_layanan" class="form-select" required>
                            <option selected> Pilih layanan</option>
                            @foreach ($layanan as $l)
                                <option value="{{ $l->id }}">{{ $l->nama_layanan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>