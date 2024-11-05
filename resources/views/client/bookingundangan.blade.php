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
                            @foreach($undangans as $ud)
                                <div class="col-md-4">
                                    <label class="card-select" for="undangan_{{ $ud->id_undangan }}">
                                        <input type="radio" name="selected_undangan" id="undangan_{{ $ud->id_undangan }}" value="{{ $ud->id_undangan }}" required>
                                        
                                        <div class="card-content">
                                            <img src="{{ asset('storage/' . $ud->thumbnail_undangan) }}" alt="{{ $ud->nama_undangan }}" class="card-img">
                                            <div class="card-text">
                                                <h5>{{ $ud->nama_undangan }}</h5>
                                                <p>Rp {{ number_format($ud->harga_undangan, 0, ',', '.') }}</p>
                                                <br>
                                                <a href="{{ route('detail.undangan', ['undangan' => $ud->id_undangan]) }}" class="btn-outline-purple" style="margin-right: 5px;">Detail</a>
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