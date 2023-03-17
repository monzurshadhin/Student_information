<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('home',[
            'students'=>Student::all(),
            'departments'=>Department::all(),
        ]);
    }

    public function student_add(Request $request){
//        return $request->image;
        Student::store($request);
        return back();
    }

    public function studentEdit($s_id)
    {
        return view('student-edit',[
            'student'=>Student::find($s_id),
            'departments'=>Department::all(),
        ]);
    }

    public function studentUpdate(Request $request)
    {
//        return $request;
        Student::studentUpdate($request);
        return redirect('/');

    }

    public function studentDelete($s_id)
    {
        $student = Student::find($s_id);
//        Student::where('id',$s_id)->delete();
        if ($student->image){
            unlink($student->image);
        }
        $student->delete();
        return redirect('/');
    }


}
