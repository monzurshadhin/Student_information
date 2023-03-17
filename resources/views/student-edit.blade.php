@extends('master')
@section('content')
    <section>
        <div class="container my-5">
            <h1 class="text-center my-5">Student Information</h1>
            <form class="row g-3" method="POST" action="{{route('student.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$student->id}}">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{$student->name}}" name="name" id="inputName">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{$student->email}}" name="email" id="inputEmail4">
                </div>
                <div class="col-md-12">
                    <label for="image1" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image1">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <textarea type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">{{$student->address}}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label" >Department</label>
                    <select id="inputState" class="form-select" name="department">
                        <option>Choose...</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}" {{$department->id==$student->department?'selected':''}}>{{$department->department_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label d-block">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" {{$student->gender=='Male'?'checked':''}} value="Male">
                        <label class="form-check-label" for="gender1">MALE</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" {{$student->gender=='Female'?'checked':''}} value="Female">
                        <label class="form-check-label" for="gender2">FEMALE</label>
                    </div>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary form-control my-4">Update</button>
                </div>
            </form>
        </div>
    </section>
@endsection
