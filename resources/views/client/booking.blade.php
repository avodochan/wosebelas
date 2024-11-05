@extends('layouts.client.clientfrontend')
@extends('layouts.client.button')
@section('content')
<body style="background-color: #F4F7FE">
    
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">
        @extends('layouts.client.nav_vendor')
        
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-12">

                    <div class="container mt-5">
                        <div class="row">
                            
                            
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <div class="container mt-5">
                                    <div class="row">
                                        
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Submit Pilihan</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="right-content">
                        <div class="row">
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </body>
@endsection