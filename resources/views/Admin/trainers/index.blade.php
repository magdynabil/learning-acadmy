@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>trainers</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.trainers.create')}}">add new category</a>
    </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">name</th>
                <th scope="col">phone</th>
                <th scope="col">specialty</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($Trainers as $trainer)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img height="50px" src="{{asset('Uploads/Trainers/'.$trainer->img)}}" alt="">
                    </td>
                    <td>{{$trainer->name}}</td>
                    <td>
                        @if($trainer->phone!=null)
                        {{$trainer->phone}}
                        @else
                        no phone found
                        @endif
                    </td>
                    <td>{{$trainer->specialty}}</td>

                    <td>
                        <a class="btn btn-sm btn-info"href="{{route('admin.trainers.edit',$trainer->id)}}">edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('admin.trainers.delete',$trainer->id)}}">delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

@endsection
