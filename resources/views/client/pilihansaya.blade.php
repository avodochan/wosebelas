@extends('layouts.client.clientfrontend') 
@extends('layouts.client.button')
@extends('layouts.client.cards')
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
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card" style="border-radius: 13.33px;">
                <div class="card-body">
                  <h5 class="card-title">Data Pemesan</h5>
                  <!-- form data pemesan -->
                  <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="nama_wanita">Nama Calon Pengantin Wanita</label>
                      <input type="text" class="form-control" name="nama_wanita" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_pria">Nama Calon Pengantin Pria</label>
                        <input type="text" class="form-control" name="nama_pria" required>
                    </div>  
                    <div class="form-group">
                      <label for="no_telp">Nomor Telepon</label>
                      <input type="text" class="form-control" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_acara">Tanggal Acara</label>
                        <input type="date" class="form-control" name="tanggal_acara" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Pilihan Saya</h5>
                      @if(isset($selected_dekorasi))
                          <div class="selected-dekorasi">
                              <img src="{{ asset('storage/' . $selected_dekorasi->thumbnail_dekorasi) }}" 
                                   alt="{{ $selected_dekorasi->nama_dekorasi }}" 
                                   style="max-width: 100%; height: auto;">
                              <h6 class="mt-3">{{ $selected_dekorasi->nama_dekorasi }}</h6>
                              <p class="text-muted">Rp {{ number_format($selected_dekorasi->harga_dekorasi, 0, ',', '.') }}</p>
                          </div>
                      @else
                          <p class="text-danger">Tidak ada dekorasi yang dipilih</p>
                      @endif
                  </div>
              </div>
          </div>
      </div>
    </div>
</body>
@endsection
