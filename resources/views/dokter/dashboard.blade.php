<x-layouts.app title="Dashboard Dokter">

    {{-- Greeting --}}
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-slate-800 mb-1">
            Selamat Datang, {{ auth()->user()->name ?? 'Dokter' }} 👋
        </h2>
        <p class="text-sm text-slate-400">
            {{ now()->translatedFormat('l, d F Y') }} — Berikut ringkasan aktivitas praktik Anda hari ini.
        </p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">

        {{-- Total Jadwal --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-calendar-days text-blue-700"></i>
                    </div>
                    <a href="{{ route('jadwal-periksa.index') }}"
                        class="text-xs font-semibold text-blue-700 bg-blue-50 px-3 py-1 rounded-full hover:bg-blue-100 transition">
                        Lihat
                    </a>
                </div>
                <div class="text-3xl font-extrabold text-slate-800 leading-none">
                    {{ \App\Models\JadwalPeriksa::where('id_dokter', auth()->id())->count() }}
                </div>
                <div class="text-sm font-semibold text-slate-500 mt-1">Total Jadwal</div>
            </div>
            <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-400 rounded-b-2xl"></div>
        </div>

        {{-- Pasien Menunggu --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
                        <i class="fas fa-user-clock text-amber-600"></i>
                    </div>
                    <a href="{{ route('periksa-pasien.index') }}"
                        class="text-xs font-semibold text-amber-600 bg-amber-50 px-3 py-1 rounded-full hover:bg-amber-100 transition">
                        Lihat
                    </a>
                </div>
                <div class="text-3xl font-extrabold text-slate-800 leading-none">
                    {{ \App\Models\DaftarPoli::whereHas('jadwalPeriksa', fn($q) => $q->where('id_dokter', auth()->id()))->doesntHave('periksas')->count() }}
                </div>
                <div class="text-sm font-semibold text-slate-500 mt-1">Pasien Menunggu</div>
            </div>
            <div class="h-1 bg-gradient-to-r from-amber-600 to-amber-400 rounded-b-2xl"></div>
        </div>

        {{-- Total Riwayat --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-pink-100 flex items-center justify-center">
                        <i class="fas fa-file-medical text-pink-600"></i>
                    </div>
                    <a href="{{ route('riwayat-pasien.index') }}"
                        class="text-xs font-semibold text-pink-600 bg-pink-50 px-3 py-1 rounded-full hover:bg-pink-100 transition">
                        Lihat
                    </a>
                </div>
                <div class="text-3xl font-extrabold text-slate-800 leading-none">
                    {{ \App\Models\Periksa::whereHas('daftarPoli.jadwalPeriksa', fn($q) => $q->where('id_dokter', auth()->id()))->count() }}
                </div>
                <div class="text-sm font-semibold text-slate-500 mt-1">Total Riwayat</div>
            </div>
            <div class="h-1 bg-gradient-to-r from-pink-600 to-pink-400 rounded-b-2xl"></div>
        </div>

    </div>

    {{-- Bottom Section --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- Jadwal Periksa --}}
        <div class="xl:col-span-2 card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body p-0">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-800">Jadwal Periksa</h3>
                    <a href="{{ route('jadwal-periksa.index') }}" class="text-sm font-semibold text-blue-700 hover:underline">
                        Lihat Semua →
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead class="text-xs uppercase tracking-wider text-slate-400 bg-slate-50">
                            <tr>
                                <th class="px-6 py-4">Hari</th>
                                <th class="px-6 py-4">Jam Mulai</th>
                                <th class="px-6 py-4">Jam Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\JadwalPeriksa::where('id_dokter', auth()->id())->orderBy('hari')->take(5)->get() as $jadwal)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-semibold text-slate-800">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-10 text-slate-400 text-sm">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i class="fas fa-calendar-xmark text-2xl"></i>
                                        <span>Belum ada jadwal periksa</span>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Quick Access --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <h3 class="text-sm font-bold text-slate-800 mb-4">Akses Cepat</h3>
                <div class="space-y-3">

                    <a href="{{ route('jadwal-periksa.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl bg-blue-50 hover:bg-blue-100 transition">
                        <i class="fas fa-plus text-blue-700"></i>
                        <div>
                            <div class="text-sm font-semibold text-slate-800">Tambah Jadwal</div>
                            <div class="text-xs text-slate-400">Tambahkan jadwal periksa baru</div>
                        </div>
                    </a>

                    <a href="{{ route('periksa-pasien.index') }}"
                        class="flex items-center gap-3 p-3 rounded-xl bg-amber-50 hover:bg-amber-100 transition">
                        <i class="fas fa-stethoscope text-amber-600"></i>
                        <div>
                            <div class="text-sm font-semibold text-slate-800">Periksa Pasien</div>
                            <div class="text-xs text-slate-400">Lihat daftar pasien menunggu</div>
                        </div>
                    </a>

                    <a href="{{ route('riwayat-pasien.index') }}"
                        class="flex items-center gap-3 p-3 rounded-xl bg-pink-50 hover:bg-pink-100 transition">
                        <i class="fas fa-file-medical text-pink-600"></i>
                        <div>
                            <div class="text-sm font-semibold text-slate-800">Riwayat Pasien</div>
                            <div class="text-xs text-slate-400">Lihat riwayat pemeriksaan</div>
                        </div>
                    </a>

                </div>
            </div>
        </div>

    </div>

</x-layouts.app>