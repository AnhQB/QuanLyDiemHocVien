@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
    <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-content">
            <div class="form-group">
                <label class="control-label">
                    Họ và tên <star>*</star>
                </label>
                <input class="form-control" name="name" type="text" required="true" >
            </div>
            <div class="form-group">
                <label class="control-label">
                    Ảnh <star>*</star>
                </label>
                <input class="form-control" name="avatar" type="file">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Giới tính<star>*</star>
                    <br>
                    Nam<input class="radio" name="gender" type="radio" value="0" checked>
                    Nữ<input class="radio" name="gender" type="radio" value="1">
                </label><br>
                <label class="control-label">
                    Ngày sinh<star>*</star>
                </label>
                <input  class="form-control" name="date_of_birth" type="date" required="true" >
                <label class="control-label">
                    Số điện thoại<star>*</star>
                </label>
                <input  class="form-control" name="phone" type="tel" required="true" >

                <label class="control-label">
                    Địa chỉ<star>*</star>
                </label>
                <input  class="form-control" name="address" type="text" required="true" >
                <label class="control-label">
                    Kỳ học<star>*</star>
                </label>
                <select name="semester_major">
                    @for($i = 1; $i<=9 ; $i++)
                        <option value="{{$i}}" {{$i===1?'selected':''}}>
                            {{$i}}
                        </option>
                    @endfor


                </select>

                <label class="control-label">
                    Ngành<star>*</star>
                </label>
                <select name="major_id">
                    @foreach($majors as $id => $name)
                        <option value="{{$id}}" >{{$name}}</option>
                    @endforeach
                </select>
                <label class="control-label">
                    Khoá học<star>*</star>
                </label>
                <select name="degree_id">
                    @foreach($degrees as $id => $name)
                        <option value="{{$id}}"
                            @if ($loop -> last)
                                selected
                            @endif
                        >
                            {{$name}}
                        </option>
                    @endforeach
                </select>
                <br>
                <label class="control-label">
                    Mật khẩu<star>*</star>
                </label>
                <input type="password" name="password">
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
