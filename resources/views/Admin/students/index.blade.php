@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>students</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.students.create')}}">add new students</a>
    </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">specialty</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        @if($student->phone!=null)
                        {{$student->phone}}
                        @else
                        no phone found
                        @endif
                    </td>
                    <td>   @if($student->specialty!=null)
                            {{$student->specialty}}
                        @else
                            no phone found
                        @endif
                    </td>

                    <td>
                        <a class="btn btn-sm btn-info"href="{{route('admin.students.edit',$student->id)}}">edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('admin.students.delete',$student->id)}}">delete</a>
                        <a class="btn btn-sm btn-primary" href="{{route('admin.students.showCourses',$student->id)}}">show curses</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    <div class="container col-12 d-flex justify-content-center">{{ $students->links() }}</div>

@endsection
