@extends('layouts.client.clientfrontend')
@extends('layouts.client.button')
@extends('layouts.client.mainnavbar')
@section('content')
<body style="background-color: #F4F7FE">
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="card">
                        <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Nama</label>
                              <input type="nama" class="form-control" id="nama">
                            </div>
                            <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Email</label>   
                              <input type="email" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-md-6">
                              <label for="inputAddress" class="form-label">No Telepon</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="col-md-6">
                              <label for="inputAddress2" class="form-label">NIK</label>
                              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Gender</label>
                              <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="col-md-12">
                              <label for="inputCity" class="form-label">Alamat</label>
                              <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
  </body>
@endsection