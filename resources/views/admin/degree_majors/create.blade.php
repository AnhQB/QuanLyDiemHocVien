@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-content">
    <form action="{{route('degree_majors.store')}}" method="post">
        @csrf
        <div class="card-content">
            <div class="form-group">
                <label class="control-label col-sm-2">
                    Chọn Khoá <star>*</star>
                </label>
                <select name="degree_id" onchange="callChangeMajors(this.value)">
                    @foreach($degrees as $key => $val)
                        <option
                            value="{{$key}}"
                            @if($key == $degree_id)
                                    selected
                            @endif
                        >
                            {{$val}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Chọn Chuyên Ngành</label>
                <div class="col-sm-10 col-sm-offset-1">
                @if(count($majors) != 0 )

                        @foreach($majors as $key => $value)
                            <div class="checkbox">
                                <input type="checkbox" name="major_id[]" value="{{$key}}">
                                <label >
                                    {{$value}}
                                </label>
                            </div>
                        @endforeach

                @else
                    Khoá đã chọn hết tất cả các chuyên ngành rồi mà..
                @endif
                </div>
        </div>
        <br>
        <div class="card-footer">
            <button type="submit" class="btn btn-info btn-fill">Thêm Mới</button>

        </div>
    </form>

    <a href="{{route('degree_majors.index')}}">Back to index</a>
        </div>
    </div>
@endsection
@push('js')
    <script>

        function callChangeMajors(degree_id) {
            console.log(degree_id);
            window.location.href = "{{route('degree_majors.create')}}?degree_id=" + degree_id;
        }
    </script>
@endpush
