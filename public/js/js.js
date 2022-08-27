$(document).ready(function() {
    //$('#select-subject').select2();
    $('#card-content-bottom').hide();
    $('#select-degree').change(function(){
        callChangeDisplay(1);
    });
    // $('#select-major').on("click",'option', function(){
    //     alert("new link clicked!");
    //     //callChangeDisplay(2);
    // });
    $(document).on("change", '#select-major', function(event) {
        callChangeDisplay(2);

    });
    $(document).on("change", '#select-group', function(event) {
        callChangeDisplay(3);

    });
    $(document).on("change", '#select-subject', function(event) {
        callChangeDisplay(4);

    });
    const _token = $('meta[name="_token"]').attr('content')

    function callChangeDisplay(step){

        switch(step){
            case 1:
                if($('#select-major').length || $('#select-group').length || $('#select-subject').length){
                    //remove input tag: major, group, subject
                    $('#div-select-major').remove();
                    $('#div-select-group').remove();
                    $('#div-select-subject').remove();
                    $('#card-content-bottom').hide();
                }

                var degree_id = $('#select-degree').val();
                $.ajax({
                    url: 'student_groups/filter',
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        step: step,
                        degree_id: degree_id,
                        _token: _token,
                    }
                    ,
                    success: function(response){
                        //console.log(response['data'].majors);
                        var $majors = response['data'].majors;
                        var $divFilter = $('#div-filter');
                        var $divSelectMajorAppend = `<div class=\"panel panel-border panel-default\" id="div-select-major">`;
                        $divSelectMajorAppend += `<label class=\"control-label\">Chọn Ngành:</label>`
                        $divSelectMajorAppend += `<select id="select-major" name="major_id"></select>`
                        $divSelectMajorAppend += `</div>`

                        $divFilter.append($divSelectMajorAppend);
                        var $selectMajor = $('#select-major');
                        for(var i = 0; i < $majors.length; i++){
                            //console.log($majors[i].major.id + '-' + $majors[i].major.name);
                            $selectMajor.append($("<option></option>")
                                .attr("value", $majors[i].major.id)
                                .text($majors[i].major.name)
                            );
                        }
                    },
                    error: function(response){
                        console.log("ec");
                    }
                })
                break;
            case 2:
                if($('#select-group').length || $('#select-subject').length){
                    //remove input tag: group, subject
                    $('#div-select-group').remove();
                    $('#div-select-subject').remove();
                }

                var major_id = $('#select-major').val();
                var degree_id = $('#select-degree').val();
                $.ajax({
                    url: 'student_groups/filter',
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        step: step,
                        major_id: major_id,
                        degree_id: degree_id,
                        _token: _token,
                    },
                    success: function(response){
                        //console.log(response['data'].groups);
                        var $majors = response['data'].groups;
                        var $divFilter = $('#div-filter');
                        var $divSelectGroupAppend = `<div class=\"panel panel-border panel-default\" id="div-select-group">`;
                        $divSelectGroupAppend += `<label class=\"control-label\">Chọn Lớp:</label>`
                        $divSelectGroupAppend += `<select id="select-group" name="group_id"></select>`
                        $divSelectGroupAppend += `</div>`

                        $divFilter.append($divSelectGroupAppend);
                        var $select = $('#select-group');
                        for(var i = 0; i < $majors.length; i++){
                            //console.log($majors[i].major.id + '-' + $majors[i].major.name);
                            $select.append($("<option></option>")
                                .attr("value", $majors[i].id)
                                .text($majors[i].id)
                            );
                        }
                    },
                    error: function(response){
                        console.log("ec");
                    }
                })
                break;
            case 3:
                if($('#select-subject').length){
                    //remove input tag: subject
                    $('#div-select-subject').remove();
                }

                var major_id = $('#select-major').val();
                var degree_id = $('#select-degree').val();
                var group_id = $('#select-group').val();
                $.ajax({
                    url: 'student_groups/filter',
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        step: step,
                        major_id: major_id,
                        degree_id: degree_id,
                        group_id: group_id,
                        _token: _token,
                    },
                    success: function(response){
                        //console.log(response['data'].subjects);
                        var $majors = response['data'].subjects;
                        var $divFilter = $('#div-filter');
                        var $divSelectGroupAppend = `<div class=\"panel panel-border panel-default\" id="div-select-subject">`;
                        $divSelectGroupAppend += `<label class=\"control-label\">Chọn Môn:</label>`
                        $divSelectGroupAppend += `<select id="select-subject" name="subject_id"></select>`
                        $divSelectGroupAppend += `</div>`

                        $divFilter.append($divSelectGroupAppend);
                        var $select = $('#select-subject');
                        for(var i = 0; i < $majors.length; i++){
                            //console.log($majors[i].major.id + '-' + $majors[i].major.name);
                            $select.append($("<option></option>")
                                .attr("value", $majors[i].subject.id)
                                .text($majors[i].subject.name)
                            );
                        }
                    },
                    error: function(response){
                        console.log("ec");
                    }
                })
                break;
            case 4:
                var group_id = $('#select-group').val();
                var subject_id = $('#select-subject').val();
                $.ajax({
                    url: 'student_groups/filter',
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        step: step,
                        group_id: group_id,
                        subject_id: subject_id,
                        _token: _token,
                    },
                    success: function(response){
                        console.log(response['data'].listStudent);
                        printListStudent(response['data'].listStudent)
                    },
                    error: function(response){
                        console.log("ec");
                    }
                })
                break;
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


