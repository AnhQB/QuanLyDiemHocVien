$(document).ready(function() {
    $('#card-content-bottom').hide();
    const _token = $('meta[name="_token"]').attr('content')

    $('#csv').change(function() {
        var $name = $(this).val().replace(/C:\\fakepath\\/i, '');
        $('#nameFile').text(': ' + $name);
    });

    $('#submit-file-csv').click(function () {
        var formData = new FormData();
        formData.append('file', $('#csv')[0].files[0]);
        formData.append('_token', _token)
        $.ajax({
            url: '/grades/store-grade',
            type: 'POST',
            dataType: 'json',
            data: formData,
            async: false,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response['data']);
                $("#msg-success").show();
                $("#msg-success").html(response['data'].message);
                $("#msg-success").fadeOut(5000);
                printListStudent(response);
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
        var $last_tr_table = $('#table-list-student  > tbody:last-child');
        //var $tbody = $table_list_student.find('tbody');
        $('#table-list-student > tbody').empty();
        for(var i = 0; i < $listStudent.length; i++){
            $append = "<tr>";
            $append += "<td>"+(i+1)+"</td>";
            $append += "<td>"+$listStudent[i].student_id+"</td>";
            $append += "<td>"+$listStudent[i].grade+"</td>";
            $append += "</tr>";
            $($last_tr_table).append($append);
        }
    }
})
