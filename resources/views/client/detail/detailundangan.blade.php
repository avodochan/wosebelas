    @extends('layouts.client.clientfrontend') 
    @extends('layouts.client.button')
    @extends('layouts.client.cards')
    @extends('layouts.client.scriptundangan')
    @section('content')
    <body style="margin-top:50px; background-color: #F4F7FE;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Detail Undangan</h5>
                            <img src="{{ asset('storage/' . $undangans->thumbnail_undangan) }}" alt="{{ $undangans->nama_undangan }}" class="img-fluid mb-3">
                            <h4>{{ $undangans->nama_undangan }}</h4>
                            <p id="harga_awal">Harga: Rp {{ number_format($undangans->harga_undangan, 0, ',', '.') }}</p>
                            <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pilih Opsi</h5>
                            <form action="{{ route('keranjang.addUndangan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="selected_undangan" value="{{ $undangans->id_undangan }}">

                                <div class="form-group">
                                    <label for="bahan_undangan">Pilih Bahan Undangan:</label>
                                    <select name="bahan_undangan" id="bahan_undangan" class="form-control" onchange="updateHarga({{ $undangans->harga_undangan }})">
                                        <option value="bcsoftcover">BriefCard Softcover</option>
                                        <option value="aster200gr">Aster (+ Rp 200)</option>
                                        <option value="amplopaster">Aster dengan Amplop (+ Rp 1,000)</option>
                                        <option value="bchardcover">BriefCard Hardcover (+ Rp 2,000)</option>
                                        <option value="amplopjasmine">Jasmine dengan Amplop (+ Rp 7,200)</option>
                                    </select>
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
                            <h5 class="card-title">Harga Berdasarkan Bahan</h5>
                            <p id="harga_dinamis">Harga: Rp {{ number_format($undangans->harga_undangan, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @endsection
