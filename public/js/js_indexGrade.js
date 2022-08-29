$(document).ready(function() {
    $('#card-content-bottom').hide();

    const _token = $('meta[name="_token"]').attr('content')

    $('#select-degree').click(function (event) {
        if(this == event.target){
            callChangeDisplay(1);
        }
    })

    $(document).on("click", '#select-major', function(event) {
        if(this == event.target){
            callChangeDisplay(2);
        }
    });

    $(document).on("click", '#select-subject', function(event) {
        if(this == event.target){
            callChangeDisplay(3);
        }
    });

    $(document).on("click", '#select-semester-year', function(event) {
        if(this == event.target){
            callChangeDisplay(4);
        }
    });
    $(document).on("click", '#select-group', function(event) {
        if(this == event.target){
            callChangeDisplay(5);
        }
    });

    function callChangeDisplay(step){
        let $data = {};
        switch (step) {
            case 1: //after pick degree
                //remove
                removeTagFilter(step);
                //
                var $degree_id = $('#select-degree').val();

                $data['degree_id'] = $degree_id;
                $data['step'] = step;
                $.ajax({
                    url: 'grades/filter',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        data: $data,
                        _token: _token,
                    },
                    success: function(response){
                        //console.log(response['data']);
                        addNewTagFilter(response, step);
                    },
                    error: function(response){
                        // console.log(response['responseJSON'].data);
                        $("#msg-error").show();
                        $("#msg-error").html(response['responseJSON'].data);
                        $("#msg-error").fadeOut(10000);
                    }
                })
                break;
            case 2:
                removeTagFilter(step);

                var $major_id = $('#select-major').val();
                console.log($major_id);
                $data['major_id'] = $major_id;
                $data['step'] = step;
                $.ajax({
                    url: 'grades/filter',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        data: $data,
                        _token: _token,
                    },
                    success: function(response){
                        //console.log(response['data']);
                        addNewTagFilter(response, step);
                    },
                    error: function(response){
                        // console.log(response['responseJSON'].data);
                        $("#msg-error").show();
                    }
                })
                break;
            case 3:
                removeTagFilter(step);

                var $subject_id = $('#select-subject').val();
                var $degree_id = $('#select-degree').val();
                $data['subject_id'] = $subject_id;
                $data['degree_id'] = $degree_id;
                $data['step'] = step;
                $.ajax({
                    url: 'grades/filter',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        data: $data,
                        _token: _token,
                    },
                    success: function(response){
                        //console.log(response['data']);
                        addNewTagFilter(response, step);
                    },
                    error: function(response){
                        // console.log(response['responseJSON'].data);
                        $("#msg-error").show();
                        $("#msg-error").html(response['responseJSON'].data);
                        $("#msg-error").fadeOut(10000);
                    }
                })
                break;
            case 4:
                removeTagFilter(step);

                var $degree_id = $('#select-degree').val();
                var $major_id = $('#select-major').val();
                var $subject_id = $('#select-subject').val();
                var $semester_year = $('#select-semester-year').val();
                $data['degree_id'] = $degree_id;
                $data['major_id'] = $major_id;
                $data['subject_id'] = $subject_id;
                $data['semester_year'] = $semester_year;
                $data['step'] = step;
                $.ajax({
                    url: 'grades/filter',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        data: $data,
                        _token: _token,
                    },
                    success: function(response){
                        console.log(response['data']);
                        addNewTagFilter(response, step);
                    },
                    error: function(response){
                        // console.log(response['responseJSON'].data);
                        $("#msg-error").show();
                        $("#msg-error").html(response['responseJSON'].data);
                        $("#msg-error").fadeOut(10000);
                    }
                })
                break;
            case 5:
                //removeTagFilter(step);

                var $degree_id = $('#select-degree').val();
                var $major_id = $('#select-major').val();
                var $subject_id = $('#select-subject').val();
                var $semester_year = $('#select-semester-year').val();
                var $group_id = $('#select-group').val();
                $data['degree_id'] = $degree_id;
                $data['major_id'] = $major_id;
                $data['subject_id'] = $subject_id;
                $data['semester_year'] = $semester_year;
                $data['group_id'] = $group_id;
                $data['step'] = step;
                $.ajax({
                    url: 'grades/filter',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        data: $data,
                        _token: _token,
                    },
                    success: function(response){
                        console.log(response['data']);
                        printListStudent(response);
                        //addNewTagFilter(response, step);
                    },
                    error: function(response){
                        // console.log(response['responseJSON'].data);
                        $("#msg-error").show();
                        $("#msg-error").html(response['responseJSON'].data);
                        $("#msg-error").fadeOut(10000);
                    }
                })
                break;
        }
    }
    function removeTagFilter(step) {
        if(step == 1){
            $('#div-select-major').remove();
            $('#div-select-subject').remove();
            $('#div-select-semester-year').remove();
            $('#div-select-group').remove();
            $('#card-content-bottom').hide();
        }else if(step == 2){
            $('#div-select-subject').remove();
            $('#div-select-semester-year').remove();
            $('#div-select-group').remove();
            $('#card-content-bottom').hide();
        }else if(step == 3){
            $('#div-select-semester-year').remove();
            $('#div-select-group').remove();
            $('#card-content-bottom').hide();
        }else if(step == 4){
            $('#div-select-group').remove();
            $('#card-content-bottom').hide();
        }
    }

    function addNewTagFilter(response, step){
        let $data;
        let $labelName;
        let $name;
        switch (step) {
            case 1:
                $data = response['data'].majors;
                $labelName = "Chọn Ngành";
                $name = "major";
                break;
            case 2:
                $data = response['data'].subjects;
                $labelName = "Chọn Môn";
                $name = "subject";
                break;
            case 3:
                $data = response['data'].semester_years;
                $labelName = "Chọn Kỳ";
                $name = "semester-year";
                break;
            case 4:
                $data = response['data'].groups;
                $labelName = "Chọn Lớp";
                $name = "group";
                break;
        }
        let $divFilter = $('#div-filter');
        let $divSelectAppend = `<div class=\"panel panel-border panel-default\" id="div-select-`+ $name +`">`;
        $divSelectAppend += `<label class=\"control-label\">`+ $labelName +`</label>`
        $divSelectAppend += `<select id="select-`+ $name +`"
                            name="`+ $name +`_id" ></select>`
        $divSelectAppend += `</div>`

        $divFilter.append($divSelectAppend);
        var $selectTag = $("#select-" + $name);
        for(var i = 0; i < $data.length; i++){
            //console.log($majors[i].major.id + '-' + $majors[i].major.name);
            switch(step){
                case 1:
                    $selectTag.append($("<option></option>")
                        .attr("value", $data[i].major.id)
                        .text($data[i].major.name)
                    );
                    break;
                case 2:
                    $selectTag.append($("<option></option>")
                        .attr("value", $data[i].subject.id)
                        .text($data[i].subject.name)
                    );
                    break;
                case 3:
                    $selectTag.append($("<option></option>")
                        .attr("value", $data[i].semester_year)
                        .text($data[i].semester_year)
                    );
                    break;
                case 4:
                    $selectTag.append($("<option></option>")
                        .attr("value", $data[i].id)
                        .text($data[i].id)
                    );
                    break;

            }

        }
    }

    $('#csv').change(function(event) {
        var $name = $(this).val().replace(/C:\\fakepath\\/i, '');
        $('#nameFile').text(': ' + $name);

    });

    $('#submit-file-csv').click(function (event) {
        var formData = new FormData();
        formData.append('file', $('#csv')[0].files[0]);
        formData.append('_token', _token)
        $.ajax({
            url: 'student_groups/import-csv',
            type: 'POST',
            dataType: 'json',
            data: formData,
            async: false,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response){
                //console.log(response['data']);
                $("#msg-success").show();
                $("#msg-success").html(response['data'].message);
                $("#msg-success").fadeOut(5000);
                printListStudent(response['data'].listStudent);
                //console.log(response['data'].listStudent);
            },
            error: function(response){
                // console.log(response['responseJSON'].data);
                $("#msg-error").show();
                $("#msg-error").html(response['responseJSON'].data);
                $("#msg-error").fadeOut(10000);
            }
        })
    })

    function printListStudent(response){
        $('#card-content-bottom').show();
        var $listStudent = response['data'].listStudent;
        var $statusGradeName = response['data'].statusGradeName;
        var $last_tr_table = $('#table-list-student  > tbody:last-child');
        //var $tbody = $table_list_student.find('tbody');
        $('#table-list-student > tbody').empty();
        let $statusName;
        for(var i = 0; i < $listStudent.length; i++){
            Object.entries($statusGradeName).forEach(entry => {
                const [key, value] = entry;
                console.log(key, value);
                if(value == $listStudent[i].status){
                    $statusName = key;
                }
            });

            $append = "<tr>";
            $append += "<td>"+(i+1)+"</td>";
            $append += "<td>"+$listStudent[i].student.id+"</td>";
            $append += "<td>"+$listStudent[i].student.name+"</td>";
            $append += "<td>"+$listStudent[i].grade+"</td>";
            $append += "<td>"+ $statusName +"</td>";
            $append += "</tr>";
            $($last_tr_table).append($append);
        }
    }
});


