@extends('layout.master')
@section('content')
    <a href="{{route('degrees.create')}}">Create new</a>
    <table class="table table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Start Year</th>
            <th>End Year</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $each)
            <tr>
                <td>{{$each->id}}</td>
                <td>{{$each->name}}</td>
                <td>{{$each->start_year}}</td>
                <td>{{$each->end_year}}</td>
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

@push('js')
    <script>
        $(document).ready(function() {

                    $.ajax({
                        url: '{{route('degrees.index')}}',
                        type: 'json',
                    })
                    .done(function() {
                        console.log("success");
                    })

                });
    </script>
@endpush
