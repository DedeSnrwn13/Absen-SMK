<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function login()
    {
        return view('teacher.login');
    }
}
