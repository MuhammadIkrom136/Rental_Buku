@extends('layout.master')

@section('title', 'Kategori')
{{-- @section('title', 'Dashboard') --}}

{{-- @section('page-name', 'dashboard') --}}

@section('content')

    <h1>Daftar Kategori Dihapus</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/categories" class="btn btn-secondary" style="width: 100px">Kembali</a>
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
                    <th>Nama</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            @foreach ($deletedCategories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">
                        <a href="category-restore/{{ $item->slug }}" class="btn btn-warning">Pulihkan</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
