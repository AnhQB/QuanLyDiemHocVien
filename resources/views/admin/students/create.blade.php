@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
    <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-content">
            <div class="form-group">
                <label class="control-label">
                    Name <star>*</star>
                </label>
                <input class="form-control" name="name" type="text" required="true" >
            </div>
            <div class="form-group">
                <label class="control-label">
                    Avatar <star>*</star>
                </label>
                <input class="form-control" name="avatar" type="file">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Email<star>*</star>
                </label>
                <input readonly class="form-control" name="email" type="text" required="true" email="true" autocomplete="off" aria-required="true">
                Male<input class="radio" name="gender" type="radio" value="0">
                Female<input class="radio" name="gender" type="radio" value="1">
                <label class="control-label">
                    Date of Birth<star>*</star>
                </label>
                <input  class="form-control" name="dob" type="date" required="true" >
                <label class="control-label">
                    Phone<star>*</star>
                </label>
                <input  class="form-control" name="phone" type="tel" required="true" >

                <label class="control-label">
                    Address<star>*</star>
                </label>
                <input  class="form-control" name="address" type="text" required="true" >
                <label class="control-label">
                    Semester Major<star>*</star>
                </label>
                <select name="semester_major">
                    <option value="1" selected>1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    <option value="9" >9</option>
                </select>

                <label class="control-label">
                    Major<star>*</star>
                </label>
                <select name="major_id">
                    @foreach($majors as $id => $name)
                        <option value="{{$id}}" >{{$name}}</option>
                    @endforeach
                </select>
                <label class="control-label">
                    Degree<star>*</star>
                </label>
                <select name="degree_id">
                    @foreach($degrees as $id => $name)
                        <option value="{{$id}}" >{{$name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="category"><star>*</star> Required fields</div>
        </div>
        <br>
        <div class="card-footer">
            <button type="submit" class="btn btn-info btn-fill">Register</button>

        </div>
    </form>

    <a href="{{route('students.index')}}">Back to index</a>
        </div>
    </div>
@endsection
