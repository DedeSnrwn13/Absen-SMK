@extends('layouts.app-two')

@section('title')
    Log In - SMKN 1 CIBADAK
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="row d-flex justify-content-center" style="margin-top: 140px;">
        <div class="col-md-4 offset"></div>
        <div class="col-md-4">
            <div class="col-md-12 text-center mb-3">
                <span class="title"><b>LOGIN</b> GURU</span>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group col-md-12">
                    <label for="formGroupEmail">E-mail:</label>
                    <div class="d-flex align-items-center">
                        <div class="border border-white py-1 px-2" >
                            <i class="fas fa-user" style="width: 24px;"></i>
                        </div>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="formGroupEmail" placeholder="example@email.com">
                    </div>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-12">
                    <label for="formGroupPassword">Kata Sandi:</label>
                    <div class="d-flex align-items-center">
                        <div class="border border-white py-1 px-2" >
                            <i class="fas fa-lock " style="width: 24px;"></i>
                        </div>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="formGroupPassword" placeholder="Kata Sandi">
                        <i class="fas fa-eye bg-white"  onclick="myFunction()" style="position: absolute; right: 0; margin-right: 25px; cursor: pointer;"></i>
                    </div>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4 offset"></div>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn-info w-100">Masuk</button>
                    </div>
                    <div class="col-md-4 offset"></div>
                </div>
            </form>
        </div>
        <div class="col-md-4 offset"></div>
    </div>
@endsection

@section('js')
    <script>
        function myFunction() {
            var pw1 = document.getElementById("formGroupPassword");

            if (pw1.type === "password") {
                pw1.type = "text";
            } else {
                pw1.type = "password";
            }
        }
    </script>
@endsection
