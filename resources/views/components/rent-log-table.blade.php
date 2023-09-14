<div>
    {{-- {{ date('Y-m-d') }} --}}
    <div class="table-responsive">
        <table class="table mt-3">
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
                    {{-- <tr
                    class="{{ $item->return_date < date('Y-m-d') ? 'text-danger' : 'text-black' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->username }}</td>
                    <td>{{ $item->book->title }}</td>
                    <td>{{ $item->rent_date }}</td>
                    <td>{{ $item->return_date }}</td>
                    <td>{{ $item->actual_return_date }}</td>
                </tr> --}}
                @endforeach
            </tbody>
        </table>
    </div>
