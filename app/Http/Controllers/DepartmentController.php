<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index(){
        return view('department',[
            'departments'=>Department::all(),
        ]);
    }

    public function addDepartment(Request $request)
    {
        Department::departmentStore($request);
        return redirect('/department')->with('message','successfully added');
    }

    public function getDepartmentById($id)
    {
        return view('department-edit',[
            'department'=>Department::find($id),
        ]);
    }

    public function updateDepartment(Request $request)
    {
        Department::departmentUpdate($request);
        return redirect()->route('department')->with('message','update Successfully');
    }

    public function deleteDepartment($id)
    {
        Department::where('id',$id)->delete();
        return redirect('department')->with('message','Delete Successfully');
    }

}
