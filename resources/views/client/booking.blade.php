@extends('layouts.client.sectionitem')
@extends('layouts.client.mainnavbar')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <script src="{{asset('/assets/static/js/initTheme.js')}}"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container d-flex justify-content-between align-items-center">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a>
                        </div>
            
                        <!-- Navbar Menu -->
                        <nav class="navbar-menu">
                            <ul class="navbar-nav d-flex justify-content-center align-items-center flex-row">
                                <li class="nav-item"><a href="/home " class="nav-link">Beranda</a></li>
                                <li class="nav-item"><a href="/projek-kami" class="nav-link">Projek Kami</a></li>
                                <li class="nav-item"><a href="/booking" class="nav-link">Booking</a></li>
                                <li class="nav-item"><a href="/tentangkami" class="nav-link">Tentang Kami</a></li>
                                <li class="nav-item"><a href="/kontakkami" class="nav-link">Kontak Kami</a></li>
                            </ul>
                        </nav>
            
                        <!-- Profile and Cart Icons -->
                        <div class="header-top-right d-flex align-items-center">
                            <a href="/keranjang" class="cart-icon me-4">
                                <i class="bi bi-cart fs-4"></i>
                            </a>
                            <div class="dropdown">
                                <a href="#" class="user-dropdown d-flex align-items-center dropdown-toggle" 
                                   data-bs-toggle="dropdown" 
                                   aria-expanded="false"
                                   id="topbarUserDropdown">
                                    <div class="avatar avatar-md2">
                                        <img src="{{asset('/assets/compiled/jpg/1.jpg')}}" alt="Avatar">
                                    </div>
                                    <div class="text d-none d-lg-block">
                                        <h6 class="user-dropdown-name"></h6>
                                        <p class="user-dropdown-status text-sm text-muted">Member</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" 
                                    aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="/datadiri">Profile</a></li>
                                    <li><a class="dropdown-item" href="/historiorder">Histori Order</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="auth-login.html">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            
            <div class="content-wrapper container">
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <h1 style="text-align: center">Booking</h1>
                                    <p style="text-align: center">Pilihan fitur yang kami sediakan</p>
                                    <br>   
                                </div>
                            </div>
                            
                            {{-- navbar item --}}
                            <nav class="main-navbar">
                                <div class="container">
                                    <ul>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="gedung">Gedung</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="katering">Katering</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="dekorasi">Dekorasi</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="dokumentasi">Dokumentasi</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="hiburan">Hiburan</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="mua">MUA</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="souvenir">Souvenir</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0)" class="menu-link" data-section="undangan">Undangan</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
        
                            {{-- Section Fitur --}}
                            <div class="sections-container">
                                <section id="gedung" class="section active">
                                    <br>
                                    <h2>Gedung</h2>
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <form action="{{route('keranjang.addGedung') }}" method="POST" id="card-form"> 
                                                @csrf
                                                @foreach($gedungs as $gd)
                                                    <div class=" col-sm-6 col-md-4 col-lg-3 mb-4"> 
                                                        <div class="card h-100">
                                                            <div class="card-content">
                                                                <input type="hidden" name="selected_gedung" value="{{ $gd->id_gedung }}">
                                                                <img src="{{ asset('storage/' . $gd->thumbnail_gedung) }}" class="card-img-top img-fluid" alt="{{ $gd->nama_gedung }}">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $gd->nama_gedung }}</h5>
                                                                    <p class="card-text">Mulai dari Rp {{ number_format($gd->harga_sewa_gedung, 0, ',', '.') }}</p>
                                                                    <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                                    <a class="btn btn-light-primary" href="/detailgedung">Selengkapnya</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                
                                
                            
                                <section id="katering" class="section">
                                    <br>
                                    <h2>Katering</h2>
                                    <br>
                                    <form action="{{route ('keranjang.addKatering')}}" method="POST" id="card-form"> 
                                        @csrf
                                        <div class="col-12 col-xl-3">
                                            @foreach($maincourses as $mc) 
                                                <div class="card">
                                                    <div class="card-content">
                                                        <input type="hidden" name="selected_maincourse" value="{{ $mc->id_maincourse}}">
                                                        <img src="{{ asset('storage/' . $mc->thumbnail_maincourse) }}" class="card-img-top img-fluid" alt="{{ $mc->nama_paket_maincourse }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $mc->nama_paket_maincourse }}</h5>
                                                            <p class="card-text">Rp {{ number_format($mc->harga_paket_maincourse, 0, ',', '.') }}</p>
                                                            <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                            <button class="btn btn-light-primary">Read More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form> 
                                </section>
                            
                                <section id="dekorasi" class="section">
                                    <br>
                                    <h2>Dekorasi</h2>
                                    <br>
                                    <form action="{{ route('keranjang.addDekorasi') }}" method="POST" id="card-form"> 
                                        @csrf
                                        <div class="col-12 col-xl-3">
                                            @foreach($dekorasis as $dk) 
                                            <div class="card">
                                                    <div class="card-content">
                                                        <input type="hidden" name="selected_dekorasi" value="{{ $dk->id_dekorasi}}">
                                                        <img src="{{ asset('storage/' . $dk->thumbnail_dekorasi) }}" class="card-img-top img-fluid" alt="{{ $gd->nama_gedung }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $dk->nama_dekorasi }}</h5>
                                                            <p class="card-text">Rp {{ number_format($dk->harga_dekorasi, 0, ',', '.') }}</p>
                                                            <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                            <button class="btn btn-light-primary">Read More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form> 
                                </section>
                            
                                <section id="dokumentasi" class="section">
                                    <br>
                                    <h2>Dokumentasi</h2>
                                    <br>
                                    <form action="{{ route('keranjang.addDokumentasi') }}" method="POST" id="card-form"> 
                                        @csrf
                                        <div class="col-12 col-xl-3">
                                            @foreach($dokumentasis as $dok) 
                                            <div class="card">
                                                    <div class="card-content">
                                                        <input type="hidden" name="selected_dokumentasi" value="{{$dok->id_dokumentasi}}">
                                                        <img src="{{ asset('storage/' . $dok->thumbnail_dokumentasi) }}" class="card-img-top img-fluid" alt="{{ $gd->nama_gedung }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $dok->nama_paket_dokumentasi }}</h5>
                                                            <p class="card-text">Rp {{ number_format($dok->harga_dokumentasi, 0, ',', '.') }}</p>
                                                            <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                            <button class="btn btn-light-primary">Read More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form> 
                                </section>
                            
                                <section id="hiburan" class="section">
                                    <br>
                                    <h2>Hiburan</h2>
                                    <br>
                                    <form action="{{ route('keranjang.addHiburan') }}" method="POST" id="card-form"> 
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-xl-3">
                                                @foreach($hiburans as $hb) 
                                                <div class="card">
                                                        <div class="card-content">
                                                            <input type="hidden" name="selected_hiburan" value="{{ $hb->id_hiburan}}">
                                                            <img src="{{ asset('storage/' . $hb->thumbnail_hiburan) }}" class="card-img-top img-fluid" alt="{{ $hb->nama_paket_hiburan }}">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $hb->nama_paket_hiburan }}</h5>
                                                                <p class="card-text">Rp {{ number_format($hb->harga_sewa_hiburan, 0, ',', '.') }}</p>
                                                                <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                                <button class="btn btn-light-primary">Read More</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> 
                                    </form>
                                </section>
                            
                                <section id="mua" class="section">
                                    <br>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2>Bridal Style</h2>
                                    </div>                                    
                                    <br>
                                    <form action="{{route ('keranjang.addBridalStyle')}}" method="POST" id="card-form"> 
                                        @csrf
                                        <div class="col-12 col-xl-3">
                                            @foreach($bridalstyles as $bs) 
                                            <div class="card">
                                                    <div class="card-content">
                                                        <input type="hidden" name="selected_bridal_style" value="{{ $bs->id_bridalstyle}}">
                                                        <img src="{{ asset('storage/' . $bs->thumbnail_bridalstyle) }}" class="card-img-top img-fluid" alt="{{ $bs->nama_paket_bridalstyle }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $bs->nama_paket_bridalstyle }}</h5>
                                                            <p class="card-text">Rp {{ number_format($bs->harga_paket, 0, ',', '.') }}</p>
                                                            <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                            <button class="btn btn-light-primary">Read More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form> 
                                </section>
                            
                                <section id="souvenir" class="section">
                                    <br>
                                    <h2>Souvenir</h2>
                                    <br>
                                    <form action="{{route ('keranjang.addSouvernir')}}" method="POST" id="card-form"> 
                                        @csrf
                                        <div class="col-12 col-xl-3">
                                            @foreach($souvenirs as $sv) 
                                            <div class="card">
                                                    <div class="card-content">
                                                        <input type="hidden" name="selected_souvernir" value="{{ $sv->id_souvernir}}">
                                                        <img src="{{ asset('storage/' . $sv->thumbnail_souvenir) }}" class="card-img-top img-fluid" alt="{{ $sv->nama_paket_souvernir }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $sv->nama_paket_souvenir }}</h5>
                                                            <p class="card-text">Rp {{ number_format($sv->harga_paket_souvenir, 0, ',', '.') }}</p>
                                                            <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                            <button class="btn btn-light-primary">Read More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form>
                                </section>
                            
                                <section id="undangan" class="section">
                                    {{-- <br>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2>Undangan</h2>
                                        <a href="/bookingundangan" class="btn btn-light-primary">Lihat Semua</a>
                                    </div>                                     --}}
                                    <br>
                                    <form action="{{route('keranjang.addUndangan') }}" method="POST" id="card-form"> 
                                        @csrf
                                        <div class="col-12 col-xl-3">
                                            @foreach($undangans as $ud)
                                            <div class="card">
                                                    <div class="card-content">
                                                        <input type="hidden" name="selected_undangan" value="{{ $ud->id_undangan }}">
                                                        <img src="{{ asset('storage/' . $ud->thumbnail_undangan) }}" class="card-img-top img-fluid" alt="{{ $gd->nama_gedung }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $ud->nama_undangan }}</h5>
                                                            <p class="card-text">Rp {{ number_format($ud->harga_undangan, 0, ',', '.') }}</p>
                                                            <button class="btn btn-light-primary" type="submit"><i class="bi bi-cart"></i></button>
                                                            <a href="{{ route('detail.undangan', ['undangan' => $ud->id_undangan]) }}"  class="btn btn-light-primary" style="margin-right: 5px;">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form> 
                                </section>
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>      
    </div>
    <script src="{{asset('assets/static/js/components/dark.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/horizontal-layout.js')}}"></script>
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/compiled/js/app.js')}}"></script>
    <script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/dashboard.js')}}"></script>

</body>

</html>