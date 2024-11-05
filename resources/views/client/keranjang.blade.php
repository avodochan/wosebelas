@extends('layouts.client.clientfrontend') 
@extends('layouts.client.button')
@extends('layouts.client.cards')
@extends('layouts.client.scriptundangan')
@section('content')
<body style="margin-top:50px; background-color: #F4F7FE; ">
    <!-- ***** Main Banner Area Start ***** -->
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
            
            <div class="col-sm-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Pilihan Saya</h5>
                      <form action="{{ route('keranjang.checkout') }}" method="POST">
                        @csrf
                        <table class="table">
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
                                            <input type="checkbox" name="selected_items[]" value="undangan" checked onchange="calculateGrandTotal()">
                                        </td>
                                        <td>
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
                                        <td><span id="harga_undangan">{{ number_format(session('cart')['undangan']['harga'], 0, ',', '.') }}</span></td>
                                        <td><span id="undangan_total">{{ number_format(session('cart')['undangan']['harga'] * session('cart')['undangan']['kuantitas'], 0, ',', '.') }}</span></td>
                                    @endif
                                </tr>
                                
                                {{-- dokumentasi --}}
                                <tr>
                                    @if(isset(session('cart')['dokumentasi']))
                                        <td>
                                            <input type="checkbox" name="selected_items[]" value="dokumentasi" checked onchange="calculateGrandTotal()">
                                        </td>
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
                                        <td><span id="dekorasi_total">{{ number_format(session('cart')['dokumentasi']['harga'], 0, ',', '.') }}</span></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        
                        <input type="hidden" id="grand_total_input" name="grand_total" value="0">
    
                        <div>
                            <span>Grand Total: Rp <span id="grand_total">0</span></span>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </form>
                    
                    
                  </div>
              </div>
          </div>
          
      </div>
    </div>
</body>
@endsection

