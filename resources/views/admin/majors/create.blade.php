@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="row">
                <form method="post" action="{{route('majors.store')}}">
                    @csrf
                    <div class="col-md-5">
                        <div class="card-content">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" required="true"
                                       placeholder="Enter name">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div>
                    <a href="{{route('majors.index')}}">Back to index</a>
                </div>
            </div>
        </div>
    </div>
@endsection
