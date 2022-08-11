@extends('layout.master');
@section('content')
    <div class="card">
        <div class="card-content">
            <a href="{{route('groups.create')}}">Create new</a>
            <table class="table table-centered mb-0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>#</th>
                    <th>Các Môn</th>
                    <th>Khoá</th>
                    <th>Chuyển Ngành</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index => $each)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$each -> id}}</td>
                        <td>
                            <p>{{$each -> subject}}</p>
                        </td>
                        <td>{{$each -> degree -> name}}</td>
                        <td>{{$each -> major -> name}}</td>
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
