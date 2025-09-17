<x-layouts.app title="Data Poli">
  <div class="container-fluid px-4 mt-4">
    <div class="row">
      <div class="col-lg-12">
        {{-- ALERT FLASH MESSAGE --}}
        @if (session('message'))
          <div class="alert alert-{{ session('type', 'success') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <h1 class="mb-4">Data Poli</h1>

        <a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">
          <i class="fas fa-plus"></i> Tambah Poli
        </a>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th>Nama Poli</th>
                <th>Keterangan</th>
                <th style="width: 150px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($polis as $poli)
                <tr>
                  <td>{{ $poli->nama_poli }}</td>
                  <td>{{ $poli->keterangan }}</td>
                  <td>
                    <a href="{{ route('poli.edit', $poli) }}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus poli ini?')">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center">Belum ada data poli</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) {
        alert.classList.remove('show');
        alert.classList.add('fade');
        setTimeout(() => alert.remove(), 500);
      }
    }, 2000);
  </script>
</x-layouts.app>

@if(session('success'))
  <div class="alert alert-success" id="alert{{ session('success') }}">
  </div>
@endif

<script>
  setTimeout(() => {
    const alert = document.getElementById('alert');
    if (alert) alert.remove();
  }, 3000);
</script>
