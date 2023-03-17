@extends('master')
@section('content')
    <section>
        <div class="container my-5">
            <h1 class="text-center my-5">Student Information</h1>
            <form class="row g-3" method="POST" action="{{route('add')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="inputName">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="col-md-12">
                    <label for="image1" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image1">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <textarea type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label" >Department</label>
                    <select id="inputState" class="form-select" name="department">
                        <option>Choose...</option>
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label d-block">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="Male">
                        <label class="form-check-label" for="gender1">MALE</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female">
                        <label class="form-check-label" for="gender2">FEMALE</label>
                    </div>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary form-control my-4">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <section class="container">
        <table class="table" style="vertical-align: middle">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Department</th>
                <th scope="col">Gender</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->address}}</td>
                <td>
                @foreach($departments as $department)
                {{$student->department == $department->id?$department->department_name:''}}
                @endforeach
                </td>
                <td>{{$student->gender}}</td>
                <td><img src="{{$student->image}}" height="70px" width="70px" alt=""></td>
                <td>
                    <a href="{{route('student.edit',['s_id'=>$student->id])}}" class="btn btn-outline-primary">Edit</a>
                    <a href="{{route('student-delete',['s_id'=>$student->id])}}" onclick="return confirm('Are you sure to delete..')" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
