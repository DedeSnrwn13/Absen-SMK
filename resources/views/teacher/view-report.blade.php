@extends('layouts.app-two')

@section('title')
    Lihat Laporan - Guru
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/details-attendance.css') }}">
@endsection

@section('content')
<h1 class="title">Detail Absen</h1>

<div class="line"></div>


<!-- Jika ada data -->
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center">
                <div class="col-md-2 pl-0">
                    <img src="{{ asset('img/pf-picture.jpg') }}" alt="">
                </div>
                <div class="col-md-2 px-0">
                    <span class="key">NAMA</span><br>
                    <span class="key">Uji komptensi </span>
                </div>
                <div class="col-md-1 px-0 text-center">
                    <span class="tikwa">:</span><br>
                    <span class="tikwa">:</span>
                </div>
                <div class="col-md-7 pl-0">
                    <span class="value">Abdul Rosit, Drs </span><br>
                    <span class="value">Multimedia</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">JAM MASUK</th>
                            <th scope="col">JAM SELESAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="num text-center">1</th>
                            <td>Minggu, 01-11-2020</td>
                            <td class="text-white"><span class="bg-info px-2 py-1">07:00:21</span></td>
                            <td class="text-white"><span class="bg-info px-2 py-1">17:23:01</span></td>
                        </tr>
                        <tr class="bg-secondary text-white ">
                            <th scope="row" class="num text-center ">2</th>
                            <td>Minggu, 01-11-2020</td>
                            <td><span class="px-2 py-1">-</span></td>
                            <td><span class="px-2 py-1">-</span></td>
                        </tr>
                        <tr class="bg-danger text-white ">
                            <th scope="row" class="num text-center">3</th>
                            <td>Minggu, 01-11-2020</td>
                            <td><span class="px-2 py-1">Tidak Hadir</span></td>
                            <td><span class="px-2 py-1">Tidak Hadir</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
