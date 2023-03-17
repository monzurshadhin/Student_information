<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public static $info,$image,$imageName,$directory,$imageURL,$update;

    public static function store($request)
    {
        self::$info= new Student();
        self::$info->name = $request->name;
        self::$info->email = $request->email;
        self::$info->address = $request->address;
        self::$info->department = $request->department;
        self::$info->gender = $request->gender;
        self::$info->image = self::saveImage($request);
        self::$info->save();
    }
    private static function saveImage($request){
        self::$image=$request->file('image');
        self::$imageName=rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory='upload/student_image/';
        self::$imageURL = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageURL;
    }

    public static function studentUpdate($request)
    {
        self::$update= Student::find($request->id);
        self::$update->name=$request->name;
        self::$update->email=$request->email;
        self::$update->address=$request->address;
        self::$update->department=$request->department;
        self::$update->gender=$request->gender;
        if($request->file('image')){
            if(self::$update->image){
               if (file_exists(self::$update->image)){
                   unlink(self::$update->image);
                   self::$update->image = self::saveImage($request);
               }
            }
            else{
                self::$update->image = self::saveImage($request);
            }
        }
        self::$update->save();

    }
}
