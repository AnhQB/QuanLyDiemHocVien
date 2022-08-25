@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('content')
    <div class="col-12">
        <div class="alert alert-success" id="msg-success" style="display: none">
        </div>
    </div>
    <div class="col-12">
        <div class="alert alert-danger" id="msg-error" style="display: none">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="card-title">Thêm danh sách sinh viên trong lớp</h4>
                </div>
                <form action="{{route('curriculums.store')}}" method="post">
                    @csrf
                    <div class="card-content">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-border panel-default">
                                <label class="control-label">
                                    Chọn Khoá:
                                </label>
                                <select id="select-degree" name="degree_id">
                                    @foreach($degrees as $key => $val)
                                        <option
                                            value="{{$key}}"
                                            {{--                                            @if()--}}
                                            {{--                                                selected--}}
                                            {{--                                            @endif--}}
                                        >
                                            {{$val}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-fill">Thêm</button>

                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-content table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tên</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/js.js')}}" type="text/javascript"></script>

@endpush
