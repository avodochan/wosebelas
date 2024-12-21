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
                                <li class="nav-item"><a href="/tentang-kami" class="nav-link">Tentang Kami</a></li>
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
                                    <li><a class="dropdown-item" href="/settings">Histori Order</a></li>
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
                                    <h1 style="text-align: center">Tentang Kami</h1>
                                    <p style="text-align: center">Seputar kami, Mama Wedding</p>
                                    <br>   
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            
                                        </div>
                                        <div class="card-body">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Tentang Mama Wedding</h4>
                                            <hr>
                                        </div>
                                        
                                        <div class="card-body">
                                            <p>Mama Wedding hadir untuk mewujudkan impian setiap pasangan yang ingin menggelar hari istimewa mereka dengan sempurna. Kami adalah tim wedding organizer yang berkomitmen untuk memberikan pengalaman pernikahan tak terlupakan dengan sentuhan profesionalisme, kreativitas, dan perhatian terhadap detail. 
                                                Dengan moto "Mewujudkan Momen Berharga Anda", kami percaya bahwa setiap pernikahan memiliki cerita unik yang layak dirayakan dengan istimewa.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                             <h4 class="card-title">Team Mama Wedding</h4>
                                             <hr>
                                        </div>
                                        
                                        <div class="card-body">
                                            <p>Didirikan oleh para ahli di bidang perencanaan acara, Mamawedding telah menjadi mitra terpercaya bagi pasangan dari berbagai latar belakang. Kami memahami bahwa proses merencanakan pernikahan bisa menjadi perjalanan yang menantang. 
                                                Oleh karena itu, kami hadir untuk mengambil alih kerumitan tersebut, memungkinkan Anda untuk menikmati momen persiapan dengan lebih santai dan penuh kegembiraan.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                             <h4 class="card-title">Layanan Mama Wedding</h4>
                                             <hr>
                                        </div>
                                        
                                        <div class="card-body">
                                            <p>Layanan kami mencakup semua aspek pernikahan, mulai dari perencanaan awal, pemilihan vendor terbaik, desain dekorasi yang memukau, hingga manajemen acara di hari H. Kami bekerja sama dengan vendor-vendor berpengalaman untuk memastikan kualitas terbaik, mulai dari katering, dokumentasi, hiburan, hingga tata rias. 
                                                Dengan pendekatan yang personal, kami mendengarkan setiap detail keinginan Anda dan mewujudkannya sesuai visi yang Anda impikan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Harapan Mama Wedding</h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <p>Di Mamawedding, kami percaya bahwa pernikahan bukan hanya tentang acara, tetapi tentang menciptakan kenangan yang akan dikenang seumur hidup. 
                                                Itulah mengapa kami selalu memberikan lebih dari sekadar layanan; kami memberikan dedikasi dan cinta dalam setiap detail pekerjaan kami.
    
                                                Mari jadikan hari spesial Anda sempurna bersama Mamawedding. Bersama kami, Anda hanya perlu memikirkan satu hal: merayakan cinta dengan penuh kebahagiaan.</p>
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