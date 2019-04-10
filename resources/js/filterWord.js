$(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("select[name='status']").change(function(e){
        e.preventDefault();
        let status = $(this).val();
        $.ajax({
            type : 'GET',
            url: 'review/' + status,
            dataType: 'json',
            cache: false,
            success: function(data){
                console.log(data);
                $("#ajax-word").html(data.data);
            }
        });
    });
});
