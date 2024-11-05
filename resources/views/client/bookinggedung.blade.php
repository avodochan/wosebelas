@extends('layouts.client.clientfrontend')
@extends('layouts.client.button')
@extends('layouts.client.cards')
@section('content')
<body style="background-color: #F4F7FE">
    
    <!-- ***** Main Banner Area Start ***** -->
        @extends('layouts.client.nav_vendor')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <div class="container mt-5">
                                    <div class="row">
                                        {{-- bridalstyle --}} 
                                        @foreach($gedungs as $gd)
                                            <div class="col-md-4">
                                                <div class="card card-select" data-id="{{ $gd->id_gedung }}" style="width: 18rem; border-radius:14.68px; margin-right:0px; cursor: pointer;">
                                                    <div class="card-body">
                                                        <!-- Menampilkan Thumbnail Dekorasi -->
                                                        <img src="{{ asset('storage/' . $gd->thumbnail_gedung) }}" class="card-img-top" alt="{{ $gd->nama_gedung }}" style="max-height: 200px; object-fit: cover;">
                                                        <br><br>
                                                        <h5 class="card-title">{{ $gd->nama_gedung }}</h5>
                                                        <p class="card-text">Rp {{ $gd->harga_sewa_gedung }}</p>
                                                        <br>
                                                        <div class="container">
                                                            <div class="row">
                                                                <a href="#" class="btn-outline-purple select-card" data-id="{{ $gd->id_gedung }}" style="cursor: pointer;">Pilih Ini</a>
                                                                <input type="hidden" name="selected_dekorasi" value="{{ $gd->id_gedung }}" class="selected-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Submit Pilihan</button>
                            </form>
                    
                    <div class="right-content">
                        <div class="row">
                           
                    </div>
                </div>
            </div>
        </div>
        </div>

    
  </body>
@endsection
