@extends('layout.master')

@section('title', 'Penyewaan Buku')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <h1 class="mb-5">Halaman Penyewaan Buku</h1>

        <div class="mt-5">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    <div class="alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>

        <form action="book-rent" method="post">
            @csrf
            <div class="mb-3">
                <label for="user" form="form-label" class="mb-1">Pengguna</label>
                <select name="user_id" id="user" class="form-control inputBox">
                    <option value="">Pilih Pengguna</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="book" form="form-label" class="mb-1">Buku</label>
                <select name="book_id" id="book" class="form-control inputBox">
                    <option value="">Pilih Buku</option>
                    @foreach ($books as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-100 ">Pilih</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inputBox').select2();
        });
    </script>

@endsection
