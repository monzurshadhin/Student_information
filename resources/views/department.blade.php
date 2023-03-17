@extends('master')
@section('content')
    <section>
        <div class="container my-5">
            <h1 class="text-center my-5">Student Information</h1>
            <form class="row g-3" method="POST" action="{{route('department.add')}}">
                @csrf
                <h5>{{session('message')}}</h5>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Department Code</label>
                    <input type="text" class="form-control" name="department_code" id="inputName">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Department Name</label>
                    <input type="text" class="form-control" name="department_name" id="inputEmail4">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary form-control my-4">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <section class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Department Code</th>
                <th scope="col">Department Name</th>
                <th scope="col">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <th scope="row">{{$department->id}}</th>
                    <td>{{$department->department_code}}</td>
                    <td>{{$department->department_name}}</td>
                    <td>
                        <a href="{{route('department.edit',['dept_id'=>$department->id])}}" class="btn btn-outline-primary">Edit</a>
                        <a href="{{route('department.delete',['dept_id'=>$department->id])}}" class="btn btn-outline-danger">Delete</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
