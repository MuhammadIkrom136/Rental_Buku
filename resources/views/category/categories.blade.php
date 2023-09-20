@extends('layout.master')

@section('title', 'Kategori')
{{-- @section('title', 'Dashboard') --}}

{{-- @section('page-name', 'dashboard') --}}

@section('content')

    <h1>Daftar Kategori</h1>

    @include('category.category-modal')

    <div class="my-5 mb-3 d-flex justify-content-end">
        <a href="/category-deleted" class="btn btn-secondary me-3">Data Yang Dihapus</a>
        {{-- <a href="/category-add" class="btn btn-primary">Tambah Data</a> --}}
        <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary">Tambah Data</a>
        {{-- <div class="row d-flex justify-content-end">
            <div class="dropdown">
                <a class="btn btn-secondary-outline" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end search-bar" aria-labelledby="dropdownMenuLink">
                    <div class="col-12">
                        <form action="categories" method="get" class="d-flex">
                            <div class="input-group">
                                <input type="search" class="form-control me-2" placeholder="Cari . . ." name="search"
                                    aria-label="Search" autocomplete="off">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" style="width: 100px">Cari</button>
                            </div> --}}
        {{-- <select type="search" name="search" id="category" class="form-select me-2" aria-label="Search">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-primary" type="submit" style="width: 100px">Cari</button> --}}
        {{-- </form>
                    </div>
                </ul>
            </div>
        </div> --}}
    </div>
    <div class="mt-3 d-flex justify-content-end">
        <form action="categories" method="get" class="d-flex justify-content-end" style="width: 450px">
            <div class="input-group">
                <input type="search" class="form-control me-2" placeholder="Cari . . ." name="search" aria-label="Search"
                    autocomplete="off">
            </div>
            @if ($search)
                <div class="input-group-append">
                    <a href="/categories" class="btn btn-outline-danger me-2" style="width: 60px">Batal</a>
                </div>
            @endif
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit" style="width: 60px">Cari</button>
            </div>
        </form>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert {{ session('alert-class') }} alert-success alert-dismissible fade show" type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close" role="alert">
                <strong>{{ session('status') }}</strong>
            </div>
        @endif
    </div>


    <div class="mt-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                @foreach ($categories as $item)
                    <tr id="pr">
                        <td>{{ $loop->iteration }}</td>
                        <td id="nama">{{ $item->name }}</td>
                        <td class="text-center">
                            {{-- <a href="category-edit/{{ $item->slug }}" class="btn btn-warning">Edit</a> --}}
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"
                                data-bs-whatever="{{ $item->slug }}">Edit</a>
                            <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger"
                                data-bs-whatever="{{ $item->slug }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

@endsection
