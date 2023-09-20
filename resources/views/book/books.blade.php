@extends('layout.master')

@section('title', 'Buku')

@section('content')
    <h1>Daftar Buku</h1>
    @include('book.book-modal')
    <div class="mt-5 d-flex justify-content-end">
        <a href="/book-deleted" class="btn btn-secondary me-3">Data Yang Dihapus</a>
        <a href="/book-add" class="btn btn-primary">Tambah Data</a>
        {{-- <div class="row d-flex justify-content-end">
            <div>
                <a class="btn btn-secondary-outline" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end search-bar" aria-labelledby="dropdownMenuLink" >
                    <div class="mt-3 d-flex justify-content-end">
                        <form action="books" method="get" class="d-flex justify-content-end" style="width: 600px">
                            <div class="input-group">
                                <input type="search" class="form-control me-2" placeholder="Cari . . ." name="search"
                                    aria-label="Search" autocomplete="off">
                            </div>
                            @if ($search)
                            <div class="input-group-append">
                                <a href="/books" class="btn btn-outline-danger me-2" style="width: 60px">batal</a>
                            </div>
                            @endif
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" style="width: 60px">Cari</button>
                            </div>
                        </form>
                    </div>
                </ul>
            </div>
        </div> --}}
    </div>
    <div class="mt-3 d-flex justify-content-end">
        <form action="books" method="get" class="d-flex justify-content-end" style="width: 450px">
            <div class="input-group">
                <input type="search" class="form-control me-2" placeholder="Cari . . ." name="search" aria-label="Search"
                    autocomplete="off">
            </div>
            @if ($search)
                <div class="input-group-append">
                    <a href="/books" class="btn btn-outline-danger me-2" style="width: 60px">Batal</a>
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

    <div class="my-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->book_code }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @foreach ($item->categories as $category)
                                    {{ $category->name }} <br />
                                @endforeach
                            </td>
                            <td>{{ $item->status }}</td>
                            <td class="text-center">
                                <a href="/book-edit/{{ $item->slug }}" class="btn btn-warning">Edit</a>
                                <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger"
                                    data-bs-whatever="{{ $item->slug }}">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="{{ asset('js/script.js') }}"></script>

@endsection
