@extends('layouts.app-two')

@section('title')
    Log In - Guru
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="row d-flex justify-content-center" style="margin-top: 140px;">
        <div class="col-md-4 offset"></div>
        <div class="col-md-4">
            <div class="col-md-12 text-center mb-3">
                <span class="title"><b>ABSENSI</b> GURU</span>
            </div>
            <form>
                <div class="form-group col-md-12">
                    <label for="formGroupEmail">E-mail:</label>
                    <div class="d-flex align-items-center">
                        <div class="border border-white py-1 px-2" >
                            <i class="fas fa-user" style="width: 24px;"></i>
                        </div>
                        <input type="text" class="form-control" id="formGroupEmail" placeholder="example@email.com">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="formGroupPassword">Kata Sandi:</label>
                    <div class="d-flex align-items-center">
                        <div class="border border-white py-1 px-2" >
                            <i class="fas fa-lock " style="width: 24px;"></i>
                        </div>
                        <input type="text" class="form-control" id="formGroupPassword" placeholder="Kata Sandi">
                        <i class="fas fa-eye bg-white" style="position: absolute; right: 0; margin-right: 25px; cursor: pointer;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 offset"></div>
                    <div class="col-md-4 ">
                        <button type="button" class="btn btn-info w-100">Masuk</button>
                    </div>
                    <div class="col-md-4 offset"></div>
                </div>
            </form>
        </div>
        <div class="col-md-4 offset"></div>
    </div>



@endsection
