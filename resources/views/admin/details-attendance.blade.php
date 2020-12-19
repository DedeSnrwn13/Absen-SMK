@extends('layouts.app')

@section('title') Dashboard Detail Absen - Admin @endsection

@section('css')
    <link href="{{ asset('css/details-attendance.css') }}" rel="stylesheet" />
@endsection

@section('menu')
    <a class="nav-link dashboard " href="/admin/dashboard/teacher/list">
        <div class="sb-nav-link-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Frame">
            <path id="Vector" d="M7 7H17M19 11H5H19ZM19 11C19.5304 11 20.0391 11.2107 20.4142 11.5858C20.7893 11.9609 21 12.4696 21 13V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V13C3 12.4696 3.21071 11.9609 3.58579 11.5858C3.96086 11.2107 4.46957 11 5 11H19ZM19 11V9C19 8.46957 18.7893 7.96086 18.4142 7.58579C18.0391 7.21071 17.5304 7 17 7L19 11ZM5 11V9C5 8.46957 5.21071 7.96086 5.58579 7.58579C5.96086 7.21071 6.46957 7 7 7L5 11ZM7 7V5C7 4.46957 7.21071 3.96086 7.58579 3.58579C7.96086 3.21071 8.46957 3 9 3H15C15.5304 3 16.0391 3.21071 16.4142 3.58579C16.7893 3.96086 17 4.46957 17 5V7H7Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            </svg>
        </div>
        Daftar Guru
    </a>

    <a class="nav-link clock" href="/admin/dashboard/working-hours" >
        <div class="sb-nav-link-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 8V12L15 15L12 8ZM21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        jam kerja
    </a>

    <a class="nav-link absen aktif" href="/admin/dashboard/attendance-list" >
        <div class="sb-nav-link-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 16H9.01M9 5H7C6.46957 5 5.96086 5.21071 5.58579 5.58579C5.21071 5.96086 5 6.46957 5 7V19C5 19.5304 5.21071 20.0391 5.58579 20.4142C5.96086 20.7893 6.46957 21 7 21H17C17.5304 21 18.0391 20.7893 18.4142 20.4142C18.7893 20.0391 19 19.5304 19 19V7C19 6.46957 18.7893 5.96086 18.4142 5.58579C18.0391 5.21071 17.5304 5 17 5H15H9ZM9 5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7H13C13.5304 7 14.0391 6.78929 14.4142 6.41421C14.7893 6.03914 15 5.53043 15 5H9ZM9 5C9 4.46957 9.21071 3.96086 9.58579 3.58579C9.96086 3.21071 10.4696 3 11 3H13C13.5304 3 14.0391 3.21071 14.4142 3.58579C14.7893 3.96086 15 4.46957 15 5H9ZM12 12H15H12ZM12 16H15H12ZM9 12H9.01H9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        daftar absensi
    </a>
@endsection

@section('content')
    <h1 class="title">Detail Absen</h1>

    <div class="line"></div>

    <div class="row">
        <div class="col-md-2">
            <button type="button" class="btn btn-outline-info">
                <a href="/admin/dashboard/attendance-list" style="text-decoration: none;">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    KEMBALI
                </a>
            </button>
        </div>
        <div class="col-md-6 offset"></div>
        <div class="col-md-4 d-flex justify-content-between">
            <div class="col-md-4 px-0">

                <select id="inputState" class="form-control">
                    <option selected>Bulan</option>
                    <option>Januari</option>
                    <option value="">Februari</option>
                    <option value="">Maret</option>
                </select>
            </div>

            <div class="col-md-4">

                <select id="inputState" class="form-control">
                    <option selected>Tahun</option>
                    <option>2020</option>
                    <option value="">2019</option>
                    <option value="">2018</option>
                </select>
            </div>

            <div class="col-md-4 px-0">
                <button type="button" class="btn btn-info">Tampilkan</button>
            </div>
        </div>
    </div>


    <!-- Jika ada data -->
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <div class="col-md-2 pl-0">
                        <img src="{{ asset('img/pf-picture.jpg') }}" alt="">
                    </div>
                    <div class="col-md-3 pr-0 pl-4">
                        <span class="key">NAMA</span><br>
                        <span class="key">Uji komptensi </span>
                    </div>
                    <div class="col-md-1 px-0 text-center">
                        <span class="tikwa">:</span><br>
                        <span class="tikwa">:</span>
                    </div>
                    <div class="col-md-5 pl-0">
                        <span class="value">Abdul Rosit, Drs </span><br>
                        <span class="value">Multimedia</span>
                    </div>
                </div>
                <div class="col-md-1 offset"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-secondary float-right">
                        <i class="far fa-file-alt"></i>
                        Export Laporan
                    </button>
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
