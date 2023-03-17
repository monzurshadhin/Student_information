<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public static $store,$update;

    public static function departmentStore($request)
    {
        self::$store = new Department();
        self::$store->department_code = $request->department_code;
        self::$store->department_name = $request->department_name;
        self::$store->save();
    }

    public static function departmentUpdate($request)
    {
        self::$update=Department::find($request->dept_id);
        self::$update->department_code = $request->department_code;
        self::$update->department_name = $request->department_name;
        self::$update->save();

    }
}
