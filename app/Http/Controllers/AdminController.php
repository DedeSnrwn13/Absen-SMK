<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\{User, Teacher, HourStart, HourOver, Absen};
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Admin
    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/admin/dashboard/teacher/list');
        } else {
            return redirect()->back()->with('error', 'Kami tidak mengenali Anda.');
        }
    }

    public function admin(Request $request)
    {
        if($request->has('search')) {
            $teachers = Teacher::where('name', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('major', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('gender', 'LIKE', '%'.$request->search.'%')
                                ->orWhere('subjects', 'LIKE', '%'.$request->search.'%')
                                ->orderBy('name', 'desc')
                                ->paginate(20);
        } else {
            $teachers = Teacher::orderBy('name', 'asc')->paginate(20);
        }

        return view('admin.list-teacher', compact('teachers'));
    }

    public function details($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.details-teacher', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.edit-teacher', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $this->validate($request, [
            'avatar'   => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'username' => 'string|min:4|max:50',
            'email'    => 'string|email',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        DB::table('users')
            ->where('id', $teacher->user->id)
            ->update([
                'email'  => $request->email,
                'name'   => $request->name,
                'role'   => 'teacher',
        ]);

        if ($request->hasFile('avatar')) {
            Storage::delete($teacher->avatar);

            $avatar = $request->avatar->store('profile', 'public');
        } elseif ($teacher->avatar) {
            $avatar = $teacher->avatar;
        } else {
            $avatar = null;
        }


        DB::table('teachers')
            ->where('id', $teacher->id)
            ->update([
                'avatar'   => $avatar,
                'nik'      => $request->nik,
                'name'     => $request->name,
                'no_hp'    => $request->no_hp,
                'major'    => $request->major,
                'subjects' => $request->subjects,
                'username' => $request->username,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function editPassword($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.edit-password', compact('teacher'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|string|min:6'
        ]);

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password Berhasil di Ganti!');
    }

    public function working()
    {
        $starts = HourStart::get();
        $overs  = HourOver::get();

        return view('admin.working-hours', compact('starts', 'overs'));
    }

    public function editHourStart($id)
    {
        $start = HourStart::findOrFail($id);

        return view('admin.edit-hour-start', compact('start'));
    }

    public function updateHourStart(Request $request, $id)
    {
        DB::table('hour_starts')
            ->where('id', $id)
            ->update([
                'hours_start' => $request->hours_start,
                'hours_over'  => $request->hours_over,
                'updated_by'  => Auth::user()->name,
        ]);

        // return back();
        return redirect('/admin/dashboard/working-hours')->with('success', 'Data Berhasil di Update');
    }

    public function editHourOver($id)
    {
        $over = HourOver::findOrFail($id);

        return view('admin.edit-hour-over', compact('over'));
    }

    public function updateHourOver(Request $request)
    {

        DB::table('hour_overs')->update([
            'hours_start' => $request->hours_start,
            'hours_over'  => $request->hours_over,
            'updated_by'  => Auth::user()->name,
        ]);

        // return back();
        return redirect('/admin/dashboard/working-hours')->with('success', 'Data Berhasil di Update');
    }

    public function attendance(Request $request)
    {
        if($request->has('search')) {

            $absens = Absen::where('date', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('time_in', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('time_out', 'LIKE', '%'.$request->search.'%')
                            ->orderBy('time_in', 'desc')
                            ->paginate(120);
        } else {
            $absens  = Absen::orderBy('date', 'desc')->paginate(120);
        }

        return view('admin.attendance-list', compact('absens'));
    }

    public function filterPeriode(Request $request)
    {
        // dd($request);
        try {
            $from_date = $request->from_date;
            $to_date   = $request->to_date;

            $absens = Absen::where('date','>=',$from_date)->whereDate('date','<=',$to_date)->orderBy('date', 'desc')->paginate(120);

            return view('admin.attendance-list', compact('absens'));
        }  catch (\Exception $e) {
            Session::flash('gagal',$e->getMessage());

            return redirect()->back();
        }
    }

    public function detailAbsen($id)
    {
        $teacher    = Teacher::findOrFail($id);
        $date       = date("Y-m-d");
        $teacher_id = $teacher->id;

        $data_absen = Absen::where(['teacher_id' => $teacher_id])->orderBy('date', 'desc')->paginate(20);

        return view('admin.details-attendance', compact('data_absen', 'teacher'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'excel' => 'required|file|mimes:xlsx',
        ]);

        Excel::import(new UsersImport, $request->file('excel'));

        return redirect()->back()->with('success', 'Import Data Guru Berhasil!');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'absen.xlsx');

    }

    public function logoutAdmin()
    {
        Auth::logout();

        return redirect()->route('login.admin');
    }
}
