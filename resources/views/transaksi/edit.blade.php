<div class="modal fade" id="editTransaksi{{ $t->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Transaksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaksi.update', $t->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="">Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" value="{{ $t->tanggal_transaksi }}"
                                class="form-control" required>
                        </div>
                        <div class="col-8">
                            <label for="">Nama Pelanggan</label>
                            <select name="id_pelanggan" class="form-select" required>
                                @foreach ($pelanggan as $p)
                                    <option value="{{ $p->id }}" {{ $t->id_pelanggan == $p->id ? 'selected' : '' }}>
                                        {{ $p->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Nama Layanan</label>
                        <select name="id_layanan" class="form-select" required>
                            @foreach ($layanan as $l)
                                <option value="{{ $l->id }}" {{ $t->id_layanan == $l->id ? 'selected' : '' }}>
                                    {{ $l->nama_layanan }}</option>
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