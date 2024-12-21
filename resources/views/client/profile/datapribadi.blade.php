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
                                <li class="nav-item"><a href="/home" class="nav-link">Beranda</a></li>
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
                                <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="./assets/compiled/jpg/1.jpg" alt="Avatar">
                                    </div>
                                    <div class="text d-none d-lg-block">
                                        <h6 class="user-dropdown-name">John Ducky</h6>
                                        <p class="user-dropdown-status text-sm text-muted">Member</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg">
                                    <li><a class="dropdown-item" href="/my-account">My Account</a></li>
                                    <li><a class="dropdown-item" href="/settings">Settings</a></li>
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
                            <h1 style="text-align: center">Data Diri</h1>
                            <br>   
                        </div>
                    </div>
                    <section class="row">
                        
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Diri Pemesan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ $customer && $customer->id_customer ? route('customer.update', $customer->id_customer) : route('customer.store') }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    {{-- Nama --}}
                                                    <div class="col-md-4">
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama" value="{{ $customer ? $customer->nama : '' }}" readonly required>
                                                    </div>
                                                    
                                                    {{-- Email --}}
                                                    <div class="col-md-4">
                                                        <label for="email">Email</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="email" class="form-control" name="email" value="{{ $customer ? $customer->email : '' }}" readonly required>
                                                    </div>
                                                    
                                                    {{-- No Telepon --}}
                                                    <div class="col-md-4">
                                                        <label for="no_telepon">No Telepon</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" class="form-control" name="no_telepon" value="{{ $customer ? $customer->no_telepon : '' }}" readonly required>
                                                    </div>
                                                    
                                                    {{-- NIK --}}
                                                    <div class="col-md-4">
                                                        <label for="nik">NIK</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" class="form-control" name="nik" value="{{ $customer ? $customer->nik : '' }}" readonly required>
                                                    </div>
                                                    
                                                    {{-- Gender --}}
                                                    <div class="col-md-4">
                                                        <label for="gender">Gender</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-control" name="gender" disabled required>
                                                            <option value="">-- Pilih Gender --</option>
                                                            <option value="pria" {{ $customer && $customer->gender === 'pria' ? 'selected' : '' }}>Pria</option>
                                                            <option value="wanita" {{ $customer && $customer->gender === 'wanita' ? 'selected' : '' }}>Wanita</option>
                                                        </select>
                                                    </div>
                                                    
                                                    {{-- Alamat --}}
                                                    <div class="col-md-4">
                                                        <label for="alamat">Alamat</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="alamat" value="{{ $customer ? $customer->alamat : '' }}" readonly required>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <button type="button" class="btn btn-secondary btn-block" id="editButton">Edit</button>
                                                <button type="submit" class="btn btn-primary btn-block" id="saveButton" style="display: none;">Simpan</button>
                        
                                            </div>
                                        </form>
                                        
                                        <script>
                                            document.getElementById('editButton').addEventListener('click', function () {
                                                document.querySelectorAll('input, select').forEach(function (input) {
                                                    input.removeAttribute('readonly');
                                                    input.removeAttribute('disabled');
                                                });
                                        
                                                document.getElementById('editButton').style.display = 'none';
                                                document.getElementById('saveButton').style.display = 'inline-block';
                                            });
                                        </script>
                                        
                                        
                                    </div>
                                </div>
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