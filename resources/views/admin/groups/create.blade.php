@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
    <form method="post" action="{{route('groups.store')}}">
        @csrf
        <div class="card-content">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="id" type="text" required="true" placeholder="Enter name (SE11000, SE31000)">
            </div>
            <div class="form-group">
                <label>Subject Name</label><br>
                <select name="subject_id">
                    @foreach($subjects as $id => $name)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Degree Name</label><br>
                <select name="degree_id">
                    @foreach($degrees as $id => $name)
                        <option value="{{$id}}"
                            @if ($loop->last)
                                selected
                            @endif
                        >
                            {{$name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Major Name</label><br>
                <select name="major_id">
                    @foreach($majors as $id => $name)
                        <option value="{{$id}}">
                            {{$name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Semester_year</label><br>
                <input name="semester_year" value="{{$currentSemester}}">
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <a href="{{route('groups.index')}}">Back to index</a>
        </div>
    </div>
@endsection
