@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-content">
            <table class="table table-centered mb-0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Môn</th>
                    <th>Tên Môn</th>
                    <th>Kỳ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index => $each)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$each->subject_id}}</td>
                        <td>{{$each->subject->name}}</td>
                        <td>{{$each->semester_major}}</td>
                    </tr>


                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection
