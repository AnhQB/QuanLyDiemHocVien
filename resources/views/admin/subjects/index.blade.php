@extends('layout.master');
@section('content')
    <div class="card">
        <div class="card-content">
            <a href="{{route('subjects.create')}}">Create new</a>
            <table class="table table-centered mb-0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Exam Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index => $each)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$each->name}}</td>
                        <td>{{$each->exam_type_name}}</td>
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
