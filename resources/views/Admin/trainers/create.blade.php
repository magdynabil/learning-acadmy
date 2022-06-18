@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>trainers /create New</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.trainers.index')}}">back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('admin.trainers.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">specialty</label>
            <input type="text" name="specialty" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">image</label>
            <input type="file" name="img" class="form-control-file" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
