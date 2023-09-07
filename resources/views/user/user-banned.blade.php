@extends('layout.master')

@section('title', ' Banned Users')

@section('content')

    <h1>Pengguna Yang Dilarang</h1>

    <div class="my-5 mb-3 d-flex justify-content-end">
        <a href="/users" class="btn btn-secondary me-3" style="width: 100px">Kembali</a>
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
                @foreach ($banned as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ($item->phone)
                                {{ $item->phone }}
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/user-restore/{{ $item->slug }}" class="btn btn-warning">Pulihkan</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
