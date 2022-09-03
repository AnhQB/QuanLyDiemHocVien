@extends('layout.master')
@section('content')
    <table >
        <tbody>
        <tr style="border-bottom: 0 none">
            <td>
                <div>
                    <h4>Báo cáo điểm - <span>{{session()->get('name')}} ({{session()->get('id')}})</span></h4>
                    <table >
                        <tbody>
                        <tr>
                            <td valign="top">
                                <table >
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
                                                                <a href="javascript:void(0)" class="linkCourse" type="button" data-subjectId = '{{$item->subject_id}}'>
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
        $(document).ready(function(){
            $('.linkCourse').on("click",function(event){
                let $data_grades = '';
                $data_grades = @json($data_grades);
                for (var i = 0; i < $data_grades.length; i++){
                    var $item = $data_grades[i];
                    var $grades = $item[0];
                    console.log($grades);
                }
            })
        });

    </script>
@endpush
