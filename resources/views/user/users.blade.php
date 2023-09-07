@extends('layout.master')

@section('title', 'Pengguna')

@section('content')

    <h1>Daftar Pengguna</h1>
    @include('user.user-modal')
    <div class="my-5 mb-3 d-flex justify-content-end">
        <a href="/user-banned" class="btn btn-secondary me-3">Pengguna Yang Diblokir</a>
        <a href="/registered-users" class="btn btn-primary">Konfirmasi Pengguna</a>
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

    <script src="{{ asset('js/script.js') }}"></script>

@endsection
