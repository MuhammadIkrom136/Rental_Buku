@extends('layout.master')

@section('title', 'Profile')

@section('content')

    {{-- <h1>Selamat Datang, {{ Auth::user()->username }} !</h1> --}}

    <div class="">
        <h1>Catatan Peminjaman Anda</h1>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>

@endsection
