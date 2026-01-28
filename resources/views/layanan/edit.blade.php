<div class="modal fade" id="editLayanan{{ $l->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Layanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('layanan.update', $l->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Layanan</label>
                        <input type="text" name="nama_layanan" value="{{ $l->nama_layanan }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi Layanan (pisahkan dengan koma)</label>
                        <textarea type="text" name="desk_layanan" class="form-control" required>{{ implode(', ', $l->desk_layanan) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Harga</label>
                        <input type="text" name="harga_layanan" class="form-control hargaLayanan" value="{{ $l->harga_layanan }}" required>
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