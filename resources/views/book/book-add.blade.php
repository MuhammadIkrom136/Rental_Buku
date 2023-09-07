@extends('layout.master')

@section('title', 'Buku')


{{-- @section('page-name', 'Add Category') --}}

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Tambahkan Buku</h1>

    <div class="mt-5 w-75">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" type="button" data-bs-dismiss="alert"
            aria-label="Close" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <strong>
                            <li>{{ $error }}</li>
                        </strong>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="book-add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Kode</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Kode Buku"
                    autocomplete="off" value="{{ old('book_code') }}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Judul Buku"
                    autocomplete="off" value="{{ old('book_code') }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <a href="/books" class="btn btn-secondary" style="width: 150px">Kembali</a>
                <button class="btn btn-primary" type="submit" style="width: 150px">Simpan</button>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>

@endsection
