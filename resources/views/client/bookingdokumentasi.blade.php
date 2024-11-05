@extends('layouts.client.clientfrontend') 
@extends('layouts.client.button') 
@extends('layouts.client.cards') 
@section('content') 
    <body style="background-color: #F4F7FE"> 
        <!-- ***** Main Banner Area Start ***** --> 
        @extends('layouts.client.nav_vendor') 
        <div class="container-fluid"> 
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row"> 
                <div class="col-lg-12"> 
                    <form action="{{ route('keranjang.addDokumentasi') }}" method="POST" id="card-form"> 
                   @csrf 
                        <div class="container"> 
                            <div class="row"> 
                                @foreach($dokumentasis as $dok) 
                                <div class="col-md-4"> 
                                    <label class="card-select" for="dokumentasi_{{ $dok->id_dokumentasi }}"> 
                                        <!-- Input Radio --> 
                                        <input type="radio" name="selected_dokumentasi" id="dokumentasi_{{ $dok->id_dokumentasi }}" value="{{ $dok->id_dokumentasi }}"> 
                                        <!-- Card Content --> 
                                        <div class="card-content"> 
                                        <img src="{{ asset('storage/' . $dok->thumbnail_dokumentasi) }}" alt="{{ $dok->nama_paket_dokumentasi }}" class="card-img"> 
                                            <div class="card-text"> 
                                            <h5>{{ $dok->nama_paket_dokumentasi }}</h5> 
                                            <p>Rp {{ number_format($dok->harga_dokumentasi, 0, ',', '.') }}</p> 
                                            </div> 
                                        </div> 
                                    </label> 
                                </div> 
                                @endforeach 
                            </div> 
                        </div> 
                    <br> 
                    <!-- Tombol submit untuk mengirim pilihan ke server --> 
                    <button type="submit" class="btn btn-primary">Submit Pilihan</button> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </body> 
@endsection 


