<x-layouts.app title="Admin Dashboard">

    {{-- Greeting --}}
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-slate-800 mb-1">
            Selamat Datang, {{ auth()->user()->name ?? 'Admin' }} 👋
        </h2>
        <p class="text-sm text-slate-400">
            {{ now()->translatedFormat('l, d F Y') }} — Berikut ringkasan data sistem poliklinik.
        </p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        {{-- Poli --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-hospital text-blue-700"></i>
                    </div>
                    <a href="{{ route('polis.index') }}"
                        class="text-xs font-semibold text-blue-700 bg-blue-50 px-3 py-1 rounded-full hover:bg-blue-100 transition">
                        Lihat
                    </a>
                </div>

                <div class="text-3xl font-extrabold text-slate-800 leading-none">
                    {{ \App\Models\Poli::count() }}
                </div>
                <div class="text-sm font-semibold text-slate-500 mt-1">
                    Total Poli
                </div>
            </div>
            <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-400 rounded-b-2xl"></div>
        </div>


        {{-- Dokter --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                        <i class="fas fa-user-doctor text-emerald-600"></i>
                    </div>
                    <a href="{{ route('dokter.index') }}"
                        class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full hover:bg-emerald-100 transition">
                        Lihat
                    </a>
                </div>

                <div class="text-3xl font-extrabold text-slate-800 leading-none">
                    {{ \App\Models\User::where('role','dokter')->count() }}
                </div>
                <div class="text-sm font-semibold text-slate-500 mt-1">
                    Total Dokter
                </div>
            </div>
            <div class="h-1 bg-gradient-to-r from-emerald-600 to-emerald-400 rounded-b-2xl"></div>
        </div>


        {{-- Pasien --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
                        <i class="fas fa-bed-pulse text-amber-600"></i>
                    </div>
                    <a href="{{ route('pasien.index') }}"
                        class="text-xs font-semibold text-amber-600 bg-amber-50 px-3 py-1 rounded-full hover:bg-amber-100 transition">
                        Lihat
                    </a>
                </div>

                <div class="text-3xl font-extrabold text-slate-800 leading-none">
                    {{ \App\Models\User::where('role','pasien')->count() }}
                </div>
                <div class="text-sm font-semibold text-slate-500 mt-1">
                    Total Pasien
                </div>
            </div>
            <div class="h-1 bg-gradient-to-r from-amber-600 to-amber-400 rounded-b-2xl"></div>
        </div>


        {{-- Obat --}}
        <div class="card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-pink-100 flex items-center justify-center">
                        <i class="fas fa-pills text-pink-600"></i>
                    </div>
                    <a href="{{ route('obat.index') }}"
                        class="text-xs font-semibold text-pink-600 bg-pink-50 px-3 py-1 rounded-full hover:bg-pink-100 transition">
                        Lihat
                    </a>
                </div>

                <div class="text-3xl font-extrabold text-slate-800 leading-none">
                    {{ \App\Models\Obat::count() }}
                </div>
                <div class="text-sm font-semibold text-slate-500 mt-1">
                    Total Obat
                </div>
            </div>
            <div class="h-1 bg-gradient-to-r from-pink-600 to-pink-400 rounded-b-2xl"></div>
        </div>

    </div>


    {{-- Bottom Section --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- Daftar Poli --}}
        <div class="xl:col-span-2 card bg-base-100 shadow-sm border border-slate-200 rounded-2xl">
            <div class="card-body p-0">

                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-800">
                        Daftar Poli
                    </h3>
                    <a href="{{ route('polis.index') }}" class="text-sm font-semibold text-blue-700 hover:underline">
                        Lihat Semua →
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead class="text-xs uppercase tracking-wider text-slate-400 bg-slate-50">
                            <tr>
                                <th>Nama Poli</th>
                                <th>Keterangan</th>
                                <th>Dokter</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Poli::latest()->take(5)->get() as $poli)
                            <tr>
                                <td class="font-semibold text-slate-800">
                                    {{ $poli->nama_poli }}
                                </td>
                                <td class="text-slate-500 text-sm">
                                    {{ $poli->keterangan ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge badge-info badge-sm">
                                        {{ \App\Models\User::where('role','dokter')->where('id_poli',$poli->id)->count()
                                        }} Dokter
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-10 text-slate-400 text-sm">
                                    Belum ada data poli
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
                <h3 class="text-sm font-bold text-slate-800 mb-4">
                    Akses Cepat
                </h3>

                <div class="space-y-3">

                    <a href="{{ route('polis.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl bg-blue-50 hover:bg-blue-100 transition">
                        <i class="fas fa-plus text-blue-700"></i>
                        <div>
                            <div class="text-sm font-semibold text-slate-800">Tambah Poli</div>
                            <div class="text-xs text-slate-400">Daftarkan poli baru</div>
                        </div>
                    </a>

                    <a href="{{ route('dokter.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 transition">
                        <i class="fas fa-user-plus text-emerald-600"></i>
                        <div>
                            <div class="text-sm font-semibold text-slate-800">Tambah Dokter</div>
                            <div class="text-xs text-slate-400">Daftarkan dokter baru</div>
                        </div>
                    </a>

                    <a href="{{ route('pasien.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl bg-amber-50 hover:bg-amber-100 transition">
                        <i class="fas fa-user-plus text-amber-600"></i>
                        <div>
                            <div class="text-sm font-semibold text-slate-800">Tambah Pasien</div>
                            <div class="text-xs text-slate-400">Daftarkan pasien baru</div>
                        </div>
                    </a>

                    <a href="{{ route('obat.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl bg-pink-50 hover:bg-pink-100 transition">
                        <i class="fas fa-plus text-pink-600"></i>
                        <div>
                            <div class="text-sm font-semibold text-slate-800">Tambah Obat</div>
                            <div class="text-xs text-slate-400">Tambahkan data obat baru</div>
                        </div>
                    </a>

                </div>
            </div>
        </div>

    </div>

</x-layouts.app>