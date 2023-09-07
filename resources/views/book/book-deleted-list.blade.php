@extends('layout.master')

@section('title', 'Buku')
{{-- @section('title', 'Dashboard') --}}

{{-- @section('page-name', 'dashboard') --}}

@section('content')
    <h1>Daftar Buku Dihapus</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/books" class="btn btn-secondary" style="width: 100px">Kembali</a>
    </div>
    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            @foreach ($deletedBooks as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td class="text-center">
                        <a href="/book-restore/{{ $item->slug }}" class="btn btn-warning">Pulihkan</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
