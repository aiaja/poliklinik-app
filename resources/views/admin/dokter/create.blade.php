<x-layouts.app title="Tambah Dokter">
  <div class="container-fluid px-4 mt-4">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <h1 class="mb-4">Tambah Dokter</h1>

        <div class="card">
          <div class="card-body">
            <form action="{{ route('dokter.store') }}" method="POST">
              @csrf

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Dokter <span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                      value="{{ old('nama') }}" required>
                    @error('nama')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                      value="{{ old('email') }}" required>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="no_ktp" class="form-label">No. KTP <span class="text-danger">*</span></label>
                    <input type="text" name="no_ktp" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror"
                      value="{{ old('no_ktp') }}" maxlength="16" required>
                    @error('no_ktp')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="no_hp" class="form-label">No. HP <span class="text-danger">*</span></label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                      value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                  required>{{ old('alamat') }}</textarea>
                @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="id_poli" class="form-label">Poli <span class="text-danger">*</span></label>
                <select name="id_poli" id="id_poli" class="form-control @error('id_poli') is-invalid @enderror"
                  required>
                  <option value="">Pilih Poli</option>
                  @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}" {{ old('id_poli') == $poli->id ? 'selected' : '' }}>
                      {{ $poli->nama_poli }}
                    </option>
                  @endforeach
                </select>
                @error('id_poli')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                  minlength="6" required>
                <small class="form-text text-muted">Minimal 6 karakter</small>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mt-4">
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
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
