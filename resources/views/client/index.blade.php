@extends('layouts.client.sectionitem')
@extends('layouts.client.mainnavbar')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


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
                                <li class="nav-item"><a href="/projekkami" class="nav-link">Projek Kami</a></li>
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
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>WeddingSebelas</h4>
                                        </div>
                                        <div class="card-body">
                                            {{-- foto disini --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <!-- Modal Pesanan Ditolak -->
                            <div class="modal fade" id="rejectedOrderModal" tabindex="-1" aria-labelledby="rejectedOrderModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="rejectedOrderModalLabel">Pesanan Ditolak</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Pesanan Anda telah ditolak oleh admin. Silakan hubungi admin untuk informasi lebih lanjut.
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                                </div>
                            </div>
  
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <h4>Entertainment</h4>
                                        <div class="col-md-3 col-sm-12">
                                            
                                            <div class="card">
                                                <div class="card-content">
                                                    <img class="card-img-bottom img-fluid" src="https://static.republika.co.id/uploads/images/inpicture_slide/rizky-febian-dan-mahalini-resmi-melangsungkan-pernikahan-pada-jumat_240510130805-973.jpeg"
                                                        alt="Card image cap" style="height: 20rem; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Rizky Febian & Mahalini</h4>
                                                        <p class="card-text">
                                                            Isbat nikah Rizky Febian dan Mahalini ditolak oleh Pengadilan Agama Jakarta Selatan (Jaksel). 
                                                            Keduanya diharuskan melakukan 
                                                        </p>
                                                        <a href="#" class="card-link"><small>Baca Selengkapnya</small></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <img class="card-img-bottom img-fluid" src="https://static.republika.co.id/uploads/images/inpicture_slide/rizky-febian-dan-mahalini-resmi-melangsungkan-pernikahan-pada-jumat_240510130805-973.jpeg"
                                                        alt="Card image cap" style="height: 20rem; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Rizky Febian & Mahalini</h4>
                                                        <p class="card-text">
                                                            Isbat nikah Rizky Febian dan Mahalini ditolak oleh Pengadilan Agama Jakarta Selatan (Jaksel). 
                                                            Keduanya diharuskan melakukan 
                                                        </p>
                                                        <a href="#" class="card-link"><small>Baca Selengkapnya</small></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <img class="card-img-bottom img-fluid" src="https://static.republika.co.id/uploads/images/inpicture_slide/rizky-febian-dan-mahalini-resmi-melangsungkan-pernikahan-pada-jumat_240510130805-973.jpeg"
                                                        alt="Card image cap" style="height: 20rem; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Rizky Febian & Mahalini</h4>
                                                        <p class="card-text">
                                                            Isbat nikah Rizky Febian dan Mahalini ditolak oleh Pengadilan Agama Jakarta Selatan (Jaksel). 
                                                            Keduanya diharuskan melakukan 
                                                        </p>
                                                        <a href="#" class="card-link"><small>Baca Selengkapnya</small></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <img class="card-img-bottom img-fluid" src="https://static.republika.co.id/uploads/images/inpicture_slide/rizky-febian-dan-mahalini-resmi-melangsungkan-pernikahan-pada-jumat_240510130805-973.jpeg"
                                                        alt="Card image cap" style="height: 20rem; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Rizky Febian & Mahalini</h4>
                                                        <p class="card-text">
                                                            Isbat nikah Rizky Febian dan Mahalini ditolak oleh Pengadilan Agama Jakarta Selatan (Jaksel). 
                                                            Keduanya diharuskan melakukan 
                                                        </p>
                                                        <a href="#" class="card-link"><small>Baca Selengkapnya</small></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>FAQ</h4>
                                        </div>
                                        <div class="card-body">
                                            <!-- Isi konten FAQ -->
                                            <div class="accordion" id="faqAccordion">
                                                <!-- Pertanyaan 1 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="faq1Heading">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                                            Bagaimana cara memesan layanan wedding organizer secara online?
                                                        </button>
                                                    </h2>
                                                    <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1Heading" data-bs-parent="#faqAccordion">
                                                        <div class="accordion-body">
                                                            Anda dapat memesan layanan melalui website atau aplikasi resmi kami. Pilih paket yang sesuai, isi formulir pemesanan, dan lakukan pembayaran sesuai instruksi.
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <!-- Pertanyaan 2 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="faq2Heading">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                                            Apakah saya bisa menyesuaikan paket yang tersedia?
                                                        </button>
                                                    </h2>
                                                    <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2Heading" data-bs-parent="#faqAccordion">
                                                        <div class="accordion-body">
                                                            Ya, kami menyediakan layanan kustomisasi paket sesuai kebutuhan Anda. Anda dapat menghubungi tim kami untuk membahas detail yang diinginkan.
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <!-- Pertanyaan 3 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="faq3Heading">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                                            Bagaimana jika saya perlu membatalkan pemesanan?
                                                        </button>
                                                    </h2>
                                                    <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3Heading" data-bs-parent="#faqAccordion">
                                                        <div class="accordion-body">
                                                            Jika Anda perlu membatalkan pemesanan, harap hubungi tim kami segera. Kebijakan pembatalan dan pengembalian dana berlaku sesuai ketentuan yang tercantum di website kami.
                                                        </div>
                                                    </div>
                                                </div>
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
        
        
        @if (session('order_rejected'))
        <script>
            // Tampilkan modal jika flash message ada
            document.addEventListener('DOMContentLoaded', function() {
                var rejectedOrderModal = new bootstrap.Modal(document.getElementById('rejectedOrderModal'));
                rejectedOrderModal.show();
            });
        </script>
        @endif
            
    </div>
    <script src="{{asset('assets/static/js/components/dark.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/horizontal-layout.js')}}"></script>
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/compiled/js/app.js')}}"></script>
    <script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/dashboard.js')}}"></script>

</body>

</html>