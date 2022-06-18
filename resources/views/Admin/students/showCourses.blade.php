@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>students /show courses </h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.students.index')}}">back</a>
        <a class="btn btn-sm btn-primary"href="{{route('admin.students.add_to_course',$student_id)}}">add to course</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>

            @foreach($courses as $course)
                <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <th scope="row"> {{$course->name}}</th>
                    <td>
                        @if($course->pivot->status != 'approve')
                        <a class="btn btn-sm btn-info"href="{{route('admin.students.approveCourse',[$student_id,$course->id])}}">Approve</a>
                        @endif
                        @if($course->pivot->status != 'reject')
                        <a class="btn btn-sm btn-danger" href="{{route('admin.students.rejectCourse',[$student_id,$course->id])}}">Reject</a>
                        @endif
                    </td>
                </tr>

            @endforeach


        </tbody>
    </table>

@endsection
