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
                                <li class="nav-item"><a href="/" class="nav-link">Beranda</a></li>
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
                    <section class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <h1 style="text-align: center">Keranjang</h1>
                                    <br>   
                                </div>
                            </div>
                            
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
        
                            {{-- Section Gedung --}}
                            <div class="sections-container">
                                <br>
                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form action="{{ route('keranjang.checkout') }}" method="POST">
                                                    @csrf
                                                    <div class="table-responsive">
                                                        <table class="table table-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
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
                                                                            <input type="checkbox" name="selected_items[]" value="dekorasi" checked onchange="calculateGrandTotal()">
                                                                        </td>
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
                                                                            <input type="checkbox" name="selected_items[]" value="undangan" checked onchange="calculateGrandTotal()">                                                                        <td>
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
                                                                        <td>Rp <span id="harga_dinamis">{{ number_format(session('cart')['undangan']['harga'], 0, ',', '.') }}</span></td>
                                                                        <td>Rp <span id="undangan_total">{{ number_format(session('cart')['undangan']['harga'] * session('cart')['undangan']['kuantitas'], 0, ',', '.') }}</span></td>
                                                                    @endif
                                                                </tr>
                                                                
                                                                
                                                                {{-- dokumentasi --}}
                                                                <tr>
                                                                    @if(isset(session('cart')['dokumentasi']))
                                                                        <td>
                                                                            <input type="checkbox" name="selected_items[]" value="dokumentasi" checked onchange="calculateGrandTotal()">                                                                        </td>
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
                                                                        <td><span id="dokumentasi_total">{{ number_format(session('cart')['dokumentasi']['harga'], 0, ',', '.') }}</span></td>
                                                                    @endif
                                                                </tr>
                                                                
                                                                {{-- hiburan --}}
                                                                <tr>
                                                                    @if(isset(session('cart')['hiburan']))
                                                                        <td>
                                                                            <input type="checkbox" name="selected_items[]" value="hiburan" checked onchange="calculateGrandTotal()">                                                                        
                                                                        </td>
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
                                                        
                                                        <input type="hidden" id="grand_total_input" name="grand_total" value="0">
                                                    <div>
                                                        <br>
                                                        <span>Grand Total: Rp <span id="grand_total">0</span></span>
                                                        <br>
                                                    </div>
                                                        
                                                        <button type="submit" class="btn btn-primary">Checkout</button>
                                                        
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