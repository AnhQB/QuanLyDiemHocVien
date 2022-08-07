@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
            <a href="{{route('majors.create')}}">Create new</a>
            <table class="table table-centered mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $each)
                    <tr>
                        <td>{{$each->id}}</td>
                        <td>{{$each->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <nav>
                <ul class="pagination">
                    {{$data->links()}}
                </ul>
            </nav>
        </div>
    </div>
@endsection
