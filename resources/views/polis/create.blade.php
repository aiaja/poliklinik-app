<x-layouts.app>
  <form method="POST" action="{{ route('polis.store') }}">
    @csrf
    <input type="text" name="nama_poli" value="{{ old('nama_poli') }}" required>
    <textarea name="keterangan">{{ old('keterangan') }}</textarea>
    <button type="submit">Simpan</button>
  </form>
</x-layouts.app>
