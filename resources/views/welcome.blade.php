<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik - Layanan Kesehatan Terpercaya</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float 5s ease-in-out infinite;
            animation-delay: 1s;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900 text-left">
    <!-- Header / Navbar -->
    <header class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 text-left">
                <!-- Logo -->
                <div class="flex items-center gap-2 text-left">
                    <img src="{{ asset('images/logo-bengkot.png') }}" alt="Bengkot Logo" class="w-10 h-10 object-contain">
                    <span class="text-xl font-bold tracking-tight text-slate-900 uppercase">Poliklinik</span>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="#layanan" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Layanan</a>
                    <a href="#cara-daftar" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Cara Daftar</a>
                    <a href="#kontak" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Kontak</a>
                </nav>

                <!-- Auth CTAs -->
                <div class="flex items-center gap-4 text-left">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-ghost btn-sm normal-case font-bold">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm normal-case font-bold hidden sm:inline-flex">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm text-white normal-case px-6 font-bold shadow-lg shadow-blue-600/20">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Grid Hero Section -->
        <section class="relative overflow-hidden pt-12 pb-20 lg:pt-20 lg:pb-24 bg-gradient-to-br from-white to-blue-50/30 text-left">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-blue-100/30 rounded-full blur-3xl -z-10"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-16 text-left">
                    
                    <div class="lg:w-5/12 text-left">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-blue-600 text-white mb-8 shadow-lg shadow-blue-600/20">
                            Digital Clinic v2.0
                        </span>
                        <h1 class="text-5xl lg:text-7xl font-black tracking-tighter text-slate-900 leading-[0.95] mb-8">
                            Masa Depan <br>
                            <span class="text-blue-600">Layanan Medis.</span>
                        </h1>
                        <p class="text-lg text-slate-500 font-medium leading-relaxed max-w-md mb-10">
                            Poliklinik menghubungkan pasien dengan dokter spesialis terbaik melalui platform yang cepat, aman, dan tanpa antrean panjang.
                        </p>

                        <div class="flex flex-wrap items-center gap-4 mb-12">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-8 text-white shadow-2xl shadow-blue-600/40 font-black rounded-2xl">
                                Buat Janji Temu
                            </a>
                            <div class="flex items-center gap-3 group cursor-pointer border border-slate-200 rounded-full px-5 py-2 hover:bg-primary hover:text-white transition-colors">
                                <span class="text-sm font-black text-slate-900 uppercase tracking-widest group-hover:text-white">Eksplorasi</span>
                                <div class="w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center transition-transform group-hover:rotate-45">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-6 border-t border-slate-200 pt-8">
                            <div class="flex flex-col gap-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Akses Cepat</span>
                                <div class="flex gap-3 text-left">
                                    <a href="{{ route('login') }}" class="text-xs font-black text-slate-900 hover:text-blue-600 transition-colors uppercase tracking-widest underline decoration-2 underline-offset-4">Portal Pasien</a>
                                    <a href="{{ route('login') }}" class="text-xs font-black text-slate-900 hover:text-blue-600 transition-colors uppercase tracking-widest underline decoration-2 underline-offset-4">Portal Dokter</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-7/12 w-full text-left">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-left">
                            
                            <!-- Main Pill Image Slider -->
                            <div x-data="{ 
                                active: 0,
                                doctors: [
                                    { name: 'Dr. Sarah P.', spec: 'Spesialis Penyakit Dalam', img: 'https://images.unsplash.com/photo-1559839734-2b71f1536783?auto=format&fit=crop&q=80&w=800' },
                                    { name: 'Dr. Michael R.', spec: 'Spesialis Jantung', img: 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&q=80&w=800' },
                                    { name: 'Dr. Amanda W.', spec: 'Spesialis Anak', img: 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&q=80&w=800' }
                                ]
                            }" class="md:row-span-2 relative group overflow-hidden bg-slate-200 rounded-[60px] lg:rounded-[100px] h-[400px] md:h-[540px] shadow-2xl transition-all duration-700">
                                
                                <template x-for="(doctor, index) in doctors" :key="index">
                                    <div x-show="active === index" 
                                         class="absolute inset-0 w-full h-full"
                                         x-transition:enter="transition ease-out duration-500"
                                         x-transition:enter-start="opacity-0 scale-105"
                                         x-transition:enter-end="opacity-100 scale-100">
                                        <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" 
                                             :src="doctor.img" :alt="doctor.name"
                                             x-on:error="$el.src='https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=800'">
                                    </div>
                                </template>
                                
                                <div class="absolute bottom-6 left-6 right-6 glass-card p-6 rounded-[3.5rem] text-center shadow-2xl animate-float z-10">
                                    <h4 class="text-sm font-black text-slate-900 uppercase" x-text="doctors[active].name"></h4>
                                    <p class="text-[10px] font-bold text-blue-600 uppercase tracking-widest" x-text="doctors[active].spec"></p>
                                </div>

                                <div x-on:click="active = active === 0 ? doctors.length - 1 : active - 1" class="absolute top-1/2 -translate-y-1/2 left-4 w-10 h-10 rounded-full bg-white/80 backdrop-blur shadow-lg flex items-center justify-center cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                </div>
                                <div x-on:click="active = active === doctors.length - 1 ? 0 : active + 1" class="absolute top-1/2 -translate-y-1/2 right-4 w-10 h-10 rounded-full bg-blue-600 text-white shadow-lg flex items-center justify-center cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>

                            <div class="flex gap-4 h-[260px]">
                                <div class="flex-1 bg-blue-100 rounded-[50px] overflow-hidden relative group">
                                    <img class="w-full h-full object-cover opacity-90 group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=400" alt="Clinic Interior">
                                    <div class="absolute inset-0 bg-blue-600/5 group-hover:bg-transparent transition-colors"></div>
                                </div>
                                <div class="flex-1 bg-teal-500 rounded-[50px] overflow-hidden relative group">
                                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1581594693702-fbdc51b2763b?auto=format&fit=crop&q=80&w=400" alt="Medical Tech">
                                    <div class="absolute inset-0 bg-slate-900/30 group-hover:bg-slate-900/10 transition-colors"></div>
                                </div>
                            </div>

                            <div class="bg-slate-900 rounded-[3rem] p-8 h-[260px] flex flex-col justify-center shadow-2xl text-left">
                                <div class="grid grid-cols-2 gap-y-8 gap-x-4 text-left">
                                    <div class="stat-item border-b md:border-b-0 md:border-r border-slate-800 pb-4 md:pb-0 md:pr-4 text-left">
                                        <p class="text-2xl font-black text-white leading-none mb-1">15+</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter leading-tight">Dokter Spesialis</p>
                                    </div>
                                    <div class="stat-item text-right pb-4 md:pb-0">
                                        <p class="text-2xl font-black text-blue-400 leading-none mb-1">4.9</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter leading-tight">Rating Pasien</p>
                                    </div>
                                    <div class="stat-item md:border-r border-slate-800 pt-4 md:pr-4 text-left">
                                        <p class="text-2xl font-black text-white leading-none mb-1">5+</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter leading-tight">Poliklinik</p>
                                    </div>
                                    <div class="stat-item text-right pt-4">
                                        <p class="text-2xl font-black text-blue-400 leading-none mb-1">24/7</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter leading-tight">Akses Online</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="layanan" class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20 text-center">
                    <h2 class="text-4xl font-black tracking-tight text-slate-900 sm:text-5xl text-center">Layanan Poliklinik</h2>
                    <div class="mt-4 w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
                    <p class="mt-6 text-xl text-slate-600 max-w-2xl mx-auto text-center">Pilih poliklinik sesuai kebutuhan kesehatan Anda dengan fasilitas modern dan tenaga ahli.</p>
                </div>
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="group bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-500 text-left">
                        <div class="aspect-video w-full rounded-[1.5rem] overflow-hidden mb-8">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&q=80&w=600" alt="Poli Umum">
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3 text-left">Poli Umum</h3>
                        <p class="text-slate-600 leading-relaxed font-medium text-left">Layanan pemeriksaan kesehatan menyeluruh dan konsultasi medis dasar dengan dokter umum berpengalaman.</p>
                    </div>
                    <div class="group bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-500 text-left">
                        <div class="aspect-video w-full rounded-[1.5rem] overflow-hidden mb-8">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&q=80&w=600" alt="Poli Gigi">
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3 text-left">Poli Gigi</h3>
                        <p class="text-slate-600 leading-relaxed font-medium text-left">Perawatan kesehatan gigi dan mulut oleh spesialis ortodonti dan konservasi gigi profesional.</p>
                    </div>
                    <div class="group bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-500 text-left">
                        <div class="aspect-video w-full rounded-[1.5rem] overflow-hidden mb-8">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1536064485894-ce2f6340de63?auto=format&fit=crop&q=80&w=600" alt="Poli Anak">
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3 text-left">Poli Anak</h3>
                        <p class="text-slate-600 leading-relaxed font-medium text-left">Layanan ramah anak yang didesain khusus untuk mendukung tumbuh kembang optimal buah hati Anda.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section id="cara-daftar" class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20 text-center">
                    <h2 class="text-4xl font-black tracking-tight text-slate-900 sm:text-5xl text-center">Mulai Periksa</h2>
                    <p class="mt-6 text-xl text-slate-600 text-center">Hanya butuh 4 langkah mudah untuk kesehatan yang lebih baik.</p>
                </div>
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-4 text-left">
                    <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 hover:bg-blue-50 transition-colors group text-left">
                        <div class="text-5xl font-black text-blue-100 mb-6 group-hover:text-blue-200 transition-colors">01</div>
                        <h3 class="text-xl font-black text-slate-900 mb-3 text-left">Registrasi</h3>
                        <p class="text-slate-600 text-sm leading-relaxed text-left">Buat akun pasien baru secara cepat dengan data diri valid.</p>
                    </div>
                    <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 hover:bg-blue-50 transition-colors group text-left">
                        <div class="text-5xl font-black text-blue-100 mb-6 group-hover:text-blue-200 transition-colors">02</div>
                        <h3 class="text-xl font-black text-slate-900 mb-3 text-left text-left">Pilih Poli</h3>
                        <p class="text-slate-600 text-sm leading-relaxed text-left text-left">Tentukan poliklinik dan dokter spesialis yang Anda inginkan.</p>
                    </div>
                    <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 hover:bg-blue-50 transition-colors group text-left">
                        <div class="text-5xl font-black text-blue-100 mb-6 group-hover:text-blue-200 transition-colors">03</div>
                        <h3 class="text-xl font-black text-slate-900 mb-3 text-left text-left">Nomor Antrean</h3>
                        <p class="text-slate-600 text-sm leading-relaxed text-left text-left text-left">Sistem akan otomatis memberikan nomor antrean digital.</p>
                    </div>
                    <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 hover:bg-blue-50 transition-colors group text-left">
                        <div class="text-5xl font-black text-blue-100 mb-6 group-hover:text-blue-200 transition-colors">04</div>
                        <h3 class="text-xl font-black text-slate-900 mb-3 text-left text-left">Pemeriksaan</h3>
                        <p class="text-slate-600 text-sm leading-relaxed text-left text-left">Datang tepat waktu dan lakukan pemeriksaan dengan nyaman.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="mx-4 sm:mx-8 lg:mx-16 my-20 text-center">
            <div class="max-w-7xl mx-auto rounded-[3rem] bg-slate-900 overflow-hidden relative py-20 px-8 text-center">
                <div class="relative z-10 text-center max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-black tracking-tight text-white sm:text-5xl mb-10 leading-tight text-center">
                        Sehat dimulai dari <br><span class="text-blue-500 italic uppercase">satu klik pertama.</span>
                    </h2>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-16 text-white border-none shadow-2xl shadow-blue-600/40 font-black rounded-2xl">
                        Daftar Pasien Sekarang
                    </a>
                </div>
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-600/20 rounded-full blur-[80px]"></div>
                <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-blue-600/20 rounded-full blur-[100px]"></div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="kontak" class="bg-slate-50 pt-24 pb-12 text-left">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-16 text-left">
                <div class="md:col-span-5 text-left">
                    <div class="flex items-center gap-2 mb-8 text-left">
                        <img src="{{ asset('images/logo-bengkot.png') }}" alt="Bengkot Logo" class="w-10 h-10 object-contain">
                        <span class="text-2xl font-black tracking-tighter uppercase text-left">Poliklinik</span>
                    </div>
                    <p class="text-slate-500 leading-relaxed text-lg mb-10 max-w-md font-medium text-left">
                        Melayani dengan sepenuh hati, didukung oleh tenaga medis profesional dan sistem teknologi yang mempermudah langkah sehat Anda.
                    </p>
                    <div class="flex gap-4 text-left">
                        <a href="#" class="w-12 h-12 flex items-center justify-center bg-white border border-slate-200 rounded-2xl hover:border-blue-600 hover:text-blue-600 transition-all shadow-sm">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 flex items-center justify-center bg-white border border-slate-200 rounded-2xl hover:border-blue-600 hover:text-blue-600 transition-all shadow-sm">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-3 text-left">
                    <h4 class="text-slate-900 font-black mb-8 text-sm uppercase tracking-widest text-left">Informasi Kontak</h4>
                    <ul class="space-y-6 text-left">
                        <li class="flex items-start gap-4 text-left">
                            <div class="w-10 h-10 shrink-0 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-left">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <span class="text-sm font-semibold text-slate-600 text-left">Jl. Kesehatan No. 123, Kota Semarang, Jawa Tengah</span>
                        </li>
                        <li class="flex items-center gap-4 text-left">
                            <div class="w-10 h-10 shrink-0 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center text-left">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <span class="text-sm font-semibold text-slate-600 text-left">(024) 1234567</span>
                        </li>
                    </ul>
                </div>

                <div class="md:col-span-4 text-left">
                    <h4 class="text-slate-900 font-black mb-8 text-sm uppercase tracking-widest text-left">Jam Operasional</h4>
                    <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm text-left">
                        <ul class="space-y-4 text-left">
                            <li class="flex justify-between items-center text-left">
                                <span class="text-sm font-bold text-slate-500 text-left">Senin - Jumat</span>
                                <span class="text-sm font-black text-blue-600 bg-blue-50 px-3 py-1 rounded-lg text-left">08:00 - 20:00</span>
                            </li>
                            <li class="flex justify-between items-center text-left">
                                <span class="text-sm font-bold text-slate-500 text-left">Sabtu</span>
                                <span class="text-sm font-black text-blue-600 bg-blue-50 px-3 py-1 rounded-lg text-left">08:00 - 16:00</span>
                            </li>
                            <li class="flex justify-between items-center border-t border-slate-100 pt-4 text-left">
                                <span class="text-sm font-bold text-slate-500 text-left">Minggu</span>
                                <span class="text-sm font-black text-red-500 bg-red-50 px-3 py-1 rounded-lg uppercase text-left">Tutup</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-20 pt-8 border-t border-slate-200 text-center">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em] text-center">&copy; {{ date('Y') }} Poliklinik. Seluruh Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
