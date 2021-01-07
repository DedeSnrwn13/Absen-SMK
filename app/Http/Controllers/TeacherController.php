<?php

namespace App\Http\Controllers;

use App\{User, Absen, HourStart, HourOver};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function jamkerja()
    {
        $starts = HourStart::all();
        $overs  = HourOver::all();

        return view('teacher.working-hours', compact('starts', 'overs'));
    }

    // Teacher
    public function loginTeacher()
    {
        return view('teacher.login');
    }

    public function postLoginTeacher(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/teacher/checkin');
        } else {
            return redirect()->back()->with('error', 'Kami Tidak dapat menemukan kredensial yang Anda masukkan.');
        }
    }

    public function checkin()
    {
        $user       = Auth::user();
        $date       = date("Y-m-d");
        $teacher_id = Auth::user()->teacher->id;

        $cek_absen  = Absen::where(['teacher_id' => $teacher_id, 'date' => $date])->get()->first();

        if (is_null($cek_absen)) {
            $info = array(
                "status" => "Anda Belum Melakukan Absensi Masuk",
                "btnIn"  => "",
                "btnOut" => "disabled",
            );
        } elseif ($cek_absen->time_out == NULL) {
            $info = array(
                "status" => "Jangan Lupa Absen Pulang",
                "btnIn"  => "disabled",
                "btnOut" => "",
            );
        } else {
            $info = array(
                "status" => "Selamat! Absensi Hari ini telah selesai!",
                "btnIn"  => "disabled",
                "btnOut" => "disabled",
            );
        }

        return view('teacher.checkin', compact('user', 'info'));
    }

    public function report()
    {
        $user       = Auth::user();
        $date       = date("Y-m-d");
        $teacher_id = Auth::user()->teacher->id;

        $data_absen = Absen::where(['teacher_id' => $teacher_id])->orderBy('date', 'desc')->paginate(20);

        return view('teacher.view-report', compact('data_absen', 'user'));
    }

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function attendance(Request $request)
    {
        $teacher_id = Auth::user()->teacher->id;
        $date    = date('Y-m-d');
        $time    = date('H:i:s');
        $note    = $request->note;

        $absen = new Absen;

        if (isset($request["btnIn"])) {
            $cek_double = $absen->where(['date' => $date, 'teacher_id' => $teacher_id])->count();

            if ($cek_double > 0) {
                return redirect()->back();
            }

            $absen->create([
                'teacher_id' => $teacher_id,
                'date'       => $date,
                'time_in'    => $time,
                'note'       => $note,
            ]);

            return redirect()->back()->with('success', 'absen berhasil');

        } elseif (isset($request["btnOut"])) {
            $absen->where(['date' => $date, 'teacher_id' => $teacher_id])->update([
                'time_out' => $time,
                'note'     => $note,
            ]);

            return redirect()->back()->with('successOut', 'absen berhasil');
        }

        return $request->all();
    }

    public function logoutTeacher()
    {
        Auth::logout();

        return redirect()->route('login.teacher');
    }
}
