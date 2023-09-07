@extends('layout.master')

@section('title', 'Buku')

@section('content')
    <h1>Daftar Buku</h1>
    @include('book.book-modal')
    <div class="my-5 d-flex justify-content-end">
        <a href="/book-deleted" class="btn btn-secondary me-3">Data Yang Dihapus</a>
        <a href="/book-add" class="btn btn-primary">Tambah Data</a>
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

    <script src="{{ asset('js/script.js') }}"></script>

@endsection
