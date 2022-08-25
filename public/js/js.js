$(document).ready(function() {
    //$('#select-subject').select2();

    $('#select-degree').change(function(){
        callChangeDisplay(1);
    });
    $('#select-major').change(function(){
        callChangeDisplay(2);
    });
    $('#select-group').change(function(){
        callChangeDisplay(3);
    });
    $('#select-subject').change(function(){
        callChangeDisplay(4);
    });

    function callChangeDisplay(step){
        switch(step){
            case 1:
                if($('#select-major').length || $('#select-group').length || $('#select-subject').length){
                    //remove input tag: major, group, subject
                }

                var degree_id = $('#select-degree').val();
                const _token = $('meta[name="_token"]').attr('content')
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
                        console.log("suc");
                    },
                    error: function(response){
                        console.log("ec");
                    }
                })
                break;
        }

        // var subject_id = $('#select-subject').val();
        // var degree_id = $('#select-degree').val();

        // $.ajax({
        //     url: '{{route("student_groups.index")}}',
        //     type: 'GET',
        //     dataType: 'json',
        //     data:{
        //         subject_id: subject_id,
        //         degree_id: degree_id,
        //     }
        //     ,
        //     success: function(response){
        //         console.log("suc");
        //     },
        //     error: function(response){
        //         console.log("ec");
        //     }
        // })

    }

    $('#csv').change(function(event) {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        formData.append('_token', '{{csrf_token()}}')
        $.ajax({
            url: '{{route("curriculums.import_CSV")}}',
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
                $("#msg-success").html(response['data']);
                $("#msg-success").fadeOut(5000);
            },
            error: function(response){
                console.log(response['responseJSON'].data);
                $("#msg-error").show();
                $("#msg-error").html(response['responseJSON'].data);
                $("#msg-error").fadeOut(10000);
            }
        })
    });
});


