<div class="modal fade" id="editPelanggan{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pelanggan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('pelanggan.update', $p->id) }}" method="POST">
        @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label for="">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" value="{{ $p->nama_pelanggan }}" required>
            </div>
            <div class="mb-3">
                <label for="">No HP</label>
                <input type="text" name="no_telepon" class="form-control" value="{{ $p->no_telepon }}" required>
            </div>
            <div class="mb-3">
                <label for="">Alamat</label>
                <textarea name="alamat" class="form-control" required id="">{{ $p->alamat }}</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>