@extends('layout.master')

@section('title', 'Catatan Sewa')

@section('content')
    <h1>Daftar Catatan Sewa</h1>

    <div class="mt-5">
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
