@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>categories /edit /{{$category->name}}</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.cat.index')}}">back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('admin.cat.update')}}">
        @csrf
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{$category->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
