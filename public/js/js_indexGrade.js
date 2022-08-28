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

    function callChangeDisplay(step){
        let $data = {};
        switch (step) {
            case 1: //after pick degree
                //remove
                removeTagFilter(step);
                //
                let $degree_id = $('#select-degree').val();

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

                let $major_id = $('#select-major').val();
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
                        $("#msg-error").html(response['responseJSON'].data);
                        $("#msg-error").fadeOut(10000);
                    }
                })
                break;
            case 3:
                removeTagFilter(step);

                let $subject_id = $('#select-subject').val();
                let $degree_id2 = $('#select-degree').val();
                $data['subject_id'] = $subject_id;
                $data['degree_id'] = $degree_id2;
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

    function printListStudent(listStudent){
        $('#card-content-bottom').show();
        var $data = listStudent;
        var $last_tr_table = $('#table-list-student  > tbody:last-child');
        //var $tbody = $table_list_student.find('tbody');
        $('#table-list-student > tbody').empty();

        for(var i = 0; i < $data.length; i++){
            $append = "<tr>";
            $append += "<td>"+(i+1)+"</td>";
            $append += "<td>"+$data[i].student.id+"</td>";
            $append += "<td>"+$data[i].student.name+"</td>";
            $append += "</tr>";
            $($last_tr_table).append($append);
        }
    }
});


