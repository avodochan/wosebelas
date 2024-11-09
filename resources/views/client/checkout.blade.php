@extends('layouts.client.clientfrontend') 
@extends('layouts.client.button')
@extends('layouts.client.cards')
@extends('layouts.client.scriptundangan')

@section('content')
<body style="margin-top:50px; background-color: #F4F7FE;">
    <!-- ***** Main Banner Area Start ***** -->
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <!-- Form dimulai di sini -->
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Telepon</label>
                                <input type="text" class="form-control" name="no_telepon" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select id="inputState" class="form-select" name="gender" required>
                                    <option selected disabled>Choose...</option>
                                    <option value="wanita">Wanita</option>
                                    <option value="pria">Pria</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                    </div>
                </div>
            </div>

                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tanggal Acara</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Acara</label>
                                        <input type="date" class="form-control" name="tanggal_acara" required>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <!-- Checkout Section -->
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
                                            @if(isset($items['dokumentasi']))
                                            <tr>
                                                <td>
                                                    @if(isset($items['dokumentasi']['thumbnail']))
                                                        <img src="{{ asset('storage/' . $items['dokumentasi']['thumbnail']) }}" alt="{{ $items['dokumentasi']['nama'] }}" width="50">
                                                    @endif
                                                </td>
                                                <td>{{ $items['dokumentasi']['nama'] }}</td>
                                                <td>{{ $items['dokumentasi']['kuantitas'] }}</td>
                                                <td>{{ number_format($items['dokumentasi']['harga'], 0, ',', '.') }}</td>
                                                <td>{{ number_format($items['dokumentasi']['harga'] * $items['dokumentasi']['kuantitas'], 0, ',', '.') }}</td>
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
                                    <br>
                                    <!-- Button submit di dalam form -->
                                    <button type="submit" class="btn btn-primary">Place Order</button>
                                </div>
                            </div>
                        </form> <!-- Penutupan form dipindah ke sini -->
            </div>
        </div>
    </div>
</body>
@endsection
