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

    $('#task_sort').on('change', function() {

        var value = $(this).val();

        insertParam( 'sort', value );

    });

    function insertParam(key, value)
    {
        key = encodeURI(key); value = encodeURI(value);

        var kvp = document.location.search.substr(1).split('&');

        var i=kvp.length; var x; while(i--)
    {
        x = kvp[i].split('=');

        if (x[0]==key)
        {
            x[1] = value;
            kvp[i] = x.join('=');
            break;
        }
    }

        if(i<0) {kvp[kvp.length] = [key,value].join('=');}

        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&');
    }

});