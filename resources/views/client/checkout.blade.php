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
                        <div class="col-12 col-lg-12">
                            <h1 style="text-align: center">Checkout</h1>
                            <br>   
                        </div>
                    </div>
                    <section class="row">
                        
                        {{-- tanggal --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pemilihan Tanggal</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('order.store') }}" method="POST" class="form form-horizontal">
                                        @csrf
                                        <div class="form-group">
                                            <label for="order_date">Tanggal Pemesanan</label>
                                            <input type="date" name="order_date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="event_date">Tanggal Acara</label>
                                            <input type="date" name="event_date" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="event_date">Banyak Tamu</label>
                                            <input type="number" name="banyak_tamu" class="form-control" required>
                                        </div>
                                        <input type="hidden" name="grand_total" value="{{ $grandTotal }}">
                                    {{-- </form> --}}
                                </div>
                            </div>
                            
                            {{-- data diri --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Diri Pemesan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <!-- Nama -->
                                                    <div class="col-md-4">
                                                        <label for="first-name-horizontal">Nama</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama" value="{{ $customer->nama ?? '' }}" readonly>
                                                    </div>
                                        
                                                    <!-- Email -->
                                                    <div class="col-md-4">
                                                        <label for="email-horizontal">Email</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="email" class="form-control" name="email" value="{{ $customer->email ?? '' }}" readonly>
                                                    </div>
                                        
                                                    <!-- No Telepon -->
                                                    <div class="col-md-4">
                                                        <label for="contact-info-horizontal">No Telepon</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="no_telepon" value="{{ $customer->no_telepon ?? '' }}" readonly>
                                                    </div>
                                        
                                                    <!-- NIK -->
                                                    <div class="col-md-4">
                                                        <label for="password-horizontal">NIK</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nik" value="{{ $customer->nik ?? '' }}" readonly>
                                                    </div>
                                        
                                                    <!-- Gender -->
                                                    <div class="col-md-4">
                                                        <label for="inputState-horizontal">Gender</label>
                                                    </div>
                                                    <div class="col-12 col-md-8 form-group">
                                                        <input type="text" class="form-control" name="gender" value="{{ ucfirst($customer->gender ?? '') }}" readonly>
                                                    </div>
                                        
                                                    <!-- Alamat -->
                                                    <div class="col-md-4">
                                                        <label for="password-horizontal">Alamat</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="alamat" value="{{ $customer->alamat ?? '' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
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
        
                            {{-- Section Keranjang --}}
                            <div class="sections-container">
                                <div class="col-6 col-md-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Foto Item</th>
                                                                    <th scope="col">Nama Item</th>
                                                                    <th scope="col">Kategori Item</th>
                                                                    <th scope="col">Kuantitas</th>
                                                                    <th scope="col">Harga Satuan</th>
                                                                    <th scope="col">Jumlah Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            {{-- dekorasi --}}
                                                            <tr>
                                                                    @if(isset(session('cart')['dekorasi']))
                                                                        <td>
                                                                            @if(isset(session('cart')['dekorasi']['thumbnail']))
                                                                                <img src="{{ asset('storage/' . session('cart')['dekorasi']['thumbnail']) }}" alt="{{ session('cart')['dekorasi']['nama'] }}" width="50">
                                                                            @else
                                                                                <p>Thumbnail tidak tersedia.</p>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ session('cart')['dekorasi']['nama'] }}</td>
                                                                        <td></td>
                                                                        <td>1</td>
                                                                        <td>{{ number_format(session('cart')['dekorasi']['harga'], 0, ',', '.') }}</td>
                                                                        <td><span id="dekorasi_total">{{ number_format(session('cart')['dekorasi']['harga'], 0, ',', '.') }}</span></td>
                                                                    @endif
                                                                </tr>
                                                                
                                                                {{-- undangan --}}
                                                                <tr>
                                                                    @if(isset(session('cart')['undangan']))
                                                                        <td>
                                                                            @if(isset(session('cart')['undangan']['thumbnail']))
                                                                                <img src="{{ asset('storage/' . session('cart')['undangan']['thumbnail']) }}" alt="{{ session('cart')['undangan']['nama'] }}" width="50">
                                                                            @else
                                                                                <p>Thumbnail tidak tersedia.</p>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ session('cart')['undangan']['nama'] }}</td>
                                                                        <td>
                                                                            <select name="bahan_undangan" id="bahan_undangan" class="form-control" onchange="updateUndanganTotal()">
                                                                                <option value="bcsoftcover" {{ session('cart')['undangan']['bahan_undangan'] == 'bcsoftcover' ? 'selected' : '' }}>BriefCard Softcover</option>
                                                                                <option value="aster200gr" {{ session('cart')['undangan']['bahan_undangan'] == 'aster200gr' ? 'selected' : '' }}>Aster (+ Rp 200)</option>
                                                                                <option value="amplopaster" {{ session('cart')['undangan']['bahan_undangan'] == 'amplopaster' ? 'selected' : '' }}>Aster dengan Amplop (+ Rp 1,000)</option>
                                                                                <option value="bchardcover" {{ session('cart')['undangan']['bahan_undangan'] == 'bchardcover' ? 'selected' : '' }}>BriefCard Hardcover (+ Rp 2,000)</option>
                                                                                <option value="amplopjasmine" {{ session('cart')['undangan']['bahan_undangan'] == 'amplopjasmine' ? 'selected' : '' }}>Jasmine dengan Amplop (+ Rp 7,200)</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" id="kuantitas_undangan" name="kuantitas" value="{{ session('cart')['undangan']['kuantitas'] }}" class="form-control" min="100" onchange="updateUndanganTotal()">
                                                                        </td>
                                                                        <td><span id="harga_undangan">{{ number_format(session('cart')['undangan']['harga'], 0, ',', '.') }}</span></td>
                                                                        <td><span id="undangan_total">{{ number_format(session('cart')['undangan']['harga'] * session('cart')['undangan']['kuantitas'], 0, ',', '.') }}</span></td>
                                                                    @endif
                                                                </tr>
                                                                
                                                                {{-- dokumentasi --}}
                                                                <tr>
                                                                    @if(isset(session('cart')['dokumentasi']))
                                                                        <td>
                                                                            @if(isset(session('cart')['dokumentasi']['thumbnail']))
                                                                                <img src="{{ asset('storage/' . session('cart')['dokumentasi']['thumbnail']) }}" alt="{{ session('cart')['dokumentasi']['nama'] }}" width="50">
                                                                            @else
                                                                                <p>Thumbnail tidak tersedia.</p>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ session('cart')['dokumentasi']['nama'] }}</td>
                                                                        <td>{{ session('cart')['dokumentasi']['jenis'] }}</td>
                                                                        <td>1</td>
                                                                        <td>{{ number_format(session('cart')['dokumentasi']['harga'], 0, ',', '.') }}</td>
                                                                        <td><span id="dekorasi_total">{{ number_format(session('cart')['dokumentasi']['harga'], 0, ',', '.') }}</span></td>
                                                                    @endif
                                                                </tr>
                                                                
                                                                {{-- hiburan --}}
                                                                <tr>
                                                                    @if(isset(session('cart')['hiburan']))
                                                                        <td>
                                                                            @if(isset(session('cart')['hiburan']['thumbnail']))
                                                                                <img src="{{ asset('storage/' . session('cart')['hiburan']['thumbnail']) }}" alt="{{ session('cart')['hiburan']['nama'] }}" width="50">
                                                                            @else
                                                                                <p>Thumbnail tidak tersedia.</p>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ session('cart')['hiburan']['nama'] }}</td>
                                                                        <td></td>
                                                                        <td>1</td>
                                                                        <td>{{ number_format(session('cart')['hiburan']['harga'], 0, ',', '.') }}</td>
                                                                        <td><span id="hiburan_total">{{ number_format(session('cart')['hiburan']['harga'], 0, ',', '.') }}</span></td>
                                                                    @endif
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                        
                                                        <div class="d-grid justify-content-end">
                                                            <br>
                                                            <h4>Grand Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}</h4>
                                                            <button type="submit" class="btn btn-primary">Konfirmasi Pemesanan</button>
                                                        </div>
                                                                                                                
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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