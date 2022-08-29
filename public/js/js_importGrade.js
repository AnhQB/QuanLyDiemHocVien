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
            url: 'grades/store_csv',
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
})
