/*--- Change Task Status ---*/

$(document).ready(function () {

    var url = document.location.protocol + '//' + document.location.host;

    function task_status( task_id, field, value ) {

        $.ajax({
            type: 'POST',
            url: url + '/task/ajax_change_value',
            dataType: 'JSON',
            data: {
                task_id: task_id,
                field: field,
                value: value
            },
            async: true,
            error: function (result) {
                console.log( result );
            },
            success: function (result) {
                console.log( result );
            }
        });

    }

    $('.task_status').on('click', function() {

        var task_id = $( this ).data('id');
        var field   = 'status';
        var value   = ( $( this ).is( ":checked" ) ) ? 1 : 0;

        task_status( task_id, field, value );

    });

    $('.task_text').on('change', function() {

        var task_id = $( this ).data('id');
        var field   = 'text';
        var value   = $( this ).val();

        task_status( task_id, field, value );

    });

});