<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function login()
    {
        return view('teacher.login');
    }

    public function checkin()
    {
        return view('teacher.checkin');
    }

    public function report()
    {
        return view('teacher.view-report');
    }

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/teacher/checkin');
        }

        return redirect()->back();
    }
}
