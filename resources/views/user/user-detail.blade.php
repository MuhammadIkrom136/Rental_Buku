@extends('layout.master')

@section('title', 'Users')

@section('content')

    <h1>Detail Pengguna</h1>

    <div class="my-5 mb-3 d-flex justify-content-end">
        @if ($user->status == 'inactive')
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-info me-3" style="width: 100px">Setujui</a>
        @endif
        <a href="/users" class="btn btn-secondary" style="width: 100px">Kembali</a>
    </div>

    <div class="my-3 w-50">
        <table style="width: 100%">
            <tr>
                <th class="">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" readonly value="{{ $user->username }}">
                    </div>
                </th>
                <th>
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="text" class="form-control" readonly value="{{ $user->phone }}">
                    </div>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-control" readonly
                            style="resize: none;">{{ $user->address }}</textarea>
                    </div>
                </td>
            </tr>
        </table>
        <div class="mb-3">
            <label for="" class="form-label">Status</label>
            <input type="text" class="form-control" readonly value="{{ $user->status }}">
        </div>
    </div>

    <div class="mt-5">
        <h1>Catatan Peminjaman Pengguna</h1>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>

@endsection
