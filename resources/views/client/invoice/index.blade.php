@extends('layouts.client.sectionitem')
@extends('layouts.client.mainnavbar')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <script src="{{asset('/assets/static/js/initTheme.js')}}"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <div class="content-wrapper container">
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h1 style="text-align: right">Invoice</h1>
                                            <p style="text-align: right">{{ $order->id_pemesanan }}</p>
                                            <p style="text-align: right">{{ $order->created_at->format('d-m-Y') }}</p>
                                            <br>   
                                        </div>
                                        <div class="card-body">
                                            <p style="text-align: left">{{ $customer->nama }}</p>
                                            <p style="text-align: left">{{ $customer->email }}</p>
                                            <p style="text-align: left">{{ $customer->phone }}</p>
                                            
                                            <table class="table table-bordered">
                                                
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th>Harga</th>
                                                </tr>
                                                
                                                @foreach ($order->items as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                                
                                                <tr>
                                                    <td colspan="2"><strong>Total</strong></td>
                                                    <td><strong>Rp {{ number_format($order->total_biaya, 0, ',', '.') }}</strong></td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>      
    </div>
    <script src="{{asset('assets/static/js/components/dark.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/horizontal-layout.js')}}"></script>
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/compiled/js/app.js')}}"></script>
    <script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/dashboard.js')}}"></script>

</body>

</html>