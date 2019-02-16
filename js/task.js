/*--- Change Task Status ---*/

$(document).ready(function () {

    var url = document.location.protocol + '//' + document.location.host;

    function task_status( _this ) {

        var task_id     = $(_this).data('id');
        var task_status = ( $(_this).is( ":checked" ) ) ? 1 : 0;

        $.ajax({
            type: 'POST',
            url: url + '/task/ajax_change_status',
            dataType: 'JSON',
            data: {
                task_id: task_id,
                status: task_status
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
        task_status(this);
    });

});