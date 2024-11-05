@extends('layouts.client.clientfrontend')
@extends('layouts.client.button')
@extends('layouts.client.cards')
@extends('layouts.client.mainnavbar')
@section('content')
<body style="background-color: #F4F7FE">
    <!-- ***** Main Banner Area Start ***** -->
    @extends('layouts.client.nav_vendor')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('keranjang.addUndangan') }}" method="POST" id="card-form">
                    @csrf
                    <div class="container">
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
                            @foreach($maincourses as $mc)
                                <div class="col-md-4">
                                    <label class="card-select" for="undangan_{{ $mc->id_maincourse }}">
                                        <input type="radio" name="selected_undangan" id="maincourse_{{ $mc->id_maincourse }}" value="{{ $mc->id_maincourse }}" required>
                                        
                                        <div class="card-content">
                                            <img src="{{ asset('storage/' . $mc->thumbnail_maincourse) }}" alt="{{ $mc->nama_paket_maincourse }}" class="card-img">
                                            <div class="card-text">
                                                <h5>{{ $mc->nama_paket_maincourse }}</h5>
                                                <p>Rp {{ number_format($mc->harga_paket_maincourse, 0, ',', '.') }}</p>
                                                <br>
                                                <a href="{{ route('detail.maincourse', ['maincourse' => $mc->id_maincourse]) }}" class="btn-outline-purple" style="margin-right: 5px;">Detail</a>
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