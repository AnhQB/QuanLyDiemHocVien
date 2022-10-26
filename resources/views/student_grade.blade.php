@extends('layout.master')
@section('content')
    <table>
        <tbody>
        <tr style="border-bottom: 0 none">
            <td>
                <div>
                    <h4>Báo cáo điểm - <span>{{session()->get('name')}} ({{session()->get('id')}})</span></h4>
                    <table>
                        <tbody>
                        <tr>
                            <td valign="top">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Kỳ học</th>
                                        <th>Môn học</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <div>
                                                <table class="table table-centered">
                                                    <tbody>
                                                    @foreach($semester_years as $key => $val)
                                                        <tr>
                                                            @if($key !== $current_semester)
                                                                <td>
                                                                    <a href="?rollNumber=HE153727&amp;term=Fall2019">{{$key}}</a>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <b>{{$key}}</b>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td valign="top">
                                            <div id="divCourse">
                                                <table class="table table-centered">
                                                    <tbody>
                                                    @foreach($data_grades as $item)
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)" class="linkCourse"
                                                                   type="button" data-subject="{{$item->subject_id}}">
                                                                    {{$item->subject->name}} ({{$item->subject_id}})
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td valign="top">
                                <div id="divGrade">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="ctl00$mainContent$hdError" id="ctl00_mainContent_hdError">

                </div>
            </td>
        </tr>

        </tbody>
    </table>

@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('.linkCourse').on("click", function (event) {
                let $subject_id = $(this).data("subject");
                let $data_grades = '';
                $data_grades = @json($data_grades);
                let $data_average = @json($data_average);
                for (let i = 0; i < $data_grades.length; i++) {
                    if ($data_grades[i].subject_id === $subject_id) {

                        let $item = $data_grades[i];
                        let $grades = $item[0];
                        let $divGrade = $('#divGrade');
                        console.log($grades);
                        $divGrade.empty();
                        let $append = `
                            <table summary="Report" class="table table-centered">
                                <thead>
                                    <tr>
                                        <th>Loại điểm</th>
                                        <th>Trọng số</th>
                                        <th>Điểm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                `;
                        let $weight = 0;

                        let $fe = 0;
                        let $pe = 0;
                        let $status = $data_average[$subject_id]['status'];
                        for (let j = 0; j < $grades.length; j++){
                            if($grades.length > 1){
                                $weight = $grades[j].exam_type === 1 ? '60%' : '40%';
                            }else{
                                $weight = '100%';
                            }
                            $append += `<tr>
                                        <td>`+ $grades[j].exam_type +`</td>
                                        <td>`+ $weight +`</td>
                                        <td>`+ $grades[j].grade +`</td>
                                    </tr>`;
                        }
                        if($status === "PASSED"){
                            $color = "Green";
                        }else{
                            $color = "Red";
                        }

                        $append += `
                                </tbody>
                                <tfoot>
                                    <tr>`;
                        $append += `
                                        <td rowspan="2">Course total</td>
                                        <td>Average</td>
                                        <td colspan="3"> `+ $data_average[$subject_id]['average'] +`</td>
                        `;
                        $append += `
                                    </tr>
                                    <tr>`;
                        $append += `
                                        <td>Status</td>
                                        <td colspan="3"><font color="`+ $color +`">`+ $status +`</font></td>
                        `;
                        $append += `</tr>
                                </tfoot>
                            </table>`;
                        $divGrade.append($append);
                    }
                }
            })
        });

    </script>
@endpush
