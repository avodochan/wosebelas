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
                          <form action="{{ route('customer.store') }}" method="POST"
                          enctype="multipart/form-data">
                          @csrf
                            <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Nama</label>
                              <input type="nama" class="form-control" name="nama">
                            </div>
                            <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Email</label>   
                              <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-md-6">
                              <label for="inputAddress" class="form-label">No Telepon</label>
                              <input type="text" class="form-control" name="no_telepon">
                            </div>
                            <div class="col-md-6">
                              <label for="inputAddress2" class="form-label">NIK</label>
                              <input type="text" class="form-control" name="nik">
                            </div>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Gender</label>
                              <select id="inputState" class="form-select" name="gender">
                                <option selected>Choose...</option>
                                <option value="wanita">Wanita</option>
                                <option value="pria">Pria</option>
                              </select>
                            </div>
                            <div class="col-md-12">
                              <label for="inputCity" class="form-label">Alamat</label>
                              <input type="text" class="form-control" name="alamat">
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