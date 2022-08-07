@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
    <form method="post" action="{{route('degrees.store')}}">
        @csrf
        <div class="card-content">
            <div class="form-group">
                <input class="form-control" name="name" type="text" required="true" placeholder="Enter name">
            </div>
            <div class="form-group">
                <input type="text" name="start_year" class="form-control" placeholder="start year" value="{{$currentYear}}">
            </div>
            <div class="form-group">
                <input type="text" name="end_year" class="form-control" placeholder="end year" value="{{$currentYear + 4}}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <a href="{{route('degrees.index')}}">Back to index</a>
        </div>
    </div>
@endsection
