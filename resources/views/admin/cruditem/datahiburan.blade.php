<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hiburan</title>
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
                                <h4 class="card-title">Tambah Data Hiburan</h4>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('hiburan.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nama Hiburan</label>
                                                <input type="text" class="form-control" name="nama_paket_hiburan">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-3">
                                                <label for="first-name-column">Deskripsi Hiburan</label>
                                                <textarea class="form-control" rows="3" name="deskripsi_hiburan"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Harga Hiburan</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="harga_sewa_hiburan">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Foto Thumbnail Hiburan</label>
                                                <input type="file" name="fthumbnail_hiburan" accept="image/*" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Foto Hiburan</label>
                                                <input type="file" name="foto_hiburan[]" multiple accept="image/*" class="form-control">
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
                                Data hiburan
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

                                @forelse ($hiburan as $hiburan)
                                    <tr>
                                        <td>{{ $hiburan->id_hiburan }}</td>
                                        <td>{{ $hiburan->nama_paket_hiburan }}</td>
                                        <td>Rp {{ number_format($hiburan->harga_sewa_hiburan, 0, ',', '.') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $hiburan->id_hiburan }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $hiburan->id_hiburan }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>                                        
                                        </td>
                                        
                                        {{-- detail --}}
                                        <div class="modal fade" id="detailModal{{ $hiburan->id_hiburan }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $hiburan->id_hiburan }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="detailModalLabel{{ $hiburan->id_hiburan }}">Detail {{ $hiburan->nama_paket_hiburan }}</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <img src="{{ asset('storage/' . $hiburan->thumbnail_hiburan) }}" class="img-thumbnail" style="max-width: 315px;" alt="Thumbnail hiburan">
                                                                <h6 class="mt-3">Foto Lainnya:</h6>
                                                                <div class="d-flex flex-wrap">
                                                                    @foreach ($hiburan->images as $image)
                                                                        <img src="{{ asset('storage/' . $image->foto_hiburan) }}" class="img-thumbnail me-2" style="width: 100px; height: 100px;" alt="Foto hiburan">
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-6">
                                                                <h6>Harga:</h6>
                                                                <p>{{ number_format($hiburan->harga_sewa_hiburan, 0, ',', '.') }}</p>
                                                                <h6>Deskripsi:</h6>
                                                                <p>{!! str_replace(["\r\n", "\n", "\r"], '', nl2br(e($hiburan->deskripsi_hiburan))) !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        {{-- edit --}}
                                        <div class="modal fade" id="editModal{{ $hiburan->id_hiburan }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit hiburan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('hiburan.update', $hiburan->id_hiburan ?? '') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <img src="{{ asset('storage/' . $hiburan->thumbnail_hiburan) }}" class="img-thumbnail mt-2" style="max-width: 315px;" alt="Thumbnail hiburan">
                                                                    <div class="mt-2">
                                                                        @foreach ($hiburan->images as $image)
                                                                        <div class="d-flex align-items-center mb-2">
                                                                            <img src="{{ asset('storage/' . $image->foto_hiburan) }}" class="img-thumbnail me-2" style="width: 100px; height: 100px;" alt="Foto hiburan">
                                                                            <input type="checkbox" name="delete_foto_hiburan[]" value="{{ $image->id }}" class="form-check-input">
                                                                            <label class="form-check-label ms-2">Hapus</label>
                                                                        </div>
                                                                    @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    @isset($hiburan)
                                                                <div class="form-group mb-3">
                                                                    <label>Nama hiburan</label>
                                                                    <input type="text" name="nama_paket_hiburan" class="form-control" value="{{ $hiburan->nama_paket_hiburan }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label>Deskripsi</label>
                                                                    <textarea name="deskripsi_hiburan" class="form-control" rows="3">{{ $hiburan->deskripsi_hiburan }}</textarea>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label>Harga hiburan</label>
                                                                    <input type="text" name="harga_sewa_hiburan" class="form-control" value="{{ $hiburan->harga_sewa_hiburan }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label>Thumbnail</label>
                                                                    <input type="file" name="thumbnail_hiburan" class="form-control">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label>Foto Lainnya</label>
                                                                    <input type="file" name="foto_hiburan[]" multiple class="form-control">
                                                                    
                                                                </div>
                                                            @else
                                                                <p>Data tidak ditemukan.</p>
                                                            @endisset
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
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
