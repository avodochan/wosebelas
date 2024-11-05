@extends('layouts.client.clientfrontend') 
@extends('layouts.client.button')
@extends('layouts.client.cards')
@extends('layouts.client.scriptmaincourse')
@section('content')
<body style="margin-top:50px; background-color: #F4F7FE;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Paket Maincourse</h5>
                        <img src="{{ asset('storage/' . $maincourses->thumbnail_maincourse) }}" alt="{{ $maincourses->nama_paket_maincourse }}" class="img-fluid mb-3">
                        <h4>{{ $maincourses->nama_undangan }}</h4>
                        <p id="harga_awal">Harga: Rp {{ number_format($maincourses->harga_paket_maincourse, 0, ',', '.') }}</p>
                        
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $maincourses->nama_paket_maincourse }}</h5>
                        <form action="{{ route('keranjang.addUndangan') }}" method="POST">
                            @csrf
                            <input type="hidden" name="selected_undangan" value="{{ $maincourses->id_maincourse }}">
                            
                            <div class="form-group">
                                <label for="nama_paket_maincourse">Deskripsi Paket Maincourse</label>
                                <p id="deksripsi_paket_maincourse">{{ $maincourses->deskripsi_paket_maincourse }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <label for="package" class="form-label">Pilih Paket</label>
                                <select id="package" class="form-select">
                                    <option value="bronze">Bronze</option>
                                    <option value="silver">Silver</option>
                                    <option value="gold">Gold</option>
                                </select>
                            </div>                            
                            
                            <div class="mb-3">
                                <label for="karbohidrat" class="form-label">Pilih Karbohidrat</label>
                                @foreach ($karbohidrat as $kb)
                                    <div class="form-check">
                                        <input class="form-check-input karbohidrat-checkbox" type="checkbox" name="karbohidrat[]" value="{{ $kb->nama_item_maincourse }}">
                                        <label class="form-check-label">{{ $kb->nama_item_maincourse }}</label>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div id="warning-karbohidrat" style="color: red; display: none;">
                                Anda sudah mencapai batas pilihan untuk kategori Karbohidrat.
                            </div>
                            
                            
                            <div class="mb-3">
                                <label for="laukPauk" class="form-label">Pilih Lauk Pauk</label>
                                @foreach ($laukPauk as $lp)
                                    <div class="form-check">
                                        <input class="form-check-input laukPauk-checkbox" type="checkbox" name="laukPauk[]" value="{{ $lp->nama_item_maincourse }}">
                                        <label class="form-check-label">{{ $lp->nama_item_maincourse }}</label>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="mb-3">
                                <label for="tumisan" class="form-label">Pilih Tumisan</label>
                                @foreach ($tumisan as $tm)
                                    <div class="form-check">
                                        <input class="form-check-input tumisan-checkbox" type="checkbox" name="tumisan[]" value="{{ $tm->nama_item_maincourse }}">
                                        <label class="form-check-label">{{ $tm->nama_item_maincourse }}</label>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="mb-3">
                                <label for="acar" class="form-label">Pilih Acar</label>
                                @foreach ($acar as $ac)
                                    <div class="form-check">
                                        <input class="form-check-input acar-checkbox" type="checkbox" name="acar[]" value="{{ $ac->nama_item_maincourse }}">
                                        <label class="form-check-label">{{ $ac->nama_item_maincourse }}</label>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pilihan Dishes</label>
                                @foreach ($dishes as $ds)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="nama_dishes" value="{{ $ds->nama_dishes }}">
                                        <label class="form-check-label">{{ $ds->nama_dishes }}</label>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div id="warning-message" style="color: red; display: none;">
                                Anda sudah mencapai batas pilihan untuk kategori ini.
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kuantitas</label>
                                <input type="number" class="form-control" name="kuantitas" min="100" oninput="validateKuantitas(this)">
                                <div id="kuantitasError" style="color:red; display:none;">Kuantitas minimal 100.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Harga Berdasarkan Paket (Pax) </h5>
                        <p id="harga_dinamis">Harga: Rp {{ number_format($maincourses->harga_paket_maincourse, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
