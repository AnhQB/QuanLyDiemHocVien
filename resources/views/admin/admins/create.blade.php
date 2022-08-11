@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
    <form action="{{route('admins.store')}}" method="post">
        @csrf
        <div class="card-content">
            <div class="form-group">
                <label class="control-label">
                    Họ và tên <star>*</star>
                </label>
                <input class="form-control" name="name" type="text" required="true" >

                <label class="control-label">
                    Giới tính<star>*</star>
                    <br>
                    Nam<input class="radio" name="gender" type="radio" value="0" checked>
                    Nữ<input class="radio" name="gender" type="radio" value="1">
                </label>
                <br>

                <label class="control-label">
                    Số điện thoại<star>*</star>
                </label>
                <input  class="form-control" name="phone" type="tel" required="true" >
            </div>

            <div class="category"><star>*</star> Required fields</div>
        </div>
        <br>
        <div class="card-footer">
            <button type="submit" class="btn btn-info btn-fill">Register</button>

        </div>
    </form>

    <a href="{{route('admins.index')}}">Back to index</a>
        </div>
    </div>
@endsection
