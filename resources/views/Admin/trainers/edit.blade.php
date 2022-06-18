@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6> /edit /{{$Trainer->name}}</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.trainers.index')}}">back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('admin.trainers.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$Trainer->id}}">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">name</label>
            <input type="text" name="name" class="form-control"  value="{{$Trainer->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1" value="{{$Trainer->phone}}">
        </div>
           <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">specialty</label>
            <input type="text" name="specialty" class="form-control" id="exampleInputPassword1" value="{{$Trainer->specialty}}">
        </div>
        <div class="my-5"><img src="{{asset('Uploads/Trainers/'.$Trainer->img)}}" height="100px" alt=""></div>
           <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">image</label>
            <input type="file" name="img" class="form-control-file" id="exampleInputPassword1" value="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
