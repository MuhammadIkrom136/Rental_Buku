<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5-pro-master/css/all.css') }}">
</head>

<body>
    @include('login.logout')
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard">R -<mark>Book</mark></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif><i
                                    class="fal fa-home"></i> Beranda</a>
                            <a href="/books" @if (request()->route()->uri == 'books' ||
                                    request()->route()->uri == 'book-add' ||
                                    request()->route()->uri == 'book-deleted' ||
                                    request()->route()->uri == 'book-edit/{slug}' ||
                                    request()->route()->uri == 'book-delete/{slug}') class="active" @endif><i
                                    class="fal fa-book"></i> Buku</a>
                            <a href="/categories" @if (request()->route()->uri == 'categories' ||
                                    request()->route()->uri == 'category-add' ||
                                    request()->route()->uri == 'category-deleted' ||
                                    request()->route()->uri == 'category-edit/{slug}' ||
                                    request()->route()->uri == 'category-delete/{slug}') class="active" @endif><i
                                    class="fal fa-list-alt"></i> Kategori</a>
                            <a href="/users" @if (request()->route()->uri == 'users' ||
                                    request()->route()->uri == 'registered-users' ||
                                    request()->route()->uri == 'user-detail/{slug}' ||
                                    request()->route()->uri == 'user-ban/{slug}' ||
                                    request()->route()->uri == 'user-banned') class="active" @endif><i
                                    class="fal fa-user"></i> Pengguna</a>
                            <a href="/" @if (request()->route()->uri == '/') class="active" @endif><i
                                    class="fal fa-clipboard-list"></i> Daftar Buku</a>
                            <a href="/rentlogs" @if (request()->route()->uri == 'rentlogs') class="active" @endif><i
                                    class="fal fa-history"></i> Catatan Sewa</a>
                            <a href="/book-rent" @if (request()->route()->uri == 'book-rent') class="active" @endif><i
                                    class="fal fa-clipboard-check"></i> Penyewaan Buku</a>
                            <a href="/book-return" @if (request()->route()->uri == 'book-return') class="active" @endif><i
                                    class="fal fa-clipboard-list-check"></i> Pengembalian Buku</a>
                            {{-- <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Penyewaan
                            </a>
                            <div class="collapse" id="collapseExample">
                                <a href="/book-rent" @if (request()->route()->uri == 'book-rent') class="active" @endif><i
                                        class="fal fa-clipboard-check"></i> Penyewaan Buku</a>
                                <a href="/book-return" @if (request()->route()->uri == 'book-return') class="active" @endif><i
                                        class="fal fa-clipboard-check"></i> Pengembalian Buku</a>
                            </div> --}}
                            <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal"><i
                                    class="fal fa-sign-out"></i> Keluar</a>
                        @else
                            <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif><i
                                    class="fal fa-user"></i> Profile</a>
                            <a href="/" @if (request()->route()->uri == '/') class="active" @endif><i
                                    class="fal fa-clipboard-list"></i> Daftar Buku</a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal"><i
                                    class="fal fa-sign-out"></i> Keluar</a>
                        @endif
                    @else
                        <a href="/logout"><i class="fal fa-sign-in"></i> Login</a>
                    @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                    @yield('scripts')
                </div>
            </div>
        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
