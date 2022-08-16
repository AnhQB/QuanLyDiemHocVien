@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-content">
            <a href="{{route('degree_majors.create')}}">Create new</a>
            <table class="table table-centered mb-0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Khoá học</th>
                    <th>Ngành học</th>
                </tr>
                </thead>
                <tbody>
                @foreach($degrees as $index => $each)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$each->name}}</td>
                        <td>
                            @foreach($data as $each2)
                                @if($each2 -> degree_id  === $each->id)
                                    <a href="{{route('curriculums.show', $each2->major_id)}}" >{{$each2->major->name}}</a>
                                    <br>
                                @endif
                            @endforeach
                        </td>
                    </tr>


                @endforeach
                </tbody>
            </table>

            <nav>
                <ul class="pagination">
                    {{$degrees->links()}}
                </ul>
            </nav>
        </div>
    </div>
@endsection
