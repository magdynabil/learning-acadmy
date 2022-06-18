@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>students /Add Course To /{{$student->name}}</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.students.index')}}">back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('admin.students.addCourse')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$student->id}}">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">courses</label>
            <select class="form-control" name="course_id" id="exampleFormControlSelect1">
                @foreach($courses as $course)
                    <option value="{{$course->id}}" >{{$course->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
