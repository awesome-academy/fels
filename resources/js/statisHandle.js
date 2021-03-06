$(function() {
    function requestData(options, chart){
        $.ajax({
            type:'GET',
            url:'/statis/'+options,
            dataType: 'json',
            success:function(data) {
                chart.setData(data)
            }
        });
    }
    var chart = new Morris.Bar({
        element: 'chart',
        data: [0,0],
        xkey: 'day',
        ykeys: ['value'],
        labels: ['Words Learned'],
    });
    requestData(2, chart);
    $('ul.action-icons a').click(function(){
        var el = $(this);
        var options = el.attr('data-range');
        requestData(options, chart);
        el.parent().addClass('active');
        el.parent().siblings().removeClass('active');
    })
});
