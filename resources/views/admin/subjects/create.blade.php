@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
            <form action="{{route('subjects.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="card-content col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                Name
                                <star>*</star>
                            </label>
                            <input class="form-control" name="name" type="text" required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-content">
                        <div class="form-group">
                            <label class="control-label">
                                Exam Type
                                <star>*</star>
                            </label>
                            <select name="exam_type">
                                <option value="1">Final Exam Only</option>
                                <option value="2">Both</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-fill">Create</button>

                </div>
            </form>

            <a href="{{route('subjects.index')}}">Back to index</a>
        </div>
    </div>
@endsection
