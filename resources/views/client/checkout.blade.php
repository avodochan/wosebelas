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
                      <h5 class="card-title">Checkout</h5>
                      <table class="table">
                        <thead>
                            <tr>
                                <th>Foto Item</th>
                                <th>Nama Item</th>
                                <th>Kuantitas</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($items['dekorasi']))
                            <tr>
                                <td>
                                    @if(isset($items['dekorasi']['thumbnail']))
                                        <img src="{{ asset('storage/' . $items['dekorasi']['thumbnail']) }}" alt="{{ $items['dekorasi']['nama'] }}" width="50">
                                    @endif
                                </td>
                                <td>{{ $items['dekorasi']['nama'] }}</td>
                                <td>1</td> 
                                <td>{{ number_format($items['dekorasi']['harga'], 0, ',', '.') }}</td>
                                <td>{{ number_format($items['dekorasi']['harga'], 0, ',', '.') }}</td>
                            </tr>
                            @endif
                            @if(isset($items['undangan']))
                                <tr>
                                    <td>
                                        @if(isset($items['undangan']['thumbnail']))
                                            <img src="{{ asset('storage/' . $items['undangan']['thumbnail']) }}" alt="{{ $items['undangan']['nama'] }}" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $items['undangan']['nama'] }}</td>
                                    <td>{{ $items['undangan']['kuantitas'] }}</td>
                                    <td>{{ number_format($items['undangan']['harga'], 0, ',', '.') }}</td>
                                    <td>{{ number_format($items['undangan']['harga'] * $items['undangan']['kuantitas'], 0, ',', '.') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                    <div>
                        <strong>Grand Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}</strong>
                    </div>
                    
                  </div>
              </div>
          </div>
          
      </div>
    </div>
</body>
@endsection

