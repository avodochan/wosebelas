@extends('layouts.client.clientfrontend')
@extends('layouts.client.nav_vendor')
@extends('layouts.client.button')
@extends('layouts.client.form')
@section('content')
<body style="background-color: #F4F7FE">
    
            <div class="col-lg-12" style="justify-content: center">
                    <div class="filter-form">
                        <h2 class="text-center mb-4">Filter Tanggal Acara & Kapasitas</h2>
                        <form action="{{ route('client.booking.filter') }}" method="GET">
                            @csrf
                    
                            <!-- Tanggal Acara -->
                            <div class="mb-3">
                                <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
                                <input type="date" name="tanggal_acara" class="form-control" id="tanggal_acara" required>
                            </div>
                    
                            <!-- Kapasitas Tamu -->
                            <div class="mb-3">
                                <label for="kapasitas" class="form-label">Kapasitas Tamu</label>
                                <input type="number" name="kapasitas" class="form-control" id="kapasitas" placeholder="Masukkan kapasitas tamu" required>
                            </div>
                    
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </form>
                </div>
            </div>
            
            
    
  </body>
@endsection