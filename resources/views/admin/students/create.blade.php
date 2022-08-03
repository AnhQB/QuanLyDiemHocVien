@extends('layout.master')
@section('content')
    <form action="" method="">

        <div class="card-content">
            <div class="form-group">
                <label class="control-label">
                    Email Address <star>*</star>
                </label>
                <input class="form-control" name="email" type="text" required="true" email="true" autocomplete="off" aria-required="true">
            </div>
            <div class="form-group">
                <label class="control-label">Password <star>*</star></label>
                <input class="form-control" name="password" id="registerPassword" type="password" required="true" aria-required="true">
            </div>
            <div class="form-group">
                <label class="control-label">Confirm Password <star>*</star></label>
                <input class="form-control" name="password_confirmation" id="registerPasswordConfirmation" type="password" required="true" equalto="#registerPassword" aria-required="true">
            </div>
            <div class="category"><star>*</star> Required fields</div>
        </div>
        <br>
        <div class="card-footer">
            <button type="submit" class="btn btn-info btn-fill">Register</button>

        </div>
    </form>

    <a href="{{route('students.index')}}">Back to index</a>
@endsection
