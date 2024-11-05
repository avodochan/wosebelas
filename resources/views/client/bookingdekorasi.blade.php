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
                    <form action="{{ route('keranjang.addDekorasi') }}" method="POST" id="card-form"> 
                   @csrf 
                        <div class="container"> 
                            <div class="row"> 
                                @foreach($dekorasis as $dk) 
                                <div class="col-md-4"> 
                                    <label class="card-select" for="dekorasi_{{ $dk->id_dekorasi }}"> 
                                        <!-- Input Radio --> 
                                        <input type="radio" name="selected_dekorasi" id="dekorasi_{{ $dk->id_dekorasi }}" value="{{ $dk->id_dekorasi }}"> 
                                        <!-- Card Content --> 
                                        <div class="card-content"> 
                                        <img src="{{ asset('storage/' . $dk->thumbnail_dekorasi) }}" alt="{{ $dk->nama_dekorasi }}" class="card-img"> 
                                            <div class="card-text"> 
                                            <h5>{{ $dk->nama_dekorasi }}</h5> 
                                            <p>Rp {{ number_format($dk->harga_dekorasi, 0, ',', '.') }}</p> 
                                            </div> 
                                        </div> 
                                    </label> 
                                </div> 
                                @endforeach 
                            </div> 
                        </div> 
                    <br>
                    <button type="submit" class="btn btn-primary">Submit Pilihan</button> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </body> 
@endsection 

