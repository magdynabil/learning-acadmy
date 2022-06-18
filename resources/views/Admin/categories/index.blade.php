@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>categories</h6>
        <a class="btn btn-sm btn-primary"href="{{route('admin.cat.create')}}">add new category</a>
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

            @foreach($cats as $cat)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$cat->name}}</td>
                    <td>
                        <a class="btn btn-sm btn-info"href="{{route('admin.cat.edit',$cat->id)}}">edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('admin.cat.delete',$cat->id)}}">delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

@endsection
