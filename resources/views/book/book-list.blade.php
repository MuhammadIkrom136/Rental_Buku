@extends('layout.master')

@section('title', 'Daftar Buku')

@section('content')

    <form action="" method="GET" class="d-flex">
        <select name="category" id="category" class="form-select me-2">
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @if ($search)
            <a href="/" class="btn btn-outline-danger me-2" style="width: 100px">Batal</a>
        @endif
        <button class="btn btn-outline-primary" type="submit" style="width: 100px">Cari</button>
    </form>

    <div class="my-5">
        <div class="row">
            @foreach ($books as $item)
                <div class="col-lg-2 col-md-3 col-sm-6 mb-3">
                    <div class="card h-100">
                        <img src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('images/foto.png') }}"
                            class="card-img-top" draggable="false">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->book_code }}</h5>
                            <p class="card-text">{{ $item->title }}</p>
                            <p
                                class="card-text text-end fw-bold {{ $item->status == 'tersedia' ? 'text-success' : 'text-danger' }}">
                                {{ $item->status }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
