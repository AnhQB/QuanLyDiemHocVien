@extends('layout.master')

@section('content')
    <a href="{{route('students.create')}}">Create new</a>
    <table class="table table-centered mb-0">
        <thead>
        <tr>
            <th>Image</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $each)
            <tr>
                <td><img src="{{$each->avatar}}"></td>
                <td>{{$each->id}}</td>
                <td>{{$each->name}}</td>
                <td><a href="mailto:{{$each->email}}">{{$each->email}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <nav>
        <ul class="pagination">
            {{$data->links()}}
        </ul>
    </nav>
@endsection
