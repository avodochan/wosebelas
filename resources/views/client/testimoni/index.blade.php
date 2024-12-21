@extends('layouts.client.sectionitem')
@extends('layouts.client.mainnavbar')
@extends('layouts.client.scriptundangan')

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
                    <div class="row">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col-12 col-lg-12">
                            <h1 style="text-align: center">Testimoni</h1>
                            <br>   
                        </div>
                    </div>
                    <section class="row">
                        
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Testimoni Order</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('testimoni.store') }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    {{-- ID Pemesanan --}}
                                                    
                                                    <div class="col-md-4">
                                                        <label for="id_pemesanan">ID Pemesanan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="id_pemesanan" value="{{ $order->id_pemesanan ?? '' }}" readonly required>
                                                    </div>
                                        
                                                    {{-- ID Customer --}}
                                                    <input type="hidden" name="id_customer" value="{{ Auth::user()->customer->id_customer }}" required>
                                        
                                                    {{-- Nama --}}
                                                    <div class="col-md-4">
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama" value="{{ Auth::user()->name }}" readonly required>
                                                    </div>
                                        
                                                    {{-- Rating --}}
                                                    <div class="col-md-4">
                                                        <label for="rating">Rating</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" class="form-control" name="rating" min="1" max="5" required>
                                                    </div>
                                        
                                                    {{-- Testimoni --}}
                                                    <div class="col-md-4">
                                                        <label for="testimoni">Testimoni</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <textarea class="form-control" name="testimoni" rows="5" required></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                                                        
                        </div>
                        <div class="col-12 col-lg-8">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
        
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