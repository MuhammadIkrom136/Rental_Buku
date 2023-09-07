@extends('layout.master')

@section('title', 'Buku')


{{-- @section('page-name', 'Add Category') --}}

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Edit Buku</h1>
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

        <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Kode</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Book's Code"
                    autocomplete="off" value="{{ $book->book_code }}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book's Title"
                    autocomplete="off" value="{{ $book->title }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Baru</label>
                <input type="file" name="image" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="currentImage" class="form-label" style="display: block">Gambar sekarang</label>
                <div>
                    @if ($book->cover!='')
                        <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="200px">
                    @else
                        <img src="{{ asset('images/foto.png') }}" alt="" width="200px">
                    @endif
                </div>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="currentCategory" class="form-label">Kategori Sekarang</label>
                <ul>
                    @foreach ($book->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-4">
                <a href="/books" class="btn btn-secondary" style="width: 150px">Batal</a>
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
