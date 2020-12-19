<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.list-teacher');
    }

    public function details()
    {
        return view('admin.details-teacher');
    }

    public function working()
    {
        return view('admin.working-hours');
    }

    public function attendance()
    {
        return view('admin.attendance-list');
    }

    public function detailAbsen()
    {
        return view('admin.details-attendance');
    }


}
