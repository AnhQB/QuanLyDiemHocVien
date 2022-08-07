@extends('layout.master')
@section('content')
        <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image">
                </div>
                <div class="card-content">
                    <div class="author">
                        <img class="avatar border-white" src="" alt="...">
                        <h4 class="card-title">{{$student->name}}<br>
                            <a href="mailto:{{$student->email}}"><small>{{$student->email}}</small></a><br>
                            <a href="tel:{{$student->phone}}"><small>{{$student->phone}}</small></a>
                        </h4>
                        <p>{{$student->date_of_birth}} | {{$student->gender_name}}<p>
                        <p>{{$student->address}}<p>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Detail</h4>
                </div>
                <div class="card-content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Semester Major</label>
                                    <input type="number" class="form-control border-input" value="{{$student->semester_major}}" min="1" max="9">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Major</label>
                                    <input type="text" class="form-control border-input" value="{{$student->major->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Degree</label>
                                    <input type="text" class="form-control border-input" placeholder="Company" value="{{$student->degree->name}}">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="row-cols-1">
            <a href="{{route('students.index')}}">Back to index</a>
        </div>

@endsection
