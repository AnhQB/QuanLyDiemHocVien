@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="card-title">Thêm Khung Chương Trình</h4>
                    <a href="/" class="category">Thêm Khung Chương Trình nhanh hơn.. (click me)</a>
                </div>
                <form action="{{route('curriculums.store')}}" method="post">
                    @csrf
                    <div class="card-content">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-border panel-default">
                                <label class="control-label">
                                    Chọn Khoá:
                                </label>
                                <select id="degree" name="degree_id" onchange="callChangeDisplay(this.value,1)">
                                    @foreach($degrees as $key => $val)
                                        <option
                                            value="{{$key}}"
                                            @if($key == $currentDegree->id)
                                                selected
                                            @endif
                                        >
                                            {{$val}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="panel panel-border panel-default">
                                <label class="control-label">
                                    Chọn Ngành:
                                </label>
                                <select name="major_id" id="major" onchange="callChangeDisplay(this.value, 2)">
                                    @foreach($majors as $key => $val)
                                        <option value="{{$key}}"
                                            @if($key == $currentMajor->id)
                                                selected
                                            @endif
                                        >
                                            {{$val}} ({{$key}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="panel panel-border panel-default">
                                <label class="control-label">
                                    Chọn Kỳ học:
                                </label>
                                <select name="semester_major">
                                    @for($i = 1; $i <=9 ; $i++)
                                        <option value="{{$i}}">
                                            Kì {{$i}}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="panel panel-border panel-default">
                                <label class="control-label">
                                    Chọn Môn học:
                                </label>
                                <select name="subject_ids[]" multiple id="select-subject">
                                    @foreach($subjects as $key => $val)
                                        <option value="{{$key}}">
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
                    <h4 class="card-title">{{$currentDegree->name}}</h4>
                    <p class="category">{{$currentMajor->name}}</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr><th>ID</th>
                            <th>Môn Học</th>
                            <th>Kỳ</th>
                        </tr></thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr>
                                <td>{{$item->subject_id}}</td>
                                <td>{{$item->subject->name}}</td>
                                <td>{{$item->semester_major}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            {{$data->appends([
                                'degree_id' => $currentDegree->id,
                                'major_id' => $currentMajor->id,
                            ])->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function callChangeDisplay(id, type) {
            let degree_id = 0;
            let major_id = 0;

            if(type === 1){
                degree_id = id;
                major_id = document.getElementById("major").value;
            }else{
                major_id = id;
                degree_id = document.getElementById("degree").value
            }

            window.location.href = "{{route('curriculums.index')}}?degree_id=" + degree_id + "&major_id="+ major_id;
        }

        $(document).ready(function() {
            console.log(1);
            $('select-subject').select2();
        });
    </script>

@endpush
