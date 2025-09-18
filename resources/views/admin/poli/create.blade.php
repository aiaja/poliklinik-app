<x-layouts.app title="Tambah Poli">
  <div class="container-fluid px-4 mt-4">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <h1 class="mb-4">Tambah Poli</h1>

        <div class="card">
          <div class="card-body">
            <form action="{{ route('poli.store') }}" method="POST">
              @csrf

              <div class="">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="nama_poli" class="form-label">Nama Poli <span class="text-danger">*</span></label>
                    <input type="text" name="nama_poli" id="nama_poli" class="form-control @error('nama_poli') is-invalid @enderror"
                      value="{{ old('nama_poli') }}" required>
                    @error('nama_poli')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

              <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror"
                  required>{{ old('keterangan') }}</textarea>
                @error('keterangan')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mt-4">
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('poli.index') }}" class="btn btn-secondary">
                  <i class="fas fa-arrow-left"></i> Kembali
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>
