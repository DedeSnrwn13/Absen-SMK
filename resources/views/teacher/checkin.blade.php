@extends('layouts.app-two')

@section('title')
    Check In - Guru
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkin.css') }}">
@endsection

@section('content')
    {{-- @if(Session('suksesregister')) --}}
        {{-- <div id="closed"></div> --}}
        <div class="popup-wrapper" id="popup">
            <div class="popup-container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <img src="{{ asset('img/icon-check.png') }}" alt="">
                    </div>
                    <div class="col-md-12 text-center">
                        <h1 class="text-uppercase berhasil">absen berhasil</h1>
                    </div>
                    <div class="col-md-12 text-center">
                        <span class="desk">Terimakasih anda telah melakukan absen masuk</span>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 offset"></div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-outline-secondary tutup w-100 py-3">Tutup</a>
                            </div>
                            <div class="col-md-3 offset"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}
    <div class="row d-flex justify-content-center" style="margin-top: 75px;">
        <div class="col-md-4 offset"></div>
        <div class="col-md-4 text-center">
            <div class="col-md-12 d-flex justify-content-center">
                <img src="{{ asset('img/foto_profil.jpg') }}" alt="" width="150px" height="150px">
            </div>
            <div class="col-md-12 text-center">
                <h1 class="nama">Siti Sans</h1>
            </div>
            <div class="col-md-12">
                <span class="role">Multimedia - TPHP - Agroindustri /  Matematika</span>
            </div>
            <div class="col-md-12" style="margin-top: 14px; margin-bottom: 24px;">
                <span class="time">07:23 WIB</span> <span class="tanggal">| Senin, 25/11/2020</span>
            </div>
            <div class="col-md-12">
                <form>
                    <div class="row">
                        <div class="col-md-3 offset"></div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-info w-100" id="checkin">Check-In</button>
                        </div>
                        <div class="col-md-3 offset"></div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 offset"></div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-outline-info w-100" id="view">Lihat Laporan</a>
                    </div>
                    <div class="col-md-3 offset"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 offset"></div>
    </div>
@endsection
