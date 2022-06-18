@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>students /edit /{{$student->name}}</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.students.index')}}">back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('admin.students.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$student->id}}">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">name</label>
            <input type="text" name="name" class="form-control"  value="{{$student->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">email</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="{{$student->email}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1" value="{{$student->phone}}">
        </div>

           <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">specialty</label>
            <input type="text" name="specialty" class="form-control" id="exampleInputPassword1" value="{{$student->specialty}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
