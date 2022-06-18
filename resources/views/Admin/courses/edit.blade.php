@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>courses /edit /{{$courses->name}}</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.courses.index')}}">back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('admin.courses.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$courses->id}}">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{$courses->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">category</label>
            <select class="form-control" name="cat_id" id="exampleFormControlSelect1">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"  @if($category->id==$courses->cat_id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">trainer</label>
            <select class="form-control" name="trainer_id" id="exampleFormControlSelect1">
                @foreach($trainers as $trainer)
                    <option value="{{$trainer->id}}" @if($trainer->id==$courses->trainer_id) selected @endif>{{$trainer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">small description</label>
            <input type="text" name="small_desc" class="form-control" id="exampleInputPassword1" value="{{$courses->small_desc}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">description</label>
            <textarea name="desc" class="form-control" rows="6"  >{{$courses->desc}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">price</label>
            <input type="number" name="price" class="form-control" id="exampleInputPassword1" value="{{$courses->price}}">
        </div>
        <div class="my-5"><img src="{{asset('Uploads/Cources/'.$courses->img)}}" height="100px" alt=""></div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">image</label>
            <input type="file" name="img" class="form-control-file" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
