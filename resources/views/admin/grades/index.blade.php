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
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách điểm sinh viên theo lớp</h4>
                    <a href="{{route('grades.import_Grade')}}" class=" btn btn-simple">
                        Thêm file danh sách điểm sinh viên theo lượt thi
                    </a>
                </div>
                <form>
                    @csrf
                    <div class="card-content" >
                        <div class="panel-group text-center " id="div-filter" >
                            <div class="panel panel-border panel-default " id="div-select-degree">
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

                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="card-content-bottom">
                <div class="card-header">

                </div>
                <div class="card-content table-responsive">
                    <table class="table table-striped" id="table-list-student">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID sinh viên</th>
                            <th>Họ và tên</th>
                            <th>Điểm (Lý thuyết | Thực hành)</th>
                            <th>Trạng thái</th>
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
    <script src="{{asset('js/js_indexGrade.js')}}" type="text/javascript"></script>

@endpush
