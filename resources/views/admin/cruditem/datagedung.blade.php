<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dekorasi</title>
    <link rel="shortcut icon" href="{{ asset('/assets/admin/admintl/assets/compiled/svg/favicon.svg') }}"
        type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('/assets/admin/admintl/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/admintl/assets/compiled/css/table-datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/admintl/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/admintl/assets/compiled/css/app-dark.css') }}">
</head>

<body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <script src="{{ asset('/assets/admin/admintl/assets/static/js/initTheme.js') }}"></script>
    @include('layouts.admin.sidebar')
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            {{-- form add --}}
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data Gedung</h4>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('gedung.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nama Gedung</label>
                                                <input type="text" class="form-control"
                                                    placeholder="cth : Paket Pengantin Jawa" name="nama_gedung">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-4">
                                            <div class="form-group mb-3">
                                                <label for="first-name-column">Tipe Gedung</label>
                                                <select class="form-select" name="tipe_gedung">
                                                     <option value disabled></option>
                                                     <option value="indoor">Indoor</option>
                                                     <option value="outdoor">Outdoor</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-4">
                                            <div class="form-group mb-3">
                                                <label for="first-name-column">Status Gedung</label>
                                                <select class="form-select" name="status_gedung">
                                                     <option value disabled></option>
                                                     <option value="tersedia">Tersedia</option>
                                                     <option value="tidak_tersedia">Tidak Tersedia</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-4">
                                            <div class="form-group">
                                                <label for="first-name-column">Kapasitas Gedung</label>
                                                <input type="text" class="form-control"
                                                    placeholder="cth : Paket Pengantin Jawa" name="kapasitas_gedung">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-3">
                                                <label for="first-name-column">Alamat Gedung</label>
                                                <textarea class="form-control" rows="2" name="alamat_gedung"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-3">
                                                <label for="first-name-column">Deskripsi Gedung</label>
                                                <textarea class="form-control" rows="3" name="deskripsi_gedung"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Harga Gedung</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" placeholder="cth : 8000000"
                                                        class="form-control" name="harga_sewa_gedung">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Foto Thumbnail Gedung</label>
                                                <input type="file" name="thumbnail_gedung" accept="image/*">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Foto Gedung</label>
                                                <input type="file" name="foto_gedung[]" multiple accept="image/*">
                                            </div>
                                        </div>


                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- show table --}}
            <div class="page-heading">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                Data Dokumentasi
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                @forelse ($gedung as $ged)
                                    <tr>
                                        <td>{{ $ged->id_gedung }}</td>
                                        <td>{{ $ged->nama_gedung }}</td>
                                        <td>Rp {{ $ged->harga_sewa_gedung }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                                data-bs-target="#info">
                                                <i class="bi bi-eye-fill"></i></button>
                                            <button type="button" class="btn btn-outline-warning"
                                                data-bs-toggle="modal" data-bs-target="#warning">
                                                <i class="bi bi-pencil-square"></i></button>

                                            {{-- detail --}}
                                            <div class="modal fade text-left" id="info" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title white" id="myModalLabel130">Info
                                                                Modal
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $ged->foto_gedung }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="button" class="btn btn-info ms-1"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Accept</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- edit --}}
                                            <div class="modal fade text-left" id="warning" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h5 class="modal-title white" id="myModalLabel140">Warning
                                                                Modal
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tart lemon drops macaroon oat cake chocolate toffee
                                                            chocolate
                                                            bar icing. Pudding jelly beans
                                                            carrot cake pastry gummies cheesecake lollipop. I love
                                                            cookie
                                                            lollipop cake I love sweet
                                                            gummi bears cupcake dessert.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>

                                                            <button type="button" class="btn btn-warning ms-1"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Accept</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center">Tidak ada data ditemukan</td>
                                    </tr>
                                    
                                @endforelse

                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('/assets/admin/admintl/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('/assets/admin/admintl/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}">
    </script>


    <script src="{{ asset('/assets/admin/admintl/assets/compiled/js/app.js') }}"></script>



    <script src="{{ asset('/assets/admin/admintl/assets/extensions/simple-datatables/umd/simple-datatables.js') }}">
    </script>
    <script src="{{ asset('/assets/admin/admintl/assets/static/js/pages/simple-datatables.js') }}"></script>

</body>

</html>
