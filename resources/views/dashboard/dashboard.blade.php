@extends('layout.master')

@section('title', 'Beranda')

@section('content')

    <h1>Selamat datang, {{ Auth::user()->username }} !</h1>

    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6"><i class="fas fa-books"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-name fw-bold">Buku</div>
                        <div class="card-no">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6"><i class="far fa-list-ul"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-name fw-bold">Kategori</div>
                        <div class="card-no">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6"><i class="far fa-users"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-name fw-bold">Pengguna</div>
                        <div class="card-no">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>#Catatan Sewa</h2>
        <div class="table-responsive">
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pengguna</th>
                        <th>Buku</th>
                        <th>Tangggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Waktu Pengembalian</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentlog as $item)
                        <tr
                            class="{{ $item->actual_return_date == null
                                ? ($item->return_date < date('Y-m-d')
                                    ? 'text-white bg-danger'
                                    : 'text-black')
                                : ($item->return_date < $item->actual_return_date
                                    ? 'text-white bg-warning'
                                    : 'text-white bg-success') }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->rent_date }}</td>
                            <td>{{ $item->return_date }}</td>
                            <td>{{ $item->actual_return_date }}</td>
                            <td>{{ $item->actual_return_date == null
                                ? ($item->return_date < date('Y-m-d')
                                    ? 'Belum Mengembalikan'
                                    : 'Sedang Meminjam')
                                : ($item->return_date < $item->actual_return_date
                                    ? 'Telat Mengembalikan'
                                    : 'Sudah Mengembalikan') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
