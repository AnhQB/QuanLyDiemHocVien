@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-content">
            <a href="{{route('admins.create')}}">Create new</a>
            <table class="table table-centered mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Thông tin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $each)
                    <tr>
                        <td>{{$each->id}}</td>
                        <td>{{$each->name}}</td>
                        <td>
                            @foreach($genderNameVI as $key => $value)
                                @if($value === $each->gender)
                                    {{$key}}
                                @endif
                            @endforeach
                            <br>
                            <a href="tel:{{$each->phone}}">{{$each->phone}}</a><br>
                            <a href="mailto:{{$each->email}}">{{$each->email}}</a><br>

                        </td>
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
