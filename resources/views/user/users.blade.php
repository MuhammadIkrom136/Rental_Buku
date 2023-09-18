@extends('layout.master')

@section('title', 'Pengguna')

@section('content')

    <h1>Daftar Pengguna</h1>
    @include('user.user-modal')
    <div class="my-5 mb-3 d-flex justify-content-end">
        <a href="/user-banned" class="btn btn-secondary me-3">Pengguna Yang Diblokir</a>
        <a href="/registered-users" class="btn btn-primary">Konfirmasi Pengguna</a>
        {{-- <div class="row d-flex justify-content-end">
            <div class="dropdown">
                <a class="btn btn-secondary-outline" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end search-bar" aria-labelledby="dropdownMenuLink">
                    <div class="col-12">
                        <form action="users" method="get" class="d-flex">
                            <div class="input-group">
                                <input type="search" class="form-control me-2" placeholder="Cari . . ." name="search"
                                    aria-label="Search" autocomplete="off">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" style="width: 100px">Cari</button>
                            </div>
                        </form>
                    </div>
                </ul>
            </div>
        </div> --}}
    </div>
    <div class="mt-3 d-flex justify-content-end">
        <form action="users" method="get" class="d-flex justify-content-end" style="width: 450px">
            <div class="input-group">
                <input type="search" class="form-control me-2" placeholder="Cari . . ." name="search"
                    aria-label="Search" autocomplete="off">
            </div>
            @if ($search)
            <div class="input-group-append">
                <a href="/users" class="btn btn-outline-danger me-2" style="width: 60px">Batal</a>
            </div>
            @endif
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit" style="width: 60px">Cari</button>
            </div>
        </form>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                <div class="alert-dismissible fade show" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
    <div class="my-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengguna</th>
                        <th>Telepon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>
                                @if ($item->phone)
                                    {{ $item->phone }}
                                @endif
                            </td> 
                            <td class="text-center">
                                <a href="/user-detail/{{ $item->slug }}" class="btn btn-info">Detail</a>
                                <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger"
                                    data-bs-whatever="{{ $item->slug }}">Blokir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        <script src="{{ asset('js/script.js') }}"></script>

    @endsection
