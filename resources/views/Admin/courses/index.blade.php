@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>courses</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.courses.create')}}">add new course</a>
    </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img height="50px" width="50px" src="{{asset('Uploads/Cources/'.$course->img)}}" alt="">
                    </td>
                    <td>{{$course->name}}</td>
                    <td>${{$course->price}}</td>
                    <td>
                        <a class="btn btn-sm btn-info"href="{{route('admin.courses.edit',$course->id)}}">edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('admin.courses.delete',$course->id)}}">delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    <div class="container col-12 d-flex justify-content-center">{{ $courses->links() }}</div>


@endsection
